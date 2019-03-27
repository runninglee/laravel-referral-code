<?php

namespace HuiLee\ReferralCode;

class ReferralCode
{
    private $sourceStrings;

    public function __construct()
    {
        $this->sourceStrings = 'E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ';
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function encryptCode($id)
    {
        $num                  = $id;
        $code                 = '';
        while ($num > 0) {
            $mod  = $num % 35;
            $num  = ($num - $mod) / 35;
            $code = $this->sourceStrings[$mod].$code;
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
        if (strrpos($code, '0') !== false) {
            $code = substr($code, strrpos($code, '0') + 1);
        }
        $len  = strlen($code);
        $code = strrev($code);
        $num  = 0;
        for ($i = 0; $i < $len; ++$i) {
            $num += strpos($this->sourceStrings, $code[$i]) * pow(35, $i);
        }

        return $num;
    }
}
