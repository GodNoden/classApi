<?php
// Prueba unitaria utilizando PHPUnit
use PHPUnit\Framework\TestCase;

require_once 'Api.php';

class ApiTest extends TestCase
{
    public function testGetAllProperties()
    {
        $myPersonalKey = '1tdbakxvogt3rfgvliz21a8bgil1mu';
        $api = new Api($myPersonalKey);
        $response = $api->getAllProperties();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }
}
