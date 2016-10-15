<?php

namespace Monappli\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dossier
 *
 * @ORM\Table(name="dossier")
 * @ORM\Entity
 */
class Dossier
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
     * @var string
     *
     * @ORM\Column(name="nom_client", type="string", length=255, nullable=false)
     */
    private $nomClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_numerisation", type="datetime", nullable=false)
     */
    private $dateNumerisation = '0000-00-00 00:00:00';



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
     * Set nomClient
     *
     * @param string $nomClient
     * @return Dossier
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string 
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set dateNumerisation
     *
     * @param \DateTime $dateNumerisation
     * @return Dossier
     */
    public function setDateNumerisation($dateNumerisation)
    {
        $this->dateNumerisation = $dateNumerisation;

        return $this;
    }

    /**
     * Get dateNumerisation
     *
     * @return \DateTime 
     */
    public function getDateNumerisation()
    {
        return $this->dateNumerisation;
    }
}
