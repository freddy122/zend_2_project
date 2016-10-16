<?php

namespace Monappli\Controller;

use Monappli\Model\Doc;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
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
		$arr_resu  = array();
		foreach($res_byId as $resu){
			array_push($arr_resu,$resu);
		}
		$viewModel = new ViewModel(array("res_aff"=>$arr_resu));
		$viewModel->setVariables(array('key' => 'value'))
                  ->setTerminal(true);
		return $viewModel;
	}
	
	public function modifierAction(){
		$ncli      = $this->getRequest()->getPost('num_cli');
		$nom_cli   = $this->getRequest()->getPost('nom_cli');
		$dt_num    = $this->getRequest()->getPost('dt_num');
		$uu 	  = new \DateTime($dt_num);
		$date_numerisation = date_format($uu,'Y-m-d h:i:s');
		$res_byId  =  $this->getServiceLocator()->get('Monappli\Model\Doc')->modifier($ncli,$nom_cli,$date_numerisation);
		$viewModel = new ViewModel();
		$viewModel->setVariables(array('key' => 'value'))
                  ->setTerminal(true);
		return $viewModel;
	}
	
	public function SupprimerAction(){
		$ncli   = $this->getRequest()->getPost('id_c');
		$res_byId  =  $this->getServiceLocator()->get('Monappli\Model\Doc')->supprimer($ncli);
		$viewModel = new ViewModel();
		$viewModel->setVariables(array('key' => 'value'))
                  ->setTerminal(true);
		return $viewModel;
	}
}

