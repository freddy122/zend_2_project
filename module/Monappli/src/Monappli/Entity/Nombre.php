<?php

namespace Monappli\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nombre
 *
 * @ORM\Table(name="nombre")
 * @ORM\Entity
 */
class Nombre
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
     * @var integer
     *
     * @ORM\Column(name="nombre_pages", type="integer", nullable=false)
     */
    private $nombrePages = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="moving", type="boolean", nullable=false)
     */
    private $moving = '0';



    /**
     * Set numeroClient
     *
     * @param string $numeroClient
     * @return Nombre
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
     * @return Nombre
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
     * Set nombrePages
     *
     * @param integer $nombrePages
     * @return Nombre
     */
    public function setNombrePages($nombrePages)
    {
        $this->nombrePages = $nombrePages;

        return $this;
    }

    /**
     * Get nombrePages
     *
     * @return integer 
     */
    public function getNombrePages()
    {
        return $this->nombrePages;
    }

    /**
     * Set moving
     *
     * @param boolean $moving
     * @return Nombre
     */
    public function setMoving($moving)
    {
        $this->moving = $moving;

        return $this;
    }

    /**
     * Get moving
     *
     * @return boolean 
     */
    public function getMoving()
    {
        return $this->moving;
    }
}
