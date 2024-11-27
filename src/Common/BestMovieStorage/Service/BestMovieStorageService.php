<?php

namespace BestMovie\Common\BestMovieStorage\Service;

use BestMovie\Common\BaseService\BaseService;
use BestMovie\Common\BaseService\ProcessHandleType;
use BestMovie\Common\BestMovieStorage\Http\BestMovieStorageApiInterface;

class BestMovieStorageService extends BaseService implements BestMovieStorageServiceInterface
{
    public const array ALLOWED_PROCESS_HANDLERS = [
        'validatePath' => [
            ProcessHandleType::NATIVE_SYNC,
        ],
        'getPath' => [
            ProcessHandleType::NATIVE_SYNC,
        ],
    ];
    
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
    public function validatePath(string $path, ?ProcessHandleType $type = ProcessHandleType::NATIVE_SYNC): bool
    {
        return $this->bestMovieApi->validatePath($path, $type)->getResult();
    }

    /**
     * @inheritDoc
     */
    public function getPath(string $path, ?ProcessHandleType $type = ProcessHandleType::NATIVE_SYNC): ?string
    {
        return $this->bestMovieApi->getPath($path, $type)->getPath();
    }
}
