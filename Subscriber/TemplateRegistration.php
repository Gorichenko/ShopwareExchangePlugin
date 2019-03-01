<?php

namespace SwagExchangeRates\Subscriber;

use Enlight\Event\SubscriberInterface;
use Doctrine\Common\Collections\ArrayCollection;
use SwagExchangeRates\ExchangeBundle\Services\RatesService;
use Shopware\Components\HttpClient\GuzzleFactory;
use Shopware\Components\Theme\LessDefinition;
use PDO;
use Psr\Log\LoggerInterface;

class TemplateRegistration implements SubscriberInterface
{
    /**
     * @var string
     */
    private $pluginDirectory;

    /**
     * @var \Enlight_Template_Manager
     */
    private $templateManager;

    private $rateService;

    private $entityManager;

    /**
     * @param $pluginDirectory
     * @param \Enlight_Template_Manager $templateManager
     */
    public function __construct($pluginDirectory, \Enlight_Template_Manager $templateManager)
    {
        $this->pluginDirectory = $pluginDirectory;
        $this->templateManager = $templateManager;
        $this->rateService = new RatesService(new GuzzleFactory());
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Theme_Compiler_Collect_Plugin_Less' => 'onCollectLessFiles',
            'Theme_Compiler_Collect_Plugin_Javascript' => 'onCollectJavascript',
            'Enlight_Controller_Action_PreDispatch' => 'onPreDispatch',
            'sBasket::sDeleteArticle::after' => 'onBasketDeleteArticle',
            'sBasket::sDeleteArticle::before' => 'onBasketBeforeDeleteArticle',
        ];
    }

    public function onCollectJavascript()
    {
        $jsPath = [
            $this->pluginDirectory . '/Resources/views/frontend/_public/src/js/jquery.swag-exchange-rates.json-parse.js',
        ];

        return new ArrayCollection($jsPath);
    }

    public function onCollectLessFiles()
    {
        return new LessDefinition(
            [],
            [$this->pluginDirectory . '/Resources/views/frontend/less/rates.less']
        );
    }

    public function onPreDispatch()
    {
        $rates = $this->getRates();
        $this->templateManager->addTemplateDir($this->pluginDirectory . '/Resources/views');
        $this->templateManager->assign('current_rate', json_encode($rates));
    }

    public function getRates()
    {
        $query = Shopware()->Container()->get('dbal_connection')->createQueryBuilder();

        $rates = $query->select('*')
            ->from('s_current_rate', 'rates')
            ->execute()
            ->fetchAll(PDO::FETCH_ASSOC);

        if (!$rates) {
            $rates = json_decode($this->rateService->getCurrentRates());

            foreach ($rates as $rate) {
                $data = [];
                $data['base_name'] = $rate->ccy;
                $data['additional_name'] = $rate->base_ccy;
                $data['buy_rate'] = $rate->buy;
                $data['sale_rate'] = $rate->sale;
                Shopware()->Db()->insert('s_current_rate', $data);
            }
        }

        return $rates;
    }

    public function onBasketDeleteArticle()
    {
        var_dump('After delete');
    }

    public function onBasketBeforeDeleteArticle()
    {
        var_dump('Before delete');
    }
}
