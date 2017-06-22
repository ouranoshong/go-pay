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
    const RESP_CODE_SUCCESS = '0000';
    const RESP_CODE_FAIL = '9999';

    private $data;

    public function setData($data) {
        $this->data = $data;
    }

    public static function createFromGlobal($post, $key = '') {
        $notify = new self();
        $notify->setData($post);
        if ($key) $notify->checkSign($notify->data, $key);
        return $notify;
    }

    protected function checkSign($data, $key) {
        if ($this->signature($data, $key) !== $this->getSignValue()) {
            throw new GoPayException('Wrong signature!', 98774);
        }
    }

    protected function signature($data, $key) {

        $version = $data["version"];
        $tranCode = $data["tranCode"];
        $merchantID = $data["merchantID"];
        $merOrderNum = $data["merOrderNum"];
        $tranAmt = $data["tranAmt"];
        $feeAmt = $data["feeAmt"];
        $frontMerUrl = $data["frontMerUrl"];
        $backgroundMerUrl = $data["backgroundMerUrl"];
        $tranDateTime = $data["tranDateTime"];
        $tranIP = $data["tranIP"];
        $respCode = $data["respCode"];
        $orderId = $data["orderId"];
        $gopayOutOrderId = $data["gopayOutOrderId"];

        $signValue2='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=['.$orderId.']gopayOutOrderId=['.$gopayOutOrderId.']tranIP=['.$tranIP.']respCode=['.$respCode.']gopayServerTime=[]VerficationCode=['.$key.']';

        return md5($signValue2);
    }

    public function getData() {
        return $this->data;
    }

    /**
     * @var string
     * @name
     */
    public function getVersion() {
        $this->data['version'];
    }
    /**
     * @var string
     * @name
     */
    public function getCharset() {
        $this->data['charset'];
    }
    /**
     * @var string
     * @name
     */
    public function getLanguage() {
        $this->data['language'];
    }
    /**
     * @var string
     * @name
     */
    public function getSignType() {
        $this->data['signType'];
    }
    /**
     * @var string
     * @name
     */
    public function getTranCode() {
        $this->data['tranCode'];
    }
    /**
     * @var string
     * @name
     */
    public function getMerchantID() {
        $this->data['merchantID'];
    }
    /**
     * @var string
     * @name
     */
    public function getMerOrderNum() {
        $this->data['merOrderNum'];
    }
    /**
     * @var string
     * @name
     */
    public function getTranAmt() {
        $this->data['tranAmt'];
    }
    /**
     * @var string
     * @name
     */
    public function getFeeAmt() {
        $this->data['feeAmt'];
    }
    /**
     * @var string
     * @name
     */
    public function getFrontMerUrl() {
        $this->data['frontMerUrl'];
    }
    /**
     * @var string
     * @name
     */
    public function getBackgroundMerUrl() {
        $this->data['backgroundMerUrl'];
    }
    /**
     * @var string
     * @name
     */
    public function getTranDateTime() {
        $this->data['tranDateTime'];
    }
    /**
     * @var string
     * @name
     */
    public function getTranIP() {
        $this->data['tranIP'];
    }
    /**
     * @var string
     * @name
     */
    public function getRespCode() {
        $this->data['respCode'];
    }
    /**
     * @var string
     * @name
     */
    public function getMsgExt() {
        $this->data['msgExt'];
    }
    /**
     * @var string
     * @name
     */
    public function getOrderId() {
        $this->data['orderId'];
    }
    /**
     * @var string
     * @name
     */
    public function getGopayOutOrderId() {
        $this->data['gopayOutOrderId'];
    }
    /**
     * @var string
     * @name
     */
    public function getBankCode() {
        $this->data['bankCode'];
    }
    /**
     * @var string
     * @name
     */
    public function getTranFinishTime() {
        $this->data['tranFinishTime'];
    }
    /**
     * @var string
     * @name
     */
    public function getMerRemark() {
        $this->data['merRemark'];
    }

    /**
     * @var string
     * @name
     */
    public function getSignValue() {
        $this->data['signValue'];
    }
}
