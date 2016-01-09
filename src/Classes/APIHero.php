<?php

namespace AnalyticsCard\Classes;

use Google_Service_Analytics;
use AnalyticsCard\Classes\Row;

class APIHero
{

    private $period = "7days";
    private $path = "/";
    private $limit = 5;
    private $service = null;
    private $view = "";

    function __construct(Google_Service_Analytics $service, $view_id)
    {
        $this->service = $service;
        $this->view = $view_id;

    }

    /**
     * Set period to gather from API
     * Example: 7days, 365days
     * Ref: https://developers.google.com/analytics/devguides/reporting/core/v3/reference#startDate
     *
     * @param $string
     */
    public function setPeriod($string)
    {
        $this->period = $string;
    }

    /**
     * Set page URL to get analytics for
     * Example: /page.html, /en/videos
     *
     * @param $string
     */
    public function setPath($string)
    {
        $this->path = $string;
    }

    /**
     * Set limit - how much rows return
     *
     * @param $limit
     */
    public function setLimit($limit)
    {
        $this->limit = (int)$limit;
    }

    /**
     * Return array of Rows with country data
     *
     * @return array
     */
    function getTopCountries()
    {
        $countries = [];

        $results = $this->request(
            '120daysAgo',
            'today',
            'ga:avgTimeOnPage,ga:users',
            [
                "dimensions" => "ga:country,ga:pagePath",
                "filters"    => "ga:pagePath==".$this->path,
                "sort"       => "-ga:users"
            ]
        );

        foreach(array_slice($results->getRows(),0,$this->limit) as $item) {
            $row = new Row();
            $row->setTitle($item[0]);
            $row->setAvgTimeOnPage($item[2]);
            $row->setUsers($item[3]);
            $countries[] = $row;
        }

        return $countries;
    }

    /**
     * Return array of Rows with city data
     *
     * @return array
     */
    function getTopCities()
    {
        $cities = [];

        $results = $this->request(
            '120daysAgo',
            'today',
            'ga:avgTimeOnPage,ga:users',
            [
                "dimensions" => "ga:country,ga:city,ga:pagePath",
                "filters"    => "ga:pagePath==".$this->path,
                "sort"       => "-ga:users"
            ]
        );

        foreach(array_slice($results->getRows(),0,$this->limit) as $item) {
            $row = new Row();
            $row->setTitle($item[1].", ".$item[0]);
            $row->setAvgTimeOnPage($item[3]);
            $row->setUsers($item[4]);
            $cities[] = $row;
        }

        return $cities;
    }

    /**
     * Make actual request to API
     *
     * @param $data
     * @return \Google_Service_Analytics_GaData
     */
    private function request($date_from,$date_to="today",$metrics,$args=[])
    {
        $results = $this->service->data_ga->get('ga:' . $this->view, $date_from, $date_to, $metrics, $args);

        return $results;
    }
}