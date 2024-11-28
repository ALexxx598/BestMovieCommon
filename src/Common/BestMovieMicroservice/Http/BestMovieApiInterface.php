<?php

namespace BestMovie\Common\BestMovieMicroservice\Http;

use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;

interface BestMovieApiInterface
{
    /**
     * @param array $data
     * @return UserRefreshResponse|PromiseInterface
     * @throws GuzzleException
     */
    public function refreshUser(array $data): UserRefreshResponse|PromiseInterface;
}
