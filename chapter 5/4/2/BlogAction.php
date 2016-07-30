<?php
/**
 * Created by PhpStorm.
 * User: shaco
 * Date: 16-7-30
 * Time: 上午9:18
 */

class BlogAction {

    public function detail() {
        echo 'detail' . "<p>&nbsp;</p>";
    }

    public function test($year = 2014, $month = 4, $day = 21) {
        echo $year . '--' . $month . '--' . $day . "<p>&nbsp;</p>";
    }

    public function _before_detail() {
        echo "join".__FUNCTION__ . "<p>&nbsp;</p>";
    }

    public function _after_detail() {
        echo __FUNCTION__ . "<p>&nbsp;</p>";
    }
}
