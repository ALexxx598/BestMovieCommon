<?php

namespace BestMovie\Common\BestMovieMicroservice\Http\Response;

use BestMovie\Common\BaseApi\BaseResponse\BaseResponse;

class UserRefreshResponse extends BaseResponse
{
    protected const ADMIN = 'ADMIN';

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return collect($this->getData()['roles'] ?? [])
            ->filter(fn (string $role) => $role === self::ADMIN)
            ->isNotEmpty();
    }
}
