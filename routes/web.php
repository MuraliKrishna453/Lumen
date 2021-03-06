<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$api = app("Dingo\Api\Routing\Router");

$api->version('v1',function($api){
    $api->group(['prefix'=>'oauth'],function($api){
$api->post('token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    });

    $api->group(['namespace'=>'\App\Http\Controllers','middleware'=>['cors']],function($api){
        //controller routes
        $api->get('users','UserController@show');
        $api->get('users/{id}','UserController@showUser');

    });

});

