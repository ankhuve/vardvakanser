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
        $categories = config('app.yrkesomradeid');


        try{
            if(count($categories) > 1){
                foreach ($categories as $index => $category){
                    $searchParams = ['yrkesomradeid' => $category];

                    $results = $client->get('platsannonser/soklista/yrkesgrupper', [
                        'query' => $searchParams,
                        'headers' => [
                            'Accept'          => 'application/json',
                            'Accept-Language' => 'sv-se,sv'
                        ]
                    ])->getBody()->getContents();

                    $results = json_decode($results);
                    if($index === 0){
                        array_push($searchOptions, $results);
                    } else{
                        foreach ($results->soklista->sokdata as $c){
                            array_push($searchOptions[0]->soklista->sokdata, $c);
                        }
                        $searchOptions[0]->soklista->totalt_antal_platsannonser += $results->soklista->totalt_antal_platsannonser;
                        $searchOptions[0]->soklista->totalt_antal_ledigajobb += $results->soklista->totalt_antal_ledigajobb;
                    }
                }
            } else{
                $searchParams = ['yrkesomradeid' => array_first($categories)];

                $results = $client->get('platsannonser/soklista/yrkesgrupper', [
                    'query' => $searchParams,
                    'headers' => [
                        'Accept'          => 'application/json',
                        'Accept-Language' => 'sv-se,sv'
                    ]
                ])->getBody()->getContents();

                $results = json_decode($results);
                array_push($searchOptions, $results);
            }
        }catch(\Exception $e){
            view()->share('afApiError', $e);
        }
        view()->share('searchOptions', $searchOptions);
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
