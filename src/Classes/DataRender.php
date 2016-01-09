<?php

namespace AnalyticsCard\Classes;

use Philo\Blade\Blade;

class DataRender
{

    private $cities = [];
    private $countries = [];
    private $blade = null;

    function __construct($view_folder, $cache_folder)
    {
        // @todo it uses Blade template - tightly coupled (but its okay for this purposes)
        $this->initBlade($view_folder, $cache_folder);
    }

    public function setCountries(array $countries)
    {
        $this->countries = $countries;
    }

    /**
     * Create BLADE TEMPLATE engine
     *
     * @param $views
     * @throws \Exception
     */
    private function initBlade($views, $cache)
    {

        if (!is_dir($views)) {
            throw new \Exception("Directory is missed: " . $views);
        }

        if (!is_dir($cache) || !is_writable($cache)) {
            throw new \Exception("Directory is not writable: " . $cache);
        }

        $this->blade = new Blade($views, $cache);
    }

    public function setCities(array $cities)
    {
        $this->cities = $cities;
    }

    /**
     * Return HTML
     */
    public function render($include_files = true)
    {
        $html = "";

        if ($include_files) {
            $html .= $this->include_files();
        }

        $html .= $this->blade->view()->make('card', [
            "countries" => $this->countries,
            "cities"    => $this->cities,
        ])->render();

        return $html;
    }

    /**
     * Return JS\CSS inclusion
     */
    public function include_files()
    {
        $include = $this->blade->view()->make('include')->render();

        return $include;
    }

}