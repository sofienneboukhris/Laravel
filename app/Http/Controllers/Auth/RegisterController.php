<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Notifications\RegisteredUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use \App\notifications\NewNotification;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

      public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUser());
        return  redirect('/')->with('success', 'Votre compte a été bien crée, vous devez le confirmer avec l\'email que vous allez recevoir ');
        $user->notify(new NewNotification(User::findOrFail(1)));
    }

    public function confirm ($id , $token){
    $user = User::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user){
            $user->update(['confirmation_token'=>null]);

        return redirect('http://localhost:4200/login')->with('success','Votre compte a bien été confirmé');
    } else {
        return redirect ('login')->with('error','Ce lien ne semble plus valide' );
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmation_token'=>str_replace('/' , '' , bcrypt(str_random(16)))
        ]);
    }
}
