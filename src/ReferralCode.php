<?php

namespace HuiLee\ReferralCode;

class ReferralCode
{
    /**
     * @param $id
     *
     * @return string
     */
    public function encryptCode($id)
    {
        static $source_string = 'E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ';
        $num                  = $id;
        $code                 = '';
        while ($num > 0) {
            $mod  = $num % 35;
            $num  = ($num - $mod) / 35;
            $code = $source_string[$mod].$code;
        }
        if (empty($code[3])) {
            $code = str_pad($code, 4, '0', STR_PAD_LEFT);
        }

        return $code;
    }

    /**
     * @param $code
     *
     * @return float|int
     */
    public function decryptCode($code)
    {
        static $source_string = 'E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ';
        if (strrpos($code, '0') !== false) {
            $code = substr($code, strrpos($code, '0') + 1);
        }
        $len  = strlen($code);
        $code = strrev($code);
        $num  = 0;
        for ($i = 0; $i < $len; ++$i) {
            $num += strpos($source_string, $code[$i]) * pow(35, $i);
        }

        return $num;
    }
}
