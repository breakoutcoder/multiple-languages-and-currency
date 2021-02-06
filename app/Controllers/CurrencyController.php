<?php

namespace App\Controllers;

use App\Config\Auth;
use App\Config\DB\DB;
use App\Config\Request;

/**
 * Class CurrencyController
 * @package App\Controllers
 */
class CurrencyController
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return CurrencyController
     */
    static public function Router(): CurrencyController
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
            view('backend/currency/index.php');
        } else {
            header('location: /login');
        }

    }

    /**
     *
     */
    public function create()
    {
        if (Auth::user()) {
            view('backend/currency/create.php');
        } else {
            header('location: /login');
        }
    }

    /**
     *
     */
    public function post()
    {
        if (Auth::user()) {
            $r = new Request;
            DB::table('currencies')->insert([
                'name' => $r->name,
                'symbol' => $r->symbol,
                'code' => $r->code,
                'exchange_rate' => $r->exchange_rate
            ]);
            back();
        } else {
            header('location: /login');
        }
    }

    /**
     *
     */
    public function status()
    {
        if (Auth::user()) {
            $r = new Request;
            if ($r->value == "true") {
                $data = 1;
            } else {
                $data = 0;
            }
            DB::table('currencies')->where('id', $r->id)->update([
                'status' => $data,
            ]);
        } else {
            header('location: /login');
        }
    }

    /**
     *
     */
    public function sessionCurrency()
    {
        $request = new Request;
        setSession('currency', "$request->code", true);
        back();
    }

    /**
     *
     */
    public function edit()
    {
        if (Auth::user()) {
            view('backend/currency/edit.php');
        } else {
            header('location: /login');
        }
    }

    /**
     *
     */
    public function update()
    {
        if (Auth::user()) {
            $r = new Request;
            DB::table('currencies')->where('id', $r->id)->update([
                'name' => $r->name,
                'symbol' => $r->symbol,
                'code' => $r->code,
                'exchange_rate' => $r->exchange_rate
            ]);
            back();
        } else {
            header('location: /login');
        }
    }
}