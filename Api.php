<?php

class Api
{
    protected $key;
    public function __construct($key)
    {
        $this->key = $key;
    }


    public function getAllContacts()
    {
        try {

            require_once('vendor/autoload.php');
            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', 'https://api.easybroker.com/v1/contacts', [
                'headers' => [
                    'X-Authorization' => $this->key,
                    'accept' => 'application/json',
                ],
            ]);

            return $response;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}

$api = new Api($myPersonalKey);
$contacts = json_decode($api->getAllContacts()->getBody(), true);

foreach ($contacts['content'] as $item) {
    echo 'Full Name: ' . $item['full_name'] . "\n";
    echo 'Email: ' . $item['email'] . "\n";
    echo 'Phone: ' . $item['phone'] . "\n";
}
