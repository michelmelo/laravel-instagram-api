<?php

namespace MichelMelo\InstagramApi;

use Illuminate\Support\ServiceProvider;
use InstagramAPI\Instagram;
use MichelMelo\InstagramApi\Facades\InstagramApi as InstagramApiFacade;

class LaravelInstagramApiProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/mm-instagram-api.php';
        $this->mergeConfigFrom($configPath, 'mm-instagram-api');
        $this->publishes([$configPath => $this->getConfigPath()], 'config');

        $this->registerInstagramApi();
    }

    /**
     * Creating singleton and registering alias
     */
    private function registerInstagramApi()
    {
        $this->app->singleton('instagram.singleton', function ($app) {
            $instance = new Instagram(
                $app['config']->get('instagram-api.debug', false),
                $app['config']->get('instagram-api.truncated_debug', false),
                $app['config']->get('instagram-api.storageConfi', [])
            );

            $useProxy = $app['config']->get('instagram-api.use_proxy', false);
            $proxies = $app['config']->get('instagram-api.proxies', false);

            if ($useProxy && $proxies) {
                $proxy = $proxies[array_rand($proxies, 1)];
                $instance->setProxy($proxy);
            }

            return $instance;
        });

        $this->app->alias('instagram.singleton', InstagramApiFacade::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['instagram.singleton'];
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('mm-instagram-api.php');
    }
}
