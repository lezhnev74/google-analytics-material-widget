<?php

namespace AnalyticsCard\Classes;

use AnalyticsCard\Interfaces\RowInterface;

class Row implements RowInterface {

    private $title = "";
    private $users = 0;
    private $avgTimeOnPage = 0.0;

    public function setTitle($string)
    {
        $this->title = $string;
    }

    public function setUsers($users)
    {
        $this->users = (int) $users;
    }

    public function setAvgTimeOnPage($time)
    {
        $this->avgTimeOnPage = (float) $time;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function getAvgTimeOnPage()
    {
        return $this->avgTimeOnPage;
    }

}