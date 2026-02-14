<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class UserAuthentication extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{12,}$/',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);

        return redirect()->route('home');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            return redirect()->route('home');
        } else {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }
    }

    public function forgotPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {

            $token = Password::createToken($user);

          $resetUrl = URL::to('/resetPassword/'.$token.'/'.urlencode($user->email));
            Mail::raw("Hello {$user->name},

You requested a password reset. Click the link below to reset your password:

$resetUrl

If you did not request this, no further action is required.

Thank you.", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Password Reset Link');
            });
        }

        return back()->with('status', 'Password reset link has been sent to your email.');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'                 => 'required',
            'email'                 => 'required|email|exists:users,email',
            'password'              => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{12,}$/',
            'password_confirmation' => 'required|same:password',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('UserLogin')->with('status', 'Password has been reset successfully.');
        } else {
            return back()->withErrors(['email' => 'Failed to reset password. Please try again.']);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
    
}
