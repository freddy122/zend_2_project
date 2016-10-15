<?php

namespace Monappli\Controller;

use Monappli\Model\Doc;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

class IndexController extends AbstractActionController
{
    
	public function __construct(){
		// $model_doc = new Doc();
		// print_r($model_doc);
	}
    public function indexAction()
    {
         
		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Monappli\Entity\travail')->findAll();
		foreach($data as $key=>$row)
		{
			// echo $row->getLibTravail();
			// echo '<br />';
		}
      $aa =  $this->getServiceLocator()->get('Monappli\Model\Doc')->querys();
        
         return new ViewModel();
    }
    
    
    public function getdataAction()
    {
      
      // $dd = new Doc();
      $aa =  $this->getServiceLocator()->get('Monappli\Model\Doc')->resultatAjax();
      $viewModel = new ViewModel();
      $viewModel->setVariables(array('key' => 'value'))
                ->setTerminal(true);
      return $viewModel;
    }
	
	public function ajouterAction(){
		$viewModel = new ViewModel();
		$viewModel->setVariables(array('key' => 'value'))
                  ->setTerminal(true);
		return $viewModel;
	}
	
	public function addAction(){
		$ncli     = $this->getRequest()->getPost('n_cli');
		$nomcli   = $this->getRequest()->getPost('nom_cli');
		$date_num = $this->getRequest()->getPost('dt_num');
							
		$uu 	  = new \DateTime($date_num);
		$date_numerisation = date_format($uu,'Y-m-d h:i:s');
		
		$aa        =  $this->getServiceLocator()->get('Monappli\Model\Doc')->ajouter($ncli,$nomcli,$date_numerisation);
		$viewModel = new ViewModel();
		$viewModel->setVariables(array('key' => 'value'))
                  ->setTerminal(true);
		return $viewModel;
	}
	
	public function getbyidAction(){
		$ncli      = $this->getRequest()->getPost('id_c');
		$res_byId  =  $this->getServiceLocator()->get('Monappli\Model\Doc')->afficherparId($ncli);
		$arr_resu = array();
		foreach($res_byId as $resu){
			array_push($arr_resu,$resu);
		}
		$viewModel = new ViewModel(array("res_aff"=>$resu));
		$viewModel->setVariables(array('key' => 'value'))
                  ->setTerminal(true);
		return $viewModel;
	}
	
	public function modifierAction(){
		
		
		$viewModel = new ViewModel(array("res"=>"aaa"));
		$viewModel->setVariables(array('key' => 'value'))
                  ->setTerminal(true);
		return $viewModel;
		
	}


}

