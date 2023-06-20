<?php
require_once('vendor/autoload.php');

class Api
{
    protected $key;
    public function __construct($key)
    {
        $this->key = $key;
    }


    public function getAllProperties()
    {
        try {
            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', 'https://api.easybroker.com/v1/properties?page=1&limit=20', [
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

$myPersonalKey = '1tdbakxvogt3rfgvliz21a8bgil1mu';
$api = new Api($myPersonalKey);
$properties = json_decode($api->getAllProperties()->getBody(), true);

foreach ($properties['content'] as $propertie) {
    echo 'title: ' . $propertie['title'] . "\n";
    echo 'title_image_full: ' . $propertie['title_image_full'] . "\n";
    echo 'title_image_thumb: ' . $propertie['title_image_thumb'] . "\n";
    echo 'location: ' . $propertie['location'] . "\n";
    echo 'Operations:' . "\n";
    foreach ($propertie['operations'] as $operation) {
        echo 'type: ' . $operation['type'] . "\n";
        echo 'amount: ' . $operation['amount'] . "\n";
        echo 'currency: ' . $operation['currency'] . "\n";
        echo 'formatted_amount: ' . $operation['formatted_amount'] . "\n";
        $commission = $operation['commission'];
        echo 'commission type: ' . $commission['type'] . "\n";
        echo 'commission value: ' . $commission['value'] . "\n";
        echo 'unit: ' . $operation['unit'] . "\n";
        echo 'bedrooms: ' . $propertie['bedrooms'] . "\n";
        echo 'bathrooms: ' . $propertie['bathrooms'] . "\n";
        echo 'agent: ' . $propertie['agent'] . "\n";
        echo 'parking_spaces: ' . $propertie['parking_spaces'] . "\n";
        echo 'property_type: ' . $propertie['property_type'] . "\n";
        echo 'lot_size: ' . $propertie['lot_size'] . "\n";
        echo 'construction_size: ' . $propertie['construction_size'] . "\n";
        echo 'updated_at: ' . $propertie['updated_at'] . "\n";
        echo 'agent: ' . $propertie['agent'] . "\n";
        echo 'show_prices: ' . $propertie['show_prices'] . "\n";
        echo 'share_commission: ' . $propertie['share_commission'] . "\n";
        echo "\n";
    }
}
