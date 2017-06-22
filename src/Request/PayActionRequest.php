<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 10:36 AM
 */

namespace Ouranoshong\GoPay\Request;


use Ouranoshong\GoPay\GoPayRequestInterface;

class PayActionRequest implements GoPayRequestInterface
{
    /**
     * @var array
     */
    private $params;

    public function getApiParams()
    {
        return $this->params;
    }

    public function getApiMethod()
    {
        return 'Trans/WebClientAction.do';
    }

    /**
     * @var string
     * @name
     */
    public function setVersion($value) {
        $this->params['version'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setCharset($value) {
        $this->params['charset'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setLanguage($value) {
        $this->params['language'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setSignType($value) {
        $this->params['signType'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setTranCode($value) {
        $this->params['tranCode'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setMerchantID($value) {
        $this->params['merchantID'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setMerOrderNum($value) {
        $this->params['merOrderNum'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setTranAmt($value) {
        $this->params['tranAmt'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setFeeAmt($value) {
        $this->params['feeAmt'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setCurrencyType($value) {
        $this->params['currencyType'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setFrontMerUrl($value) {
        $this->params['frontMerUrl'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setBackgroundMerUrl($value) {
        $this->params['backgroundMerUrl'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setTranDateTime($value) {
        $this->params['tranDateTime'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setVirCardNoIn($value) {
        $this->params['virCardNoIn'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setTranIP($value) {
        $this->params['tranIP'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setIsRepeatSubmit($value) {
        $this->params['isRepeatSubmit'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setGoodsName($value) {
        $this->params['goodsName'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setGoodsDetail($value) {
        $this->params['goodsDetail'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setBuyerName($value) {
        $this->params['buyerName'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setBuyerContact($value) {
        $this->params['buyerContact'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setMerRemark1($value) {
        $this->params['merRemark1'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setMerRemark2($value) {
        $this->params['merRemark2'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setBankCode($value) {
        $this->params['bankCode'] = $value;
    }

    /**
     * @var string
     * @name
     */
    public function setUserType($value) {
        $this->params['userType'] = $value;
    }

    /**
     * @param $value
     * @name
     */
    public function setGoPayServerTime($value) {
        $this->params['gopayServerTime'] = $value;
    }

}
