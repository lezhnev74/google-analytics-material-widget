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

    public function getAvgTimeOnPage($asFloat=false)
    {
        if($asFloat) {
            return $this->avgTimeOnPage;
        }

        return self::timeForHumans($this->avgTimeOnPage);
    }

    static function timeForHumans($float_seconds) {
        if(!$float_seconds) {
            return "0";
        }

        if($float_seconds < 60) {
            return (int) $float_seconds . " sec";
        } else {
            return round($float_seconds/60,1) . " min";
        }
    }

    /**
     * Return summ of all given rows users
     *
     * @param array $rows
     */
    static function sumUsers(array $rows) {
        $sum = 0;

        foreach($rows as $row) {
            $sum += $row->getUsers();
        }

        return $sum;
    }

    /**
     * Calculate avg time on page
     *
     * @param array $rows
     */
    static function avgTimeOnPage(array $rows) {
        $avgSum = 0;
        $count = 0;

        foreach($rows as $row) {
            $avgSum += $row->getAvgTimeOnPage(true);
            $count++;
        }

        return self::timeForHumans($count?$avgSum/$count:0);


    }

}