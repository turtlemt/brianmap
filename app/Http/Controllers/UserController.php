<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Menu;

class UserController extends Controller
{
    protected $navMenu = '';
    protected $title = '';
    protected $redirectTo = 'map/findall';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        
        $this->navMenu = Menu::getMenu();
        $this->title = Menu::getTitle();
    }
    
    /**
     * User login
     *
     * @param  $request
     * @return view
     */
    public function login(Request $request)
    {
        $error = '';
        if (Auth::check()) {
            return redirect()->intended('map/findall');
        }
        
        if ($request->isMethod('post')) {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                // Authentication passed...
                return redirect()->intended('map/findall');
            } else {
                $error = 'login fail';
            }
        }
        return view('user.login', ['menu' => $this->navMenu,
                                   'error' => $error]);
    }
    
    /**
     * User logout
     *
     * @param  $request
     * @return view
     */
    public function logout()
    {
        $error = '';
        Auth::logout();
        //return redirect()->intended('map/findall');
        return view('user.login', ['menu' => $this->navMenu,
                                   'error' => $error]);
    }
    
    /**
     * User register
     *
     * @param  $request
     * @return view
     */
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            return redirect()->intended('user/login');
        }
        return view('user.register', ['menu' => $this->navMenu]);
    }
}
