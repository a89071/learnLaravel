<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @abstract 正确的用例
     */
    public function testRegister()
    {
        $response = $this->post('wx/auth/register', [
            'username' => 'lisan1',
            'password' => '123456',
            'mobile' => '13027137008',
            'code' => '1234',
        ]);
        $response->assertStatus(200);
        $ret = $response->getOriginalContent();
        $this->assertEquals(0, $ret['errno']);
        $this->assertNotEmpty($ret['data']);
    }

    /**
     * @abstract 异常的用例
     */
    public function testRegisterMobile()
    {
        $response = $this->post('wx/auth/register', [
            'username' => 'lisan2',
            'password' => '123456',
            'mobile' => '130271370081s',
            'code' => '1234',
        ]);
        $response->assertStatus(200);
        $ret = $response->getOriginalContent();
        $this->assertEquals(707, $ret['errno']);
    }

}
