<?php
	return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => array(
                        'host' => 'localhost',
                        'port' => '3306',
                        'dbname' => 'app_zend',
						
                ),
				'doctrine_type_mappings' => array(
					'enum' => 'string'
				),
            ),
			// 'mapping_types'=>array(
				// 'enum'=>'string',
			// )
			// 'orm_default' => array(
				
			// )
			
        )
	));
	// $conn = $em->getConnection();
// $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');