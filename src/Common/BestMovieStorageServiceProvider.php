<?php

namespace BestMovie\Common;

use BestMovie\Common\BaseApi\HttpClient;
use BestMovie\Common\BestMovieStorage\Http\BestMovieStorageApi;
use BestMovie\Common\BestMovieStorage\Http\BestMovieStorageApiInterface;
use BestMovie\Common\BestMovieStorage\Service\BestMovieStorageService;
use BestMovie\Common\BestMovieStorage\Service\BestMovieStorageServiceInterface;
use Illuminate\Config\Repository as Config;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class BestMovieStorageServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->registerBestMovieStorageApi();

        $this->registerBestMovieStorageService();
    }

    private function registerBestMovieStorageApi(): void
    {
        $this->app->singleton(
            BestMovieStorageApiInterface::class,
            function (Application $app): BestMovieStorageApi {

                return new BestMovieStorageApi(
                    $app[HttpClient::class],
                    $app[Config::class],
                    'BEST_MOVIE_STORAGE_MS'
                );
            });
    }

    private function registerBestMovieStorageService(): void
    {
        $this->app->singleton(BestMovieStorageServiceInterface::class, BestMovieStorageService::class);
    }
}
