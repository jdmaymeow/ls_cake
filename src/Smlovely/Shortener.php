<?php

namespace APP\Smlovely;

class Shortener
{
    protected $config = [
        'codeset' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWVXYZ'
        // h is 17th in a row
    ];

    /**
     * Shorten given ID with our codeset
     */
    public function short($id = null)
    {
        return $this->_shortenNumber($id);
    }

    /**
     * Decode shortened string and return ID
     */
    public function long()
    {}

    private function _shortenNumber($number = null)
    {
        //load configuration
        $config = $this->config;
        $codeset = $config['codeset'];

        // get length of our codeset
        $base = strlen($codeset);
        $n = $number; // given link_ID

        //shortened string
        $shortened = '';

        while ($n > 0) {
            $shortened = substr($codeset, ($n % $base), 1) . $shortened;
            $n = floor($n/$base);
        }

        return $shortened;
    }
}
