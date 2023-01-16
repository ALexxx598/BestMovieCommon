<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Http;

use GenerateEmailCodeResponse;

interface EmailTemplateApiInterface
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generateCode(array $data): GenerateEmailCodeResponse;
}
