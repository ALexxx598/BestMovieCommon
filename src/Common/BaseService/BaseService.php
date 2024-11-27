<?php

namespace BestMovie\Common\BaseService;

use BestMovie\Common\BaseService\Exception\WrongProcessHandlerSelectedException;

class BaseService
{
    /**
     * @param array $allowedHandlers
     * @param string $methodName
     * @param ProcessHandleType $type
     * @return void
     * @throws WrongProcessHandlerSelectedException
     */
    protected function validateAllowedProcessHandlers(
        array $allowedHandlers,
        string $methodName,
        ProcessHandleType $type
    ): void {
        if (!in_array($type->value, array_column($allowedHandlers[$methodName], 'value'))) {
            throw new WrongProcessHandlerSelectedException();
        }
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return void
     * @throws WrongProcessHandlerSelectedException
     */
    public function __call(string $name, array $arguments)
    {
        $this->validateAllowedProcessHandlers(
            allowedHandlers: static::ALLOWED_PROCESS_HANDLERS,
            methodName: $name,
            type: $arguments['type']
        );

        call_user_func_array([$this, $name], $arguments);
    }
}