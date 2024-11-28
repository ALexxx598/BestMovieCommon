<?php

namespace BestMovie\Common\BestMovieStorage\Http;

use BestMovie\Common\BaseApi\BaseApi;
use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageGetPathResponse;
use BestMovie\Common\BestMovieStorage\Http\Response\BestMovieStorageValidatePathResponse;
use GuzzleHttp\Promise\PromiseInterface;

class BestMovieStorageApi extends BaseApi implements BestMovieStorageApiInterface
{
    /**
     * @inheritDoc
     */
    public function validatePath(string $path): BestMovieStorageValidatePathResponse|PromiseInterface
    {
        $result =  $this->get('/api/media-uploader/validate/', [
            'query' => [
                'path' => $path,
            ]
        ]);

        if ($result instanceof PromiseInterface) {
            return $result;
        }

        return BestMovieStorageValidatePathResponse::make($result);
    }

    /**
     * @inheritDoc
     */
    public function getPath(string $path): BestMovieStorageGetPathResponse|PromiseInterface
    {
        $result =  $this->get('/api/media-uploader/', [
            'query' => [
                'path' => $path,
            ]
        ]);

        if ($result instanceof PromiseInterface) {
            return $result;
        }

        return BestMovieStorageGetPathResponse::make($result);
    }
}
