<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 9:46 AM
 */

namespace Ouranoshong\GoPay;


class GoPayException extends \Exception
{
    public static function createNoConfigurationException() {
        return new self('Please set up configuration!', 88778);
    }

    public static function createNoHandlerNameException() {
        return new self('Please set up handler name!', 88779);
    }
}
