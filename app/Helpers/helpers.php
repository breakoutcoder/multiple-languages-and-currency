<?php

use App\Config\DB\DB;

/**
 * @return object
 */
function languages()
{
    return DB::table('languages')->where('status', 1)->get();
}

function translate($key, $lang = null)
{
    if ($lang == null) {
        if (getSession('locale')) {
            $locale = DB::table('languages')->where('code', getSession('locale'))->where('status', 1)->first();
            if ($locale) {
                $lang = getSession('locale');
            } else {
                $lang = env('DEFAULT_LANGUAGE');
            }
        } else {
            $lang = env('DEFAULT_LANGUAGE');
        }
    }
    $translation_def = DB::table('translations')->where('lang_key', $key)->where('lang', $lang)->first();
    if ($translation_def == null) {
        DB::table('translations')->insert([
            'lang' => $lang,
            'lang_key' => $key,
            'lang_value' => $key
        ]);
        echo $key;
    } else {
        echo $translation_def->lang_value;
    }
}

function currencies()
{
    return DB::table('currencies')->where('status', 1)->get();
}