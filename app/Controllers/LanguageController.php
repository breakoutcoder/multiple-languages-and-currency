<?php

namespace App\Controllers;

use App\Config\Auth;
use App\Config\DB\DB;
use App\Config\Request;

/**
 * Class LanguageController
 * @package App\Controllers
 */
class LanguageController
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return LanguageController
     */
    static public function Router(): LanguageController
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
            view('backend/language/index.php');
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
            view('backend/language/create.php');
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
            $request = new Request;
            $code = DB::table('languages')->where('code', $request->code)->exists();
            if ($code == false) {
                DB::table('languages')->insert([
                    'name' => $request->name,
                    'code' => $request->code
                ]);
            }
            back();
        } else {
            header('location: /login');
        }
    }

    /**
     *
     */
    public function translate()
    {
        $request = new Request;
        setSession('locale', "$request->code", true);
        back();
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
            DB::table('languages')->where('id', $r->id)->update([
                $r->key => $data,
            ]);
            echo $r->key;
        } else {
            header('location: /login');
        }
    }

    /**
     *
     */
    public function translatelang()
    {
        if (Auth::user()) {
            $language = DB::table('languages')->where('id', requestURI()->name2)->first();
            if ($language) {
                view('backend/language/translate.php');
            } else {
                header('location: /language');
            }
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
            foreach ($r->values as $key => $value) {
                $translation_def = DB::table('translations')->where('lang_key', $key)->where('lang', $r->code)->first();
                if ($translation_def == null) {
                    DB::table('translations')->insert([
                        'lang' => $r->code,
                        'lang_key' => $key,
                        'lang_value' => $value
                    ]);
                } else {
                    DB::table('translations')->where('lang_key', $key)->where('lang', $r->code)->update([
                        'lang_value' => $value
                    ]);
                }
            }
            back();
        } else {
            header('location: /login');
        }
    }

    /**
     *
     */
    public function delete()
    {
        if (Auth::user()) {
            $r = new Request;
            DB::table('languages')->where('id', $r->id)->delete();
            DB::table('translations')->where('lang', $r->code)->delete();
            back();
        } else {
            header('location: /login');
        }
    }

}