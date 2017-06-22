<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 6/22/17
 * Time: 9:40 AM
 */

namespace Ouranoshong\GoPay;


interface GoPayHandlerInterface
{
    public function __invoke(GoPayRequestInterface $request, GoPayResponseInterface $response);
}
