<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 9:38 AM
 */

namespace Ouranoshong\GoPay;


class GoPayClient
{
    /**
     * @var \Ouranoshong\GoPay\GoPayConfig
     */
    private $config;

    /**
     * @var \Ouranoshong\GoPay\GoPayHandlerInterface
     */
    private $hander;


    public function setConfiguration(GoPayConfig $config) {
        $this->config = $config;
    }

    public function setHandlerName($handler) {
        $this->hander = $handler;
    }

    public function handle(GoPayRequestInterface $request, GoPayResponseInterface $response) {

        if (in_array(GoPayHandlerInterface::class, array_keys((new \ReflectionClass($this->hander))->getInterfaceNames()))) {

            if (!$this->config instanceof GoPayConfig) GoPayException::createNoConfigurationException();

            $handler = $this->hander;

            $handlerInstance = new $handler($this->config);

            return $handlerInstance($request, $response);
        } else {
            throw GoPayException::createNoHandlerNameException();
        }
    }
}
