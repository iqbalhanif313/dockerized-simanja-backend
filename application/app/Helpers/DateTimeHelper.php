<?php

namespace App\Helpers;

use DateTime;

class DateTimeHelper
{
    public static function diff($origin, $target, $result = '*') {
        $origin = new DateTime($origin);
        $target = new DateTime($target);
        $interval = $origin->diff($target);
        switch ($result) {
            case '*':
                return $interval;
            case 'days':
                return $interval->days;
            case 'months':
                return $interval->m;
            case 'years':
                return $interval->y;
            case 'hours':
                return  ($interval->h) + ($interval->i/60) + ($interval->s/3600);
            case 'minutes':
                return  ($interval->h*60) + ($interval->i) + ($interval->s/60);
            case 'seconds':
                return  ($interval->h*3600) + ($interval->i*60) + ($interval->s);
            case 'sign':
                return $interval->format('%R');
        }
        return 0;
    }
}
