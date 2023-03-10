<?php

namespace BestMovie\Common\BestMovieStorage\Http\Response;

use BestMovie\Common\BaseApi\BaseResponse\BaseResponse;

class BestMovieStorageGetPathResponse extends BaseResponse
{
    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->getData()['path'] ?? null;
    }
}
