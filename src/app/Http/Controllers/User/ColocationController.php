<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Colocation;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\ColocationInvitation;
use Illuminate\Support\Str;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;

class ColocationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $colocations = $user->colocations()
        ->with(['owner:id,name','expenses.user:id,name'])
        ->withCount('members')
        ->latest()
        ->paginate(6);

        return view('user.colocation', compact('colocations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();

        DB::transaction(function () use ($request, $user) {

            $colocation = Colocation::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'active',
            ]);

            Membership::create([
                'user_id' => $user->id,
                'colocation_id' => $colocation->id,
                'role' => 'owner',
            ]);
        });

        return redirect()
            ->route('user.colocation')
            ->with('success', 'Colocation created successfully ✅');
    }


    public function show($id)
    {
        $user = Auth::user();

        $colocation = Colocation::with([
            'ownerMembership.user',
            'members',
            'categories',
            'expenses.user',
            'expenses.category'
        ])
        ->findOrFail($id);

        abort_if(
            !$colocation->members->contains($user->id),
            403
        );

        return view('user.onColocation', compact('colocation'));
    }

    public function cancel($id)
    {
        $colocation = Auth::user()
            ->colocations()
            ->where('colocations.id', $id)
            ->firstOrFail();

        if ($colocation->ownerMembership->user_id !== Auth::id()) {
            abort(403);
        }

        $colocation->update([
            'status' => 'cancelled'
        ]);

        return redirect()
            ->route('user.colocation')
            ->with('success', 'Colocation cancelled successfully.');
    }

    public function inviteMember(Request $request, $id)
    {
        $colocation = auth()->user()
    ->colocations()
    ->where('colocations.id', $id)
    ->firstOrFail();

        $token = Str::random(32);

        $invitation = Invitation::create([
            'colocation_id' => $colocation->id,
            'email' => $request->email,
            'token' => $token,
            'status' => 'pending',
        ]);

        $invitation->load('colocation');

        Mail::to($request->email)->send(new ColocationInvitation($invitation));

        return back()->with('success', 'Invitation sent to '.$request->email);
    }

    public function acceptInvitation($token)
     {
         $invitation = Invitation::where('token', $token)
             ->where('status', 'pending')
             ->firstOrFail();

         $user = auth()->user();

         $invitation->colocation->members()->syncWithoutDetaching([
             $user->id => ['role' => 'member']
         ]);

         $invitation->status = 'accepted';
         $invitation->save();

         return redirect()
             ->route('colocation.show', $invitation->colocation_id)
             ->with('success', 'Welcome to the colocation!');
     }

   public function removeMember($colocationId, $userId)
    {
        $colocation = auth()->user()
            ->colocations()
            ->where('colocations.id', $colocationId)
            ->firstOrFail();

        $member = $colocation->members()
            ->where('users.id', $userId)
            ->firstOrFail();

        if ($member->pivot->role === 'owner') {
            return back()->with('error', 'You cannot remove the owner.');
        }

        if ($member->id === auth()->id()) {
            return back()->with('error', 'You cannot remove yourself.');
        }

        $colocation->members()->detach($userId);

        return back()->with('success', $member->name.' removed successfully.');
    }

    public function exit(Colocation $colocation)
    {
        $user = Auth::user();

        $membership = Membership::where('colocation_id', $colocation->id)
            ->where('user_id', $user->id)
            ->first();

        if (!$membership) {
            abort(403);
        }

        if ($membership->role === 'owner') {
            return back()->with('error',
                'Owner cannot leave the colocation.');
        }

        $membership->delete();

        return redirect()
            ->route('user.colocation')
            ->with('success', 'You left the colocation successfully.');
    }

}
