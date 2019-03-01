<?php

namespace SwagExchangeRates\ExchangeBundle\Services;

use Shopware\Components\HttpClient\GuzzleFactory;
use Shopware\Components\HttpClient\GuzzleHttpClient as GuzzleClient;

class RatesService
{
    const API_LINK = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
    private $guzzleClient;

    public function __construct(GuzzleFactory $guzzlefactory)
    {
        $this->guzzleClient = new GuzzleClient($guzzlefactory);
    }

    public function getCurrentRates()
    {
        try{
            $currentRate = $this->guzzleClient->get(self::API_LINK, ['headers' => ['Content-type' => 'application/json']]);
            return $currentRate->getBody();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
