<?php

namespace Swoft\Test\Web;


use Swoft\Testing\Web\Response;

/**
 * @uses      IndexControllerTest
 * @version   2017-11-12
 * @author    huangzhhui <huangzhwork@gmail.com>
 * @copyright Copyright 2010-2017 Swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class IndexControllerTest extends AbstractTestCase
{

    /**
     * @test
     * @covers \App\Controllers\IndexController
     */
    public function index()
    {
        // Json model
        $response = $this->request('GET', '/', [], parent::ACCEPT_JSON);
        $response->assertHeader('Content-Type', parent::ACCEPT_JSON);
        $this->assertInstanceOf(Response::class, $response);
        /** @var Response $response */
        $response->assertSuccessful()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee('server')
            ->assertSee('headers')
            ->assertSee('method')
            ->assertSee('uri')
            ->assertSee('body');

    }

}