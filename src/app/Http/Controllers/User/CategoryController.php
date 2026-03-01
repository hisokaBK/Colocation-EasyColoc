<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Colocation;

class CategoryController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $colocation = auth()->user()
            ->colocations()
            ->where('colocations.id', $id)
            ->where('colocations.status', 'active')
            ->firstOrFail();

        Category::create([
            'name' => $request->name,
            'colocation_id' => $colocation->id
        ]);

        return back()->with('success','Category added');
    }

     public function destroy(Category $category)
     {
         $category->delete();
     
         return back()->with('success', 'Category deleted successfully');
     }
}
