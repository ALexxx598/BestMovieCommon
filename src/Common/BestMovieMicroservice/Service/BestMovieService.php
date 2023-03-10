<?php

namespace BestMovie\Common\BestMovieMicroservice\Service;

use BestMovie\Common\BestMovieMicroservice\Http\BestMovieApiInterface;
use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;

class BestMovieService implements BestMovieServiceInterface
{
    public function __construct(
        private BestMovieApiInterface $bestMovieApi,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function refreshUser(string $accessToken, int $userId): UserRefreshResponse
    {
        return $this->bestMovieApi->refreshUser([
            'headers' => [
                'authorization' => $accessToken,
            ],
            'form_params' => [
                'user_id' => $userId,
            ],
            'query' => [
                'user_id' => $userId,
            ]
        ]);
    }
}
