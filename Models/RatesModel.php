<?php

namespace SwagExchangeRates\Models;

use Shopware\Components\Model\ModelEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="s_current_rate")
 */
class RatesModel extends ModelEntity
{
    /**
     * Primary Key - autoincrement value
     *
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $baseName
     *
     * @ORM\Column(name="base_name", type="string", nullable=false)
     */
    private $baseName;

    /**
     * @var string $additionalName
     *
     * @ORM\Column(name="additional_name", type="string", nullable=false)
     */
    private $additionalName;

    /**
     * @var decimal $buyRate
     *
     * @ORM\Column(name="buy_rate", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $buyRate;

    /**
     * @var decimal $name
     *
     * @ORM\Column(name="sale_rate", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $saleRate;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * return string
     */
    public function getBaseName()
    {
        return $this->baseName;
    }

    /**
     * @param $baseName string
     */
    public function setBaseName($baseName)
    {
        $this->baseName = $baseName;
    }

    /**
     * return string
     */
    public function getAdditionalName()
    {
        return $this->additionalName;
    }

    /**
     * @param $additionalName string
     */
    public function setAdditionalName($additionalName)
    {
        $this->additionalName = $additionalName;
    }

    /**
     * return decimal
     */
    public function getBuyRate()
    {
        return $this->buyRate;
    }

    /**
     * @param $buyRate decimal
     */
    public function setBuyRate($buyRate)
    {
        $this->buyRate = $buyRate;
    }
    /**
     * return decimal
     */
    public function getSaleRate()
    {
        return $this->saleRate;
    }

    /**
     * @param $buyRate decimal
     */
    public function setSaleRate($saleRate)
    {
        $this->saleRate = $saleRate;
    }

}
