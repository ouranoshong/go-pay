<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 10:36 AM
 */

namespace Ouranoshong\GoPay\Handler;


use Httpful\Request;
use Ouranoshong\GoPay\GoPayConfig;
use Ouranoshong\GoPay\GoPayHandlerInterface;
use Ouranoshong\GoPay\GoPayRequestInterface;
use Ouranoshong\GoPay\GoPayResponseInterface;

class PayActionHandler implements GoPayHandlerInterface
{
    /**
     * @var \Ouranoshong\GoPay\GoPayConfig
     */
    private $config;

    public function __construct(GoPayConfig $config)
    {
        $this->config = $config;
    }

    public function __invoke(GoPayRequestInterface $request, GoPayResponseInterface $response)
    {

        $url = $this->config->apiRoot . '/'. $request->getApiMethod();

        /** @var $request \Ouranoshong\GoPay\Request\PayActionRequest */
        $request->setVersion($this->config->version);
        $request->setMerchantID($this->config->merchantId);
        $request->setCharset($this->config->charset);
        $request->setLanguage($this->config->language);
        $request->setSignType($this->config->signType);
        $request->setVirCardNoIn($this->config->virCardNoIn);
        $request->setTranCode($this->config->tranCode);
        $request->setGoPayServerTime(date('YmdHis'));

        $data = array_filter($request->getApiParams());
        $data['signValue'] = $this->signature($data, $this->config->key);
        $data = http_build_query($data);

        $HttpResponse = Request::post($url)->addHeader('Content-Type', 'application/x-www-form-urlencoded')->body($data)->send();

        if (isset($HttpResponse->headers['content-length']) && isset($HttpResponse->headers['location'])) {
            $response->setResult(['error' => false, 'location'=> $HttpResponse->headers['location']]);
        } else if (preg_match('|\<table\>.*\<\/table\>|us', strval($HttpResponse->body), $m)) {
            $response->setResult(['error' => true, 'errorMsg'=> strip_tags($m[0])]);
        } else {
            $response->setResult(['error' => true, 'errorMsg'=> 'unknown message!']);
        }
        return $response;
    }
    
    public function signature($data, $key) {
        
        $version = isset($data["version"]) ? $data['version'] : '';
        $tranCode = isset($data["tranCode"]) ? $data["tranCode"] : '';
        $merchantID = isset($data["merchantID"]) ? $data["merchantID"] : '';
        $merOrderNum = isset($data["merOrderNum"]) ? $data["merOrderNum"] : '';
        $tranAmt = isset($data["tranAmt"]) ? $data["tranAmt"] : '0.00';
        $feeAmt = isset($data["feeAmt"]) ? $data["feeAmt"] : '0.00';
        $frontMerUrl = isset($data["frontMerUrl"]) ? $data["frontMerUrl"] : '';
        $backgroundMerUrl = isset($data["backgroundMerUrl"]) ? $data["backgroundMerUrl"] : '';
        $tranDateTime = isset($data["tranDateTime"]) ? $data["tranDateTime"] : '';
        $tranIP = isset($data["tranIP"]) ? $data["tranIP"] : '';
        $gopayServerTime = isset($data['gopayServerTime']) ? $data["gopayServerTime"] : '';

        $signStr='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=[]gopayOutOrderId=[]tranIP=['.$tranIP.']respCode=[]gopayServerTime=['.$gopayServerTime.']VerficationCode=['.$key.']';
//        var_dump($signStr);exit;
        return md5($signStr);
    }
}
