<?php

namespace Common;

use Common\BaseApi\HttpClient;
use Common\EmailTemplateMicroservice\Http\EmailTemplateApi;
use Common\EmailTemplateMicroservice\Http\EmailTemplateApiInterface;
use Common\EmailTemplateMicroservice\Service\EmailTemplateService;
use Common\EmailTemplateMicroservice\Service\EmailTemplateServiceInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class EmailTemplateServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->registerEmailTemplateApi();
        $this->registerEmailTemplateService();
    }

    private function registerEmailTemplateApi(): void
    {
        $this->app->singleton(
            EmailTemplateApiInterface::class,
            function (Application $app): EmailTemplateApi {

                return new EmailTemplateApi(
                    $app[HttpClient::class],
                    $app[Config::class],
                    'EMAIL_TEMPLATE_MS'
                );
            }
        );
    }

    public function registerEmailTemplateService(): void
    {
        $this->app->singleton(EmailTemplateServiceInterface::class, EmailTemplateService::class);
    }
}
