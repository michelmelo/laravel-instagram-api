<?php
namespace MichelMelo\InstagramApi\Facades;

class InstagramApi extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'instagram.singleton';
    }
}
