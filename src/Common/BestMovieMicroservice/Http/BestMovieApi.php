<?php

namespace BestMovie\Common\BestMovieMicroservice\Http;

use BestMovie\Common\BaseApi\BaseApi;
use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;

class BestMovieApi extends BaseApi implements BestMovieApiInterface
{
    /**
     * @inheritDoc
     */
    public function refreshUser(array $data): UserRefreshResponse|PromiseInterface
    {
        $result = $this->get('/api/user/refresh/', $data);

        if ($result instanceof PromiseInterface) {
            return $result;
        }

        return UserRefreshResponse::make($result);
    }
}
