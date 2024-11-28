<?php

namespace BestMovie\Common\BestMovieStorage\Http;

use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageGetPathResponse;
use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageValidatePathResponse;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;

interface BestMovieStorageApiInterface
{
    /**
     * @param string $path
     * @return BestMovieStorageValidatePathResponse|PromiseInterface
     * @throws GuzzleException
     */
    public function validatePath(string $path): BestMovieStorageValidatePathResponse|PromiseInterface;

    /**
     * @param string $path
     * @return BestMovieStorageGetPathResponse|PromiseInterface
     * @throws GuzzleException
     */
    public function getPath(string $path): BestMovieStorageGetPathResponse|PromiseInterface;
}

