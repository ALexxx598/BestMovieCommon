<?php

namespace BestMovie\Common\BestMovieMicroservice\Http;

use BestMovie\Common\BaseApi\BaseApi;
use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;

class BestMovieApi extends BaseApi implements BestMovieApiInterface
{
    /**
     * @inheritDoc
     */
    public function refreshUser(array $data): UserRefreshResponse
    {
        return UserRefreshResponse::make(
            $this->get('/api/user/refresh/', $data)
        );
    }
}
