<?php
/**
 * #description
 *
 * @author  fengqi <lyf362345@gmail.com>
 * @version $Id: $
 */

class Hanzi
{
    /**
     * Simplified to Pinyin
     *
     * @param string $Simplified
     * @param bool   $SkipOther
     *
     * @return string
     */
    static public function SimplifiedToPinyin($Simplified, $SkipOther = false)
    {
        $len = strlen($Simplified);
        $return = array('py' => '', 'pinyin' => '');
        for ($i = 0; $i < $len; $i++) {
            if (ord(substr($Simplified, $i, 1)) > 127) {
                $tmp = self::query(substr($Simplified, $i, 3), 1);
                $return['py'] .= substr($tmp, 0, 1);
                $return['pinyin'] .= $tmp;

                $i += 2;
            }
            elseif (!$SkipOther) {
                $return['py'] .= substr($Simplified, $i, 1);
                $return['pinyin'] .= substr($Simplified, $i, 1);
            }
        }

        return $return;
    }

    /**
     * Simplified to Traditional or turn
     *
     * @param      $Simplified
     * @param bool $SkipOther
     * @param bool $Turn
     *
     * @return array|string
     */
    static public function SimplifiedTurnTraditional($Simplified, $SkipOther = false, $Turn = false)
    {
        $Simplified = trim($Simplified);
        $Turn = (bool)$Turn;
        $SkipOther = (bool)$SkipOther;

        $len = strlen($Simplified);
        $return = '';
        for ($i = 0; $i < $len; $i++) {
            if (ord(substr($Simplified, $i, 1)) > 127) {
                $return .= self::query(substr($Simplified, $i, 3), $Turn ? 3 : 2);
                $i += 2;
            }
            elseif (!$SkipOther) {
                $return .= substr($Simplified, $i, 1);
            }
        }

        return $return;
    }

    /**
     * @param $string
     * @param $Type
     *
     * @return string
     */
    static protected function query($string, $Type)
    {
        switch($Type) {
            // Simplified to pinyin
            case 1:
                $string = self::query($string, 3);
                $dict = require 'PinyinDict.php';
                return isset($dict[$string]) ? $dict[$string] : $string;
                break;

            // Simplified to Traditional
            case 2:
                $dict = require 'HanziDict.php';
                $dict = array_flip($dict);
                return isset($dict[$string]) ? $dict[$string] : $string;
                break;

            // Traditional to Simplified
            case 3:
                $dict = require 'HanziDict.php';
                return isset($dict[$string]) ? $dict[$string] : $string;
                break;
        }

        return '';
    }
}
