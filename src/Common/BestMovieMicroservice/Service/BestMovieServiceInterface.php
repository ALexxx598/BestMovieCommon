<?php

namespace BestMovie\Common\BestMovieMicroservice\Service;

use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;

interface BestMovieServiceInterface
{
    /**
     * @param string $accessToken
     * @param int $userId
     * @return UserRefreshResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshUser(string $accessToken, int $userId): UserRefreshResponse;
}
