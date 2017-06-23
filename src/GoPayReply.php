<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 4:17 PM
 */

namespace Ouranoshong\GoPay;


class GoPayReply
{

    const RESP_CODE_SUCCESS = '0000';
    const RESP_CODE_FAIL = '9999';

    private $data;

    public function setRespCode($value) {
        $this->data['RespCode'] = $value;
    }

    public function setJumpURL($value) {
        $this->data['JumpURL'] = $value;
    }

    public function __toString()
    {
        return http_build_query($this->data, null, '|');
    }

    public static function createSuccessReply($url = '') {
        $reply = new self();
        $reply->setRespCode(self::RESP_CODE_SUCCESS);
        $reply->setJumpURL($url);
        return $reply;
    }

    public static function createFailReply($url = '') {
        $reply = new self();
        $reply->setRespCode(self::RESP_CODE_FAIL);
        $reply->setJumpURL($url);
        return $reply;
    }
}
