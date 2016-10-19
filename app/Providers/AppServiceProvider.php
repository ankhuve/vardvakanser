<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $client = new Client(['base_uri' => 'http://api.arbetsformedlingen.se/af/v0/']);
        $searchOptions = array();

        try{
//            $results = $client->get('platsannonser/soklista/lan', [
//                'headers' => [
//                    'Accept'          => 'application/json',
//                    'Accept-Language' => 'sv-se,sv'
//                ]
//            ])->getBody()->getContents();
//            $results = json_decode($results);
//            array_push($searchOptions, $results);

            $searchParams = ['yrkesomradeid' => 8];

            $results = $client->get('platsannonser/soklista/yrkesgrupper', [
                'query' => $searchParams,
                'headers' => [
                    'Accept'          => 'application/json',
                    'Accept-Language' => 'sv-se,sv'
                ]
            ])->getBody()->getContents();

            $results = json_decode($results);
            array_push($searchOptions, $results);
            view()->share('searchOptions', $searchOptions);
        } catch(\Exception $e){
            view()->share('afApiError', $e);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
