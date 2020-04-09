<?php

return [
    /**
     * @var boolean
     */
    'debug'           => false,

    /**
     * @var boolean
     */
    'truncated_debug' => false,

    /**
     * Settings adapter
     * @var array|null
     */
    'storage_config'  => [
        'storage'    => 'file',
        'basefolder' => storage_path() . '/instagram-api',
    ],

    /**
     * Enable or disable using proxies in the API
     * @var boolean
     */
    'use_proxy'       => false,
    /**
     * List of the proxies.
     * e.g. https://free-proxy-list.net/
     *
     * @var array
     */
    'proxies'         => [
        //'103.14.8.239:8080',
    ],
];
