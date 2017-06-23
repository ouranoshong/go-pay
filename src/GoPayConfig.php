<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 9:39 AM
 */

namespace Ouranoshong\GoPay;


class GoPayConfig
{
    const SIGN_TYPE_MD5 = '1';
    const LANGUAGE_ZH = '1';
    const LANGUAGE_EN = '2';

    const CHARSET_UTF_8 = '2';
    const CHARSET_GBK = '1';

    public $apiRoot = 'https://gatewaymer.gopay.com.cn';

    public $merchantId = '0000000363';
    public $key = '11111aaaaa';
    public $virCardNoIn = '0000000002000000061';

    public $signType = self::SIGN_TYPE_MD5;

    public $language = self::LANGUAGE_ZH;

    public $charset = self::CHARSET_UTF_8;

    public $version = '2.2';

    public $tranCode = '8888';


}
