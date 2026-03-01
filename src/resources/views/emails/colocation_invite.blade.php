{{--
<h1>You are invited!</h1>
<p>You have been invited to join <strong>{{ $invitation->colocation->name }}</strong> by the owner.</p>
<p>Click the link below to join:</p>
<a href="{{ url('/join-colocation/'.$invitation->token) }}">Join Colocation</a>
<p>Thanks,<br>{{ config('app.name') }}</p> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Colocation Invitation</title>
</head>

<body style="margin:0; padding:0; background:#0f172a; font-family:Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
<tr>
<td align="center">

    <table width="500" cellpadding="0" cellspacing="0"
        style="background:#111827; border-radius:12px; padding:30px; color:white;">

        <tr>
            <td align="center">
                <h1 style="margin:0; color:#22c55e;">
                    You're Invited!
                </h1>
            </td>
        </tr>

        <tr><td height="20"></td></tr>

        <tr>
            <td style="color:#cbd5e1; font-size:15px; text-align:center; line-height:1.6;">
                You have been invited to join the colocation:
                <br><br>

                <strong style="color:white; font-size:18px;">
                    {{ $invitation->colocation->name }}
                </strong>

                <br><br>
                Click the button below to accept the invitation and join your roommates.
            </td>
        </tr>

        <tr><td height="30"></td></tr>

        <tr>
            <td align="center">

                <a href="{{ url('/join-colocation/'.$invitation->token) }}"
                   style="
                        background:#22c55e;
                        color:white;
                        padding:14px 28px;
                        text-decoration:none;
                        border-radius:8px;
                        font-weight:bold;
                        display:inline-block;
                   ">
                    ✅ Accept Invitation
                </a>

            </td>
        </tr>

        <tr><td height="25"></td></tr>

        <tr>
            <td style="text-align:center; font-size:13px; color:#94a3b8;">
                If you don't want to join, simply ignore this email.
            </td>
        </tr>

        <tr><td height="30"></td></tr>

        <tr>
            <td style="text-align:center; font-size:12px; color:#64748b;">
                Sent by {{ config('app.name') }}
            </td>
        </tr>

    </table>

</td>
</tr>
</table>

</body>
</html>
