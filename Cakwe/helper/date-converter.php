<?php
function timeAgo($date)
{
    $timestamp = strtotime($date);
    $currentTime = time();
    $timeDifference = $currentTime - $timestamp;

    if ($timeDifference < 1) {
        return 'just now';
    }

    $timeUnits = [
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    ];

    foreach ($timeUnits as $unit => $text) {
        if ($timeDifference < $unit)
            continue;
        $numberOfUnits = floor($timeDifference / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . ' ago';
    }
}