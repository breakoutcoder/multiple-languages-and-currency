<?php

namespace App\Controllers;

use App\Config\Auth;
use App\Config\DB\DB;
use App\Config\Request;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return HomeController
     */
    static public function Router(): HomeController
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     *
     */
    public function index()
    {

        header('location: /login');
    }

    /**
     *
     */
    public function dynamic()
    {
        echo "<h1 style='text-align: center'>This Is Dynamic Page</h1>";
    }

    /**
     *
     */
    public function login()
    {
        if (Auth::user()) {
            header('location: /dashboard');
        } else {
            view('login.php');
        }
    }

    /**
     *
     */
    public function register()
    {
        if (Auth::user()) {
            header('location: /dashboard');
        } else {
            view('register.php');
        }

    }

    /**
     *
     */
    public function registerPost()
    {
        $r = new Request;

        if ((DB::table('users')->where('email', $r->email)->exists()) == false) {
            DB::table('users')->insert([
                'name' => $r->name,
                'email' => $r->email,
                'password' => password_hash($r->password, PASSWORD_DEFAULT),
            ]);
            Auth::attempt($r->email, $r->password);
            header('location: /dashboard');
        } else {
            back();
        }
    }

    /**
     *
     */
    public function loginPost()
    {
        $r = new Request;
        if (Auth::attempt($r->email, $r->password)) {
            header('location: /dashboard');
        } else {
            back();
        }
    }

    /**
     *
     */
    public function logout()
    {
        unsetSession('login');
        unsetSession('user_id');
        back();
    }
}