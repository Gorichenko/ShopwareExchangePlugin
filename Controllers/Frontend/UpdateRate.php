<?php

use SwagExchangeRates\ExchangeBundle\Services\RatesService;

class Shopware_Controllers_Frontend_UpdateRate extends Enlight_Controller_Action
{
    public function indexAction()
    {
        $this->container->get('front')->Plugins()->ViewRenderer()->setNoRender(); /*Чтобы контроллер не рендерил страницу*/
        $rateService = $this->container->get('swag_exchange_rates.services.rates_service');
        $currentRate = $rateService->getCurrentRates();

       if (!$currentRate instanceof \Exception) {

           $rates = json_decode($currentRate);
           Shopware()->Db()->executeQuery('TRUNCATE TABLE `s_current_rate`');

           foreach ($rates as $rate) {
               $data = [];
               $data['base_name'] = $rate->ccy;
               $data['additional_name'] = $rate->base_ccy;
               $data['buy_rate'] = $rate->buy;
               $data['sale_rate'] = $rate->sale;
               Shopware()->Db()->insert('s_current_rate', $data);
           }

           $this->response->setHeader('Content-type', 'application/json');
           $this->response->setBody($currentRate);
           return $this->response;
       }

       return $this->Response()->setException($currentRate);
    }
}
