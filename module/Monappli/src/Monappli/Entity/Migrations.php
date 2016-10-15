<?php

namespace Monappli\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migrations
 *
 * @ORM\Table(name="migrations")
 * @ORM\Entity
 */
class Migrations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="migration", type="string", length=255, nullable=false)
     */
    private $migration;

    /**
     * @var integer
     *
     * @ORM\Column(name="batch", type="integer", nullable=false)
     */
    private $batch;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set migration
     *
     * @param string $migration
     * @return Migrations
     */
    public function setMigration($migration)
    {
        $this->migration = $migration;

        return $this;
    }

    /**
     * Get migration
     *
     * @return string 
     */
    public function getMigration()
    {
        return $this->migration;
    }

    /**
     * Set batch
     *
     * @param integer $batch
     * @return Migrations
     */
    public function setBatch($batch)
    {
        $this->batch = $batch;

        return $this;
    }

    /**
     * Get batch
     *
     * @return integer 
     */
    public function getBatch()
    {
        return $this->batch;
    }
}
