<?php

namespace Monappli\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Integration
 *
 * @ORM\Table(name="integration")
 * @ORM\Entity
 */
class Integration
{
    /**
     * @var string
     *
     * @ORM\Column(name="numero_client", type="string", length=80, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numeroClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_integration", type="datetime", nullable=false)
     */
    private $dateIntegration = '0000-00-00 00:00:00';



    /**
     * Get numeroClient
     *
     * @return string 
     */
    public function getNumeroClient()
    {
        return $this->numeroClient;
    }

    /**
     * Set dateIntegration
     *
     * @param \DateTime $dateIntegration
     * @return Integration
     */
    public function setDateIntegration($dateIntegration)
    {
        $this->dateIntegration = $dateIntegration;

        return $this;
    }

    /**
     * Get dateIntegration
     *
     * @return \DateTime 
     */
    public function getDateIntegration()
    {
        return $this->dateIntegration;
    }
}
