<?php

namespace BestMovie\Common\BestMovieStorage\Service;

interface BestMovieStorageServiceInterface
{
    /**
     * @param string $path
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function validatePath(string $path): bool;

    /**
     * @param string $path
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPath(string $path): ?string;
}
