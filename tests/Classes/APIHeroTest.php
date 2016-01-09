<?php

use AnalyticsCard\Classes\APIHero;
use AnalyticsCard\Classes\APIHandler;

class APIHeroTest extends PHPUnit_Framework_TestCase
{

    private $hero = null;
    private $tmp = "";

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->tmp = __DIR__."/../tmp/";
        if(!is_dir($this->tmp)) {
            mkdir($this->tmp);
        };
    }

    protected function tearDown()
    {
        exec('rm -rf '.$this->tmp);
        parent::tearDown(); // TODO: Change the autogenerated stub
    }


    function test_request_get_countries()
    {

        $limit = 3;

        $this->hero = new APIHero(function(){

            $handler = new APIHandler(getenv('ACCESS_FILE_P12'), getenv('SERVICE_EMAIL'));
            $service = $handler->getService();
            $view = $handler->getFirstprofileId(getenv('TRACKING_ID'));

            return [$service, $view];

        }, $this->tmp);
        $this->hero->setLimit($limit);

        // make request
        $results = $this->hero->getTopCountries();

        // just be sure that data was returned
        $this->assertNotEquals(0, count($results));
        $this->assertFalse(count($results) > $limit);

        $this->assertInstanceOf('AnalyticsCard\Classes\Row', $results[0]);


    }

    function test_request_get_cities()
    {

        $limit = 3;
        $handler = new APIHandler(getenv('ACCESS_FILE_P12'), getenv('SERVICE_EMAIL'));
        $service = $handler->getService();
        $view = $handler->getFirstprofileId(getenv('TRACKING_ID'));

        $this->hero = new APIHero(function(){

            $handler = new APIHandler(getenv('ACCESS_FILE_P12'), getenv('SERVICE_EMAIL'));
            $service = $handler->getService();
            $view = $handler->getFirstprofileId(getenv('TRACKING_ID'));

            return [$service, $view];

        }, $this->tmp);
        $this->hero->setLimit($limit);

        // make request
        $results = $this->hero->getTopCities();

        // just be sure that data was returned
        $this->assertNotEquals(0, count($results));
        $this->assertFalse(count($results) > $limit);

        $this->assertInstanceOf('AnalyticsCard\Classes\Row', $results[0]);


    }

}