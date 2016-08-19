<?php

namespace wcs;

class KataTennis
{
    public static function score($score)
    {
        $scoreArray = str_split($score);
        $progress = [0, 15, 30, 40];
        $j1 = 0;
        $j2 = 0;
        
        foreach ($scoreArray as $char){
            switch($char){
                case "1":
                    $j1++;
                    break;
                case "2":
                    $j2++;
                    break;
            }
        }
        return [$progress[$j1], $progress[$j2]];
    }

    public static function finalScore($score)
    {
        $scoreArray = str_split($score);
        $progress = [0, 15, 30, 40];
        $games1 = 0;
        $games2 = 0;
        $points1 = 0;
        $points2 = 0;
        $advantage = false;
        $equality = false;
        $sets = [[0,0]];

        foreach ($scoreArray as $char){
            switch($char){
                case "1":
                    $points1++;
                    break;
                case "2":
                    $points2++;
                    break;
            }
            if ($points1 > 2 | $points2 > 2){
                // case game win
                if (abs($points1 - $points2) >= 2){
                    if ($points1 > $points2){
                        $games1++;
                    } else {
                        $games2++;
                    }
                    $points1 = 0;
                    $points2 = 0;
                // case advantage or equality    
                } else {
                    if ($points1 == $points2) {
                        $equality = true;
                        $advantage = false;
                    } else {
                        $equality = false;
                        $advantage = true;
                    }
                }
            }
        }

        $result = [
            $sets,
            [$games1, $games2]
        ];

        if ($advantage === true) {
            $result[] = "advantage";
        } elseif ($equality === true) {
            $result[] = "equality";
        } else {
            $result[] = [$progress[$points1], $progress[$points2]];
        };

        //var_dump($result);
        return $result;
    }

}