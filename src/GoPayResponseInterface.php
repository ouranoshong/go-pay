<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 9:39 AM
 */

namespace Ouranoshong\GoPay;


interface GoPayResponseInterface
{
    public function setResult(array $result);

    public function getResult();
}
