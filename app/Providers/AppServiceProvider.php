<?php

namespace App\Providers;
//require_once '../vendor/autoload.php';

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        //LumenPassport::routes($this->app);
        //$this->registerPolicies();
        // $client = new Client(); //GuzzleHttp\Client
        // $result = $client->post('http://127.0.0.1:8080/oauth/token', [
        //     'form_params' => [
        //         'grant_type' => 'refresh_token',
        //         'refresh_token' => 'the-refresh-token',
        //         'client_id' => '13',
        //         'client_secret' => 'LZx2Wj84zdZGpnTjGiRvdlQ34fgz6EA1h8sfRE7N',
        //         'scope' => '',
        //     ]
        // ]);
        //
        // return json_decode((string) $response->getBody(), true);
    }
}
