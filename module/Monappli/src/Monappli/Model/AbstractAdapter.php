<?php
namespace Monappli\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;

abstract class AbstractAdapter implements AdapterAwareInterface
{
    
    /**
     * Instanciation de la base de données
     * 
     * @var \Zend\Db\Adapter\Adapter
     */
    protected $db;
    
    /**
     * forcé l'accès au variable de l'adapter
     *
     * @param Adapter $db
     * @return void
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->db = $adapter;
    }
}