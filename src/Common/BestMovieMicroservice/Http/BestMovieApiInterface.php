<?php

namespace BestMovie\Common\BestMovieMicroservice\Http;

use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;

interface BestMovieApiInterface
{
    /**
     * @param array $data
     * @return UserRefreshResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshUser(array $data): UserRefreshResponse;
}
