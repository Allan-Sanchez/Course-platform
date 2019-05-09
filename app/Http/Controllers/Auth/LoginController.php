<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\UserSocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        session()->flush();
        return redirect('/login');
    }

    // use socialite
    public function redirectToProvider(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    
    public function handleProviderCallback(string $driver)
    {
        if (!request()->has('code') || request()->has('denied')) {
            session()->flash('message',['danger',__("canceled session initiation")]);
            return redirect('login');
        }
        $socialUser = Socialite::driver($driver)->user();
        // dd([$socialUser,$driver]);
        $name = null;

        if ($driver === 'github') {
            if (!$socialUser->name) {
                $name = $socialUser->nickname;
            }else{
                $name = $socialUser->name;
            }
        }
        if ($driver ==='facebook') {
           $name = $socialUser->name;
        }
        $user = null;
        $success = true;
        $email = $socialUser->email;
        $check = User::whereEmail($email)->first();

        if ($check) {
            $user = $check;
        }else{
            DB::beginTransaction();
            
            try {
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    ]);
                UserSocialAccount::create([
                    'user_id' => $user->id,
                    'provider' => $driver,
                    'provider_uid' => $socialUser->id,
                    ]);
                Student::create([
                    'user_id' => $user->id,
                    ]);
                
                
            } catch (\Exeption $exception) {
                $success = $exception->getMessage();
                DB::rollback();
            }
        }

        if ($success === true) {
            DB::commit();
            auth()->loginUsingId($user->id);
             return redirect(route('home'));
        }
        session()->flash('message',['danger',$success]);
        return redirect(route('login'));
    }
}
