<?php

namespace AnalyticsCard\Classes;

class DataRender {

    private $cities = [];
    private $countries = [];

    public function setCountries(array $countries) {
        $this->countries = $countries;
    }

    public function setCities(array $cities) {
        $this->cities = $cities;
    }

    /**
     * Return HTML
     */
    public function render($include_files = true) {
        $html = "";

        if($include_files) {
            $html .= $this->include_files();
        }

        return $html;
    }

    /**
     * Return JS\CSS inclusion
     */
    public function include_files() {
        $include = "
            
        ";
        return $include;
    }

}