<?php

namespace App\Controllers;

use Swoft\Bean\Annotation\Controller;
use Swoft\Bean\Annotation\RequestMapping;
use Swoft\Web\Request;

/**
 * Class IndexController
 * @Controller()
 *
 * @package App\Controllers
 */
class IndexController
{

    /**
     * @RequestMapping()
     * @param \Swoft\Web\Request $request
     * @return array
     */
    public function index(Request $request)
    {
        return [
            'headers' => $request->getHeaders() ? value(function () use ($request) {
                $headers = [];
                foreach ($request->getHeaders() as $key => $value) {
                    $exploded = explode('-', $key);
                    foreach ($exploded as &$str) {
                        $str = ucfirst($str);
                    }
                    $ucKey = implode('-', $exploded);
                    $headers[$ucKey] = current($value);
                }
                return $headers;
            }) : [],
            'server' => $request->getServerParams() ?? [],
            'method' => $request->getMethod() ?? [],
            'uri' => [
                'scheme' => $request->getUri()->getScheme(),
                'userInfo' => $request->getUri()->getUserInfo(),
                'host' => $request->getUri()->getPort(),
                'port' => $request->getUri()->getPort(),
                'path' => $request->getUri()->getPath(),
                'query' => $request->getUri()->getQuery(),
                'fragment' => $request->getUri()->getFragment(),
            ],
            'body' => $request->getBody()->getContents() ?? [],
        ];
    }

}
