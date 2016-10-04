<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Shortable component
 */
class ShortableComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        //what characters we want to use  for encoding ID to string
        // Ill use all alphabet and numbers
        'codeset' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWVXYZ'
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
        $config = $this->config();
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
