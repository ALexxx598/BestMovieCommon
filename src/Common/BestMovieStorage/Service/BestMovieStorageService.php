<?php

namespace BestMovie\Common\BestMovieStorage\Service;

use BestMovie\Common\BestMovieStorage\Http\BestMovieStorageApiInterface;

class BestMovieStorageService implements BestMovieStorageServiceInterface
{
    /**
     * @param BestMovieStorageApiInterface $bestMovieApi
     */
    public function __construct(
        private BestMovieStorageApiInterface $bestMovieApi,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function validatePath(string $path): bool
    {
        return $this->bestMovieApi->validatePath($path)->getResult();
    }

    /**
     * @inheritDoc
     */
    public function getPath(string $path): ?string
    {
        return $this->bestMovieApi->getPath($path)->getPath();
    }
}
