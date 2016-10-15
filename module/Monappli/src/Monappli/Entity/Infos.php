<?php

namespace Monappli\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infos
 *
 * @ORM\Table(name="infos")
 * @ORM\Entity
 */
class Infos
{
    /**
     * @var string
     *
     * @ORM\Column(name="numero_client", type="string", length=80, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeroClient;

    /**
     * @var string
     *
     * @ORM\Column(name="type_document", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typeDocument;

    /**
     * @var string
     *
     * @ORM\Column(name="nomchamp", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nomchamp;

    /**
     * @var string
     *
     * @ORM\Column(name="valeurchamp", type="string", length=255, nullable=true)
     */
    private $valeurchamp;



    /**
     * Set numeroClient
     *
     * @param string $numeroClient
     * @return Infos
     */
    public function setNumeroClient($numeroClient)
    {
        $this->numeroClient = $numeroClient;

        return $this;
    }

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
     * Set typeDocument
     *
     * @param string $typeDocument
     * @return Infos
     */
    public function setTypeDocument($typeDocument)
    {
        $this->typeDocument = $typeDocument;

        return $this;
    }

    /**
     * Get typeDocument
     *
     * @return string 
     */
    public function getTypeDocument()
    {
        return $this->typeDocument;
    }

    /**
     * Set nomchamp
     *
     * @param string $nomchamp
     * @return Infos
     */
    public function setNomchamp($nomchamp)
    {
        $this->nomchamp = $nomchamp;

        return $this;
    }

    /**
     * Get nomchamp
     *
     * @return string 
     */
    public function getNomchamp()
    {
        return $this->nomchamp;
    }

    /**
     * Set valeurchamp
     *
     * @param string $valeurchamp
     * @return Infos
     */
    public function setValeurchamp($valeurchamp)
    {
        $this->valeurchamp = $valeurchamp;

        return $this;
    }

    /**
     * Get valeurchamp
     *
     * @return string 
     */
    public function getValeurchamp()
    {
        return $this->valeurchamp;
    }
}
