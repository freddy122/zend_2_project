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
	
	public function ExportAction(){
		
		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Monappli\Entity\dossier')->findAll();
		
		
		
		$fichier       = 'export.xls';
		$inputFileName = EXCEL_PATH.'/'.$fichier;
		$objPHPExcel = new \PHPExcel();
		if (!file_exists($inputFileName)) {
		  exit("Please run 14excel7.php first.\n");
		}
		
		$n = 1;
		
		$objet       = \PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objet->load($inputFileName);
		$objPHPExcel->createSheet();
		$sheet =  $objPHPExcel->setActiveSheetIndex($n);
		$titre = "export_dossier";
		$sheet->setTitle($titre);
		$objPHPExcel->getActiveSheet($n)->setCellValue('A1','Dossier'); 
		$objPHPExcel->getActiveSheet($n)->mergeCells('A1:C1');
		
		$objPHPExcel->getActiveSheet($n)->setCellValue('A2','Code client');
		$objPHPExcel->getActiveSheet($n)->setCellValue('B2','Nom client');
		$objPHPExcel->getActiveSheet($n)->setCellValue('C2','Date de numerisation');
		$objPHPExcel->getActiveSheet($n)->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet($n)->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet($n)->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet($n)->freezePane('A3');
		
		$ligne = $n+2;
		foreach($data as $key=>$row)
		{
			$objPHPExcel->getActiveSheet($n)->setCellValue('A'.$ligne,$row->getNumeroClient());
			$objPHPExcel->getActiveSheet($n)->setCellValue('B'.$ligne,$row->getNomClient());
			$objPHPExcel->getActiveSheet($n)->setCellValue('C'.$ligne,$row->getDateNumerisation()->format('d-m-Y'));
			// echo '<pre>';
				// print_r($row->getNumeroClient());
				// print_r($row->getNomClient());
				// print_r($row->getDateNumerisation()->format('d-m-Y'));
			// echo '</pre>';
			
			$ligne++;
		}
		
		
		
		$objPHPExcel->removeSheetByIndex(0);
		$objPHPExcel->setActiveSheetIndex(0);
		$file = 'commande.xls';
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$file.'"');
		$objWriter->save(EXCEL_PATH.'/'.$file);
		readfile(EXCEL_PATH.'/'.$file);
		exit;
	}
}

