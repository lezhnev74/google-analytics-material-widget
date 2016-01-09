<?php

namespace AnalyticsCard\Interfaces;

/**
 * Interface RowInterface
 *
 * Describes some dimension with given name like "Russia"
 */
interface RowInterface {
    public function setTitle($string);
    public function setUsers($users);
    public function setAvgTimeOnPage($time);

    public function getTitle();
    public function getUsers();
    public function getAvgTimeOnPage();
}