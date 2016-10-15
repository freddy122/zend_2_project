<?php

namespace Monappli\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnvoiInfos
 *
 * @ORM\Table(name="envoi_infos")
 * @ORM\Entity
 */
class EnvoiInfos
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
     * @var integer
     *
     * @ORM\Column(name="envoi", type="integer", nullable=false)
     */
    private $envoi = '0';



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
     * Set envoi
     *
     * @param integer $envoi
     * @return EnvoiInfos
     */
    public function setEnvoi($envoi)
    {
        $this->envoi = $envoi;

        return $this;
    }

    /**
     * Get envoi
     *
     * @return integer 
     */
    public function getEnvoi()
    {
        return $this->envoi;
    }
}
