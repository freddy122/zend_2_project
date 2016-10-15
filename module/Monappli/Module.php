<?php
namespace Monappli;
// use Monappli\Model\doc;
class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
	
	 // public function onBootstrap(MvcEvent $e)
    // {
        
        // $em = $e->getApplication()->getServiceManager()->get('Doctrine\ORM\EntityManager');
        // $platform = $em->getConnection()->getDatabasePlatform();
        // $platform->registerDoctrineTypeMapping('enum', 'string');
       
       
    // }
   // public function getServiceConfig()
   // {
      // return array(
            // 'factories' => array(
                 // 'DocTableGateway' => function ($sm) {
                     // $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     // $resultSetPrototype = new ResultSet();
                     // $resultSetPrototype->setArrayObjectPrototype(new Doc());
                     // return new TableGateway('doc', $dbAdapter, null, $resultSetPrototype);
                 // },
            // ),
      // );
   // }
    
    
}
