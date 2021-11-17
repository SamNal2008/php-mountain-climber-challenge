<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        if (strlen($s1) != strlen($s2)) {
            return false;
        }


        $pivot = $s2[0];
        $res = false;
        $tmpres = false;
        $place = 0;
        for ($i = 0; $i < strlen($s1) ; $i++) {

            if ( $s1[$i] == $pivot ) {
                
                $tmpres = true;
                $place = $i;
                if ($i < strlen($s1) - 1) {
                    if ( $s1[$i + 1 ] == $pivot) {
                        $place += 1;
                    }
                }
                break;
            }
        }
        if (! $tmpres) {
            return false;
        }
         for ($i = 0; $i < strlen($s1) ; $i++) {
            $pos = $place + $i;
            if ($pos >= strlen($s1)) {
                $pos = $pos - strlen($s1);
            }
            if ($s2[$i] != $s1[$pos]) {
                return false;
            }
         }
        return true;
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);
        return $pos;
    }
}
