<?php

namespace Monappli\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OrmController extends AbstractActionController
{

    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Monappli\Entity\dossier')->findAll();
		foreach($data as $key=>$row)
		{
			 $rs[] = $row;
		}
        
		return new ViewModel(array("result"=>$rs));
    }


}

