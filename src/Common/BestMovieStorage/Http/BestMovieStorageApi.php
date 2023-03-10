<?php

namespace BestMovie\Common\BestMovieStorage\Http;

use BestMovie\Common\BaseApi\BaseApi;
use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageGetPathResponse;
use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageValidatePathResponse;

class BestMovieStorageApi extends BaseApi implements BestMovieStorageApiInterface
{
    /**
     * @inheritDoc
     */
    public function validatePath(string $path): BestMovieStorageValidatePathResponse
    {
        return BestMovieStorageValidatePathResponse::make(
            $this->get('/api/media-uploader/validate/', [
                'query' => [
                    'path' => $path,
                ]
            ])
        );
    }

    /**
     * @inheritDoc
     */
    public function getPath(string $path): BestMovieStorageGetPathResponse
    {
        return BestMovieStorageGetPathResponse::make(
            $this->get('/api/media-uploader/', [
                'query' => [
                    'path' => $path,
                ]
            ])
        );
    }
}
