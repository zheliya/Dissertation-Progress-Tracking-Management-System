<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {

/*         Mail::send('auth.emails.password_reset_link', [], function ($message) {
            $message->to("zheliya8@gmail.com", "zheliya8@gmail.com");
            $message->subject('Reset Password Link');
            $message->from('zheliyasalam@gmail.com', 'Google');
        });
        return back(); */

        $request->validate(['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            $user = User::where('email', $request->email)->first();

            $resetLink = $this->generatePasswordResetLink($user->email);

            Mail::send('auth.emails.password_reset_link', ['user' => $user, 'resetLink' => $resetLink], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Reset Password Link');
            });

            return back()->with('status', trans($response));
        }

        return back()->withErrors(
            ['email' => trans($response)]
        );
       
    }

    private function generatePasswordResetLink($email)
    {
        return Password::createToken(User::where('email', $email)->first());
    }
}
