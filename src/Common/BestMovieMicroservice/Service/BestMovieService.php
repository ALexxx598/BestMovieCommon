<?php

namespace BestMovie\Common\BestMovieMicroservice\Service;

use BestMovie\Common\BaseService\BaseService;
use BestMovie\Common\BaseService\ProcessHandleType;
use BestMovie\Common\BestMovieMicroservice\Http\BestMovieApiInterface;
use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;

class BestMovieService extends BaseService implements BestMovieServiceInterface
{
    /**
     *
     */
    public const array ALLOWED_PROCESS_HANDLERS = [
        'refreshUser' => [
            ProcessHandleType::NATIVE_SYNC,
        ],
    ];

    public function __construct(
        private BestMovieApiInterface $bestMovieApi,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function refreshUser(
        string $accessToken,
        int $userId,
        ?ProcessHandleType $type = ProcessHandleType::NATIVE_SYNC
    ): UserRefreshResponse {
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
        ], $type);
    }
}
