<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\User;
use Mews\Captcha\Facades\Captcha;

class AuthController extends Controller
{
    public function loginForm()
    {
        $captcha = Captcha::img();
        return view('auth.login',compact('captcha'));
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required'
        ]);
         
        $user = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password')];

        User::create($user);

        return redirect()->route('loginForm')->with('message', 'User was successfully created');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'login'     => 'required',
            'password'  => 'required|min:6',
            'captcha' => 'required|captcha'
        ]);
        
        $validName = User::where('email', $request->get('login'))->where('password', $request->get('password'))->firstOr(function () {

            return null;
        });

        if($validName)
        {
            return redirect()->route('home');
        }
        else
        {
            return redirect()->route('login')->withErrors(['authentication'=>'email or password not correct']);
        }
    }

    public function resetPasswordForm()
    {
        $email = Crypt::decryptString(request('token'));
        $captcha = Captcha::img();
        return view('auth.resetPassword', compact('email','captcha'));
    }

    public function resetPassword(Request $request)
    {
        $validator = $request->validate([
            'password'  => 'required|min:6|same:repeatPassword',
            'repeatPassword'  => 'required|min:6|same:password',
            'captcha' => 'required|captcha'
        ]);
    }
}