<?php


namespace App\Libraries\Address\ViaCep;


use App\Libraries\Address\AddressFinder;
use GuzzleHttp\Client;

class ViaCepAddressFinder implements AddressFinder
{
    private $client;

    public function __construct($options)
    {
        $this->client = new Client([
            'base_uri' => data_get($options, 'api_url'),
            'http_errors' => false
        ]);
    }
    public function findAddress($zipcode)
    {
        $response = $this->client->get($zipcode .'/json');
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody()->getContents());
            if (data_get($data,'erro') === null) {
                return [
                    'line_1' => data_get($data,'logradouro'),
                    'line_2' => data_get($data,'complemento'),
                    'neighborhood' => data_get($data,'bairro'),
                    'state' => data_get($data,'uf'),
                    'city' => data_get($data,'localidade'),
                    'zipcode' => $zipcode,
                ];
            }
        }

        return null;
    }
}