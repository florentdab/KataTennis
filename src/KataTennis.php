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
    
}