<?php
// Prueba unitaria utilizando PHPUnit
use PHPUnit\Framework\TestCase;

require_once 'Api.php';

class ApiTest extends TestCase
{
    public function testGetAllContacts()
    {
        $api = new Api($myPersonalKey);
        $response = $api->getAllContacts();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }
}
