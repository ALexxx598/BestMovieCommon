<?php

namespace BestMovie\Common;

use BestMovie\Common\BaseApi\HttpClient;
use BestMovie\Common\BestMovieMicroservice\Http\BestMovieApi;
use BestMovie\Common\BestMovieMicroservice\Http\BestMovieApiInterface;
use BestMovie\Common\BestMovieMicroservice\Service\BestMovieService;
use BestMovie\Common\BestMovieMicroservice\Service\BestMovieServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Config\Repository as Config;
use Illuminate\Foundation\Application;

class BestMovieServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->registerBestMovieApi();

        $this->registerBestMovieService();
    }

    private function registerBestMovieApi(): void
    {
        $this->app->singleton(
            BestMovieApiInterface::class,
            function (Application $app): BestMovieApi {

                return new BestMovieApi(
                    $app[HttpClient::class],
                    $app[Config::class],
                    'BEST_MOVIE_MS'
                );
            }
        );
    }

    private function registerBestMovieService(): void
    {
        $this->app->singleton(BestMovieServiceInterface::class, BestMovieService::class);
    }
}
