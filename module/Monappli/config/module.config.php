<?php
return array(
   
   'controllers' => array(
       'factories'=>array(
         //'Monappli\Controller\Auth' => 'Monappli\Factory\Controller\AuthControllerServiceFactory',
         'Monappli\Controller\Monappli' => 'Monappli\Controller\IndexController',
       ),
         
       'invokables' => array(
         'Monappli\Controller\Monappli' => 'Monappli\Controller\IndexController',
         
       ),
       
   ),
   'router' => array(
      'routes' => array(
         'monappli' => array(
          'type' => 'segment',
             'options' => array(
             'route' => '/monappli[/:action][/:id]',
                'constraints' => array(
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '[0-9]+',
                ),
                'defaults' => array(
                'controller' => 'Monappli\Controller\Monappli',
                'action' => 'index',
                ),
             ),
         ),
         
      ),
   ),
    'view_manager' => array(
       'template_path_stack' => array(
         'monappli' => __DIR__ . '/../view',
       ),
    ),
	
	'doctrine' => array(
        'driver' => array(
            'Monappli_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Monappli/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                     'Monappli\Entity' =>  'Monappli_driver'
                ),
            ),
        ),
    ),   
   
   
);