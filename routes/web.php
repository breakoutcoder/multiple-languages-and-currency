<?php

/**
 * dynamic url (\w+)
 */

use App\Config\Router;
use App\Controllers\HomeController;
use App\Controllers\DashboardController;
use App\Controllers\LanguageController;
use App\Controllers\CurrencyController;

Router::get('/', [HomeController::class, 'index']);
Router::get('/(\w+)/dynamic', 'HomeController@dynamic');
Router::get('/dashboard', [DashboardController::class, 'index']);
Router::get('/language', [LanguageController::class, 'index']);
Router::get('/language/create', [LanguageController::class, 'create']);
Router::post('/language/translate',[LanguageController::class, 'translate']);
Router::post('/language',[LanguageController::class, 'post']);
Router::post('/language/status',[LanguageController::class, 'status']);
Router::get('/language/translate/(\w+)',[LanguageController::class, 'translatelang']);
Router::post('/language/translate/update',[LanguageController::class, 'update']);
Router::post('/language/translate/delete',[LanguageController::class, 'delete']);
Router::get('/currency', [CurrencyController::class, 'index']);
Router::get('/currency/create', [CurrencyController::class, 'create']);
Router::post('/currency/status', [CurrencyController::class, 'status']);
Router::post('/currency/sessioncurrency', [CurrencyController::class, 'sessionCurrency']);
Router::get('/currency/edit/(\w+)', [CurrencyController::class, 'edit']);
Router::post('/currency/update', [CurrencyController::class, 'update']);
Router::get('/login', [HomeController::class, 'login']);
Router::post('/login', [HomeController::class, 'loginPost']);
Router::get('/register', [HomeController::class, 'register']);
Router::post('/register', [HomeController::class, 'registerPost']);
Router::get('/logout', [HomeController::class, 'logout']);
Router::cleanup();