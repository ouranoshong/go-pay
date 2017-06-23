# go-pay
A sdk for go pay (third party)


### Installation
```shell
$ composer require ouranohsong/go-pay
```

### Example

```php
date_default_timezone_set('Asia/Shanghai');

require __DIR__ . '/vendor/autoload.php';

$request = new \Ouranoshong\GoPay\Request\PayActionRequest();
$response = new \Ouranoshong\GoPay\Response\PayActionResponse();

$config = new \Ouranoshong\GoPay\GoPayConfig();
$client = new \Ouranoshong\GoPay\GoPayClient();

$request->setMerOrderNum('guoguofufu'.time());
$request->setCurrencyType('');
$request->setFeeAmt('');
$request->setTranAmt('');
$request->setTranIP('');
$request->setTranDateTime(date('YmdHis'));
$request->setIsRepeatSubmit('');
$request->setGoodsName('');
$request->setGoodsDetail('');
$request->setBackgroundMerUrl('');


$client->setConfiguration($config);
$client->setHandlerName(Ouranoshong\GoPay\Handler\PayActionHandler::class);
$client->handle($request, $response);

print_r($response->getResult());
```
