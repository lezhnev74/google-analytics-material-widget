<?php

namespace AnalyticsCard\Classes;

/**
 * Class Runtime
 * Incapsulates runtime instantiations in single method
 *
 * @package AnalyticsCard\Classes
 */
class Runtime {



    /**
     * Render view
     *
     * @param $view
     */
//    static function execute($view,$view_folder,$cache_folder,$config) {
//
//        $render = self::init($view_folder,$cache_folder,$config);
//
//        echo $render->render($view);
//
//
//    }
//



    /**
     * Render view with HTML around
     *
     * @param $view
     */
    static function execute($view, $view_folder,$cache_folder,$config) {

        $render = self::init($view_folder,$cache_folder,$config);

        // Emulate real HTML
        echo "
            <!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"utf-8\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

                <link rel=\"stylesheet\" type=\"text/css\" href=\"static/include.css\" />

            </head>
            <body style='padding:0px;'>
            <div style=''>
                ";
                    //echo $render->render("card-horizontal");
                    //echo $render->render("card");
                    echo $render->render($view);
                    echo "
            </div>
            </body>
            </html>
        ";


    }


    private static function init($view_folder,$cache_folder,$config_path) {

        define('CardsConst',1);

        // SETTINGS
        $config = require($config_path);
        $config_root = dirname($config_path);

        // get stats for this page
        // make it work from iframe

        $path = "/";
        if(isset($_GET['path'])) {
            $path = $_GET['path'];
        };
        if(isset($_SERVER['HTTP_REFERER'])) {
            $path = $_SERVER['HTTP_REFERER'];
        }

        if(substr($path,0,4)=="http") {
            // get relative path only
            $path = parse_url($path, PHP_URL_PATH);
        }
        //$_SERVER['REQUEST_URI'];


        // CLASSES
        $hero = new APIHero(function() use ($config, $config_root) {
            $handler = new APIHandler($config_root."/".$config['ACCESS_FILE'], $config['SERVICE_EMAIL']);
            $service = $handler->getService();
            $view = $handler->getFirstprofileId($config['TRACKING_ID']);
            return [$service, $view];

        }, $cache_folder);
        $hero->setPath($path);
        $hero->setLimit(5);
        $hero->setPeriod($config['TRACKING_PERIOD_DAYS']);

        // make request
        $countries = $hero->getTopCountries();
        $cities = $hero->getTopCities();

        // RENDER HTML
        $render = new DataRender($view_folder, $cache_folder);
        $render->setColor($config['material_color']);
        $render->setCountries($countries);
        $render->setCities($cities);
        $render->setDays($config['TRACKING_PERIOD_DAYS']);

        return $render;
    }

}