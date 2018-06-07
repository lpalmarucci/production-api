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
/*$router->get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 'client-id',
        'redirect_uri' => 'http://example.com/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://localhost:8080/oauth/authorize?'.$query);
});*/
$router->post('/hardware-code/{ticket}','productionController@getCode');
$router->get('/users','productionController@allUsers');
$router->get('/hardware-code/{ticket}',"productionController@getCode");
$router->options('/hardware-code/{ticket}',"productionController@option");
