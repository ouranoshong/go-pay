<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 4:17 PM
 */

namespace Ouranoshong\GoPay;


class GoPayNotify
{
    /**
     *
     */
    const RESP_CODE_SUCCESS = '0000';

    /**
     *
     */
    const RESP_CODE_FAIL = '9999';

    /**
     * @var array
     */
    private $data;

    public function setData($data) {
        $this->data = $data;
    }

    public function convertDataEncoding() {
        foreach($this->data as $key => $value) {
            if ($value && (mb_check_encoding($value, 'GBK'))) {
                $this->data[$key] = mb_convert_encoding($value, 'UTF-8', 'GBK');
            }
        }
    }

    public static function createFromArr($post, $key = '') {
        $notify = new self();
        $notify->setData($post);
        if ($key) $notify->checkSign($notify->data, $key);
        $notify->convertDataEncoding();
        return $notify;
    }

    protected function checkSign($data, $key) {
        if ($this->signature($data, $key) !== $this->getSignValue()) {
            throw new GoPayException('Wrong signature!', 98774);
        }
    }

    protected function signature($data, $key) {

        $version = isset($data["version"]) ? $data['version'] : '';
        $tranCode = isset($data["tranCode"]) ? $data["tranCode"] : '';
        $merchantID = isset($data["merchantID"]) ? $data["merchantID"] : '';
        $merOrderNum = isset($data["merOrderNum"]) ? $data["merOrderNum"] : '';
        $tranAmt = isset($data["tranAmt"]) ? $data["tranAmt"] : '';
        $feeAmt = isset($data["feeAmt"]) ? $data["feeAmt"] : '';
        $frontMerUrl = isset($data["frontMerUrl"]) ? $data["frontMerUrl"] : '';
        $backgroundMerUrl = isset($data["backgroundMerUrl"]) ? $data["backgroundMerUrl"] : '';
        $tranDateTime = isset($data["tranDateTime"]) ? $data["tranDateTime"] : '';
        $tranIP = isset($data["tranIP"]) ? $data["tranIP"] : '';
        $respCode = isset($data["respCode"]) ? $data["respCode"] : '';
        $orderId = isset($data["orderId"]) ? $data["orderId"] : '';
        $gopayOutOrderId = isset($data["gopayOutOrderId"]) ? $data["gopayOutOrderId"] : '';

        $signValue2='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=['.$orderId.']gopayOutOrderId=['.$gopayOutOrderId.']tranIP=['.$tranIP.']respCode=['.$respCode.']gopayServerTime=[]VerficationCode=['.$key.']';

        return md5($signValue2);
    }

    public function getData() {
        return $this->data;
    }

    /**
     * @var string
     * @name
     * @return string
     */
    public function getVersion() {
        return isset($this->data['version']) ? $this->data['version'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getCharset() {
        return isset($this->data['charset']) ? $this->data['charset'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getLanguage() {
        return isset($this->data['language']) ? $this->data['language'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getSignType() {
        return isset($this->data['signType']) ? $this->data['signType'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getTranCode() {
        return isset($this->data['tranCode']) ? $this->data['tranCode'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getMerchantID() {
        return isset($this->data['merchantID']) ? $this->data['merchantID'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getMerOrderNum() {
        return isset($this->data['merOrderNum']) ? $this->data['merOrderNum'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getTranAmt() {
        return isset($this->data['tranAmt']) ? $this->data['tranAmt'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getFeeAmt() {
        return isset($this->data['feeAmt']) ? $this->data['feeAmt'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getFrontMerUrl() {
        return isset($this->data['frontMerUrl']) ? $this->data['frontMerUrl'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getBackgroundMerUrl() {
        return isset($this->data['backgroundMerUrl']) ? $this->data['backgroundMerUrl'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getTranDateTime() {
        return isset($this->data['tranDateTime']) ? $this->data['tranDateTime'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getTranIP() {
        return isset($this->data['tranIP']) ? $this->data['tranIP'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getRespCode() {
        return isset($this->data['respCode']) ? $this->data['respCode'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getMsgExt() {
        return isset($this->data['msgExt']) ? $this->data['msgExt'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getOrderId() {
        return isset($this->data['orderId']) ? $this->data['orderId'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getGopayOutOrderId() {
        return isset($this->data['gopayOutOrderId']) ? $this->data['gopayOutOrderId'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getBankCode() {
        return isset($this->data['bankCode']) ? $this->data['bankCode'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getTranFinishTime() {
        return isset($this->data['tranFinishTime']) ? $this->data['tranFinishTime'] : '';
    }
    /**
     * @var string
     * @name
     * @return string
     */
    public function getMerRemark() {
        return isset($this->data['merRemark']) ? $this->data['merRemark'] : '';
    }

    /**
     * @var string
     * @name
     * @return string
     */
    public function getSignValue() {
        return isset($this->data['signValue']) ? $this->data['signValue'] : '';
    }
}
