<?php 
return array(
   'controllers' => array(
       'factories'=>array(
         'Album\Controller\Auth' => 'Album\Factory\Controller\AuthControllerServiceFactory',
         
       ),
         
       'invokables' => array(
         'Album\Controller\Album' => 'Album\Controller\AlbumController',
         'Album\Controller\Success' => 'Album\Controller\SuccessController',
       ),
       
   ),
   'router' => array(
      'routes' => array(
         'album' => array(
          'type' => 'segment',
             'options' => array(
             'route' => '/albums[/:action][/:id]',
                'constraints' => array(
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '[0-9]+',
                ),
                'defaults' => array(
                'controller' => 'Album\Controller\Album',
                'action' => 'index',
                ),
             ),
         ),
         'auth' => array(
          'type' => 'segment',
             'options' => array(
             'route' => '/album[/:action]',
                'constraints' => array(
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id' => '[0-9]+',
                ),
                'defaults' => array(
                'controller' => 'Album\Controller\Auth',
                'action' => 'index',
                ),
             ),
         ),
         'success' => array(
                   'type'    => 'segment',
                   'options' => array(
                       'route'    => '/accueil[/:action]',
                       'defaults' => array(
                           'controller' => 'Album\Controller\Success',
                           'action'     => 'index',
                       ),
                   ),
         ),
      ),
   ),
 
 'service_manager' => array(
        'factories' => array(
            'AuthStorage' =>
               'Album\Factory\Storage\AuthStorageFactory',
            'AuthService' => 
               'Album\Factory\Storage\AuthenticationServiceFactory',
         ),
   ),
 
 


    'view_manager' => array(
       'template_path_stack' => array(
         'contact' => __DIR__ . '/../view',
       ),
    ),
    
    'di' => array(
        'instance' => array(
            'Zend\View\HelperLoader' => array(
                'parameters' => array(
                'map' => array(
                        'zfcUserIdentity' => 'ZfcUser\View\Helper\ZfcUserIdentity',
                        'zfcUserLoginWidget' => 'ZfcUser\View\Helper\ZfcUserLoginWidget',
                    ),
                ),
            ),
        ),
    ),
    
 );