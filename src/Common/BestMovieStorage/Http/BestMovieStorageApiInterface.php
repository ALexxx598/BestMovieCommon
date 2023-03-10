<?php

namespace BestMovie\Common\BestMovieStorage\Http;

use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageGetPathResponse;
use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageValidatePathResponse;

interface BestMovieStorageApiInterface
{
    /**
     * @param string $path
     * @return BestMovieStorageValidatePathResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function validatePath(string $path): BestMovieStorageValidatePathResponse;

    /**
     * @param string $path
     * @return BestMovieStorageGetPathResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPath(string $path): BestMovieStorageGetPathResponse;
}

