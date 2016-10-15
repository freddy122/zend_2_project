<?php

namespace Monappli\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travail
 *
 * @ORM\Table(name="travail", indexes={@ORM\Index(name="fk_pers_trav", columns={"pers_id"})})
 * @ORM\Entity
 */
class Travail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="travail_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $travailId;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_travail", type="string", length=255, nullable=true)
     */
    private $libTravail;

    /**
     * @var \Monappli\Entity\Pers
     *
     * @ORM\ManyToOne(targetEntity="Monappli\Entity\Pers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pers_id", referencedColumnName="id")
     * })
     */
    private $pers;



    /**
     * Get travailId
     *
     * @return integer 
     */
    public function getTravailId()
    {
        return $this->travailId;
    }

    /**
     * Set libTravail
     *
     * @param string $libTravail
     * @return Travail
     */
    public function setLibTravail($libTravail)
    {
        $this->libTravail = $libTravail;

        return $this;
    }

    /**
     * Get libTravail
     *
     * @return string 
     */
    public function getLibTravail()
    {
        return $this->libTravail;
    }

    /**
     * Set pers
     *
     * @param \Monappli\Entity\Pers $pers
     * @return Travail
     */
    public function setPers(\Monappli\Entity\Pers $pers = null)
    {
        $this->pers = $pers;

        return $this;
    }

    /**
     * Get pers
     *
     * @return \Monappli\Entity\Pers 
     */
    public function getPers()
    {
        return $this->pers;
    }
}
