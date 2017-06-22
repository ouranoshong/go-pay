<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 10:36 AM
 */

namespace Ouranoshong\GoPay\Response;


use Ouranoshong\GoPay\GoPayResponseInterface;

class PayActionResponse implements GoPayResponseInterface
{

    private $result;

    public function setResult(array $result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getError() {
        return isset($this->result['error']) ? $this->result['error'] : true;
    }

    public function getErrorMsg() {
        return isset($this->result['errorMsg']) ? $this->result['errorMsg'] : '';
    }

    public function getLocation() {
        return isset($this->result['location']) ? $this->result['location'] : '';
    }
}
