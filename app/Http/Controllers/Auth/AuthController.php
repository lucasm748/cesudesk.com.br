<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Request;
use App\User;
use Validator;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'login' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'ativo' => 'required|boolean',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'ativo' => $data['ativo'],
        ]);
    }

  public function postLogin(Request $request)
    {

        $dados = Request::all();
        $login = $dados['login'];
        $password = $dados['password'];

        if (Auth::attempt(['login' => $login, 'password' => $password, 'active' => true])) {
            return redirect()->intended('welcome');
        }
        \Session::flash('alert-class', 'alert-warning');
        \Session::flash('status', 'Falha na autenticação, verifique os dados informados e tente novamente.');
         return redirect()->back();
    }

    public function getLogin()
    {
        return view('login');
    }

    public function getLogout()
    {  
        Auth::logout();
        return view('login');
    }
}
