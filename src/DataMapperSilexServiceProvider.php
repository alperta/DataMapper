<?php

namespace RedefineLab\DataMapper;

class DataMapperSilexServiceProvider implements \Silex\ServiceProviderInterface
{

    public function boot(\Silex\Application $app)
    {
        $app['data_mapper'] = $app->share(function () use ($app) {
            return new DataMapper();
        });
    }

    public function register(\Silex\Application $app)
    {
        // Nothing to do here
    }

}