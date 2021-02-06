<?php

namespace App\Controllers;

use App\Config\Auth;

/**
 * Class DashboardControllers
 * @package App\Controllers
 */
class DashboardController
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return DashboardController
     */
    static public function Router(): DashboardController
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
        if (Auth::user()) {
            view('backend/index.php');
        } else {
            header('location: /login');
        }
    }
}