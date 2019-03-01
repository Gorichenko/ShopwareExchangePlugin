<?php

namespace SwagExchangeRates;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\Context\ActivateContext;
use SwagExchangeRates\Bootstrap\Database;

class SwagExchangeRates extends Plugin
{
    /**
     * @param InstallContext $installContext
     */
    public function install(InstallContext $installContext)
    {
        $database = new Database(
            $this->container->get('models')
        );

        $database->install();
    }

    /**
     * @param UninstallContext $uninstallContext
     */
    public function uninstall(UninstallContext $uninstallContext)
    {
        $database = new Database(
            $this->container->get('models')
        );

        if ($uninstallContext->keepUserData()) {
            return;
        }

        $database->uninstall();
    }

}
