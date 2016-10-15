<?php

namespace Album\Controller;



use Zend\Mvc\Controller\AbstractActionController;
// use Zend\Authentication\AuthenticationService;
use Zend\View\Model\ViewModel;

use Album\Form\AlbumForm;
use Album\Model\Album;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;


class AlbumController extends AbstractActionController
{
   
   protected $albumTable;
   protected $adapter;
   public function getAlbumTable()
   {
      if (!$this->albumTable) {
           $sm = $this->getServiceLocator();
           $this->albumTable = $sm->get('Album\Model\AlbumTable');
      }
      return $this->albumTable;
   }    

   public function indexAction()
   {
      // grab the paginator from the AlbumTable
     $paginator = $this->getAlbumTable()->fetchAll(true);
     // set the current page to what has been passed in query string, or to 1 if none set
     $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
     // set the number of items per page to 10
     $paginator->setItemCountPerPage(10);
	 
     return new ViewModel(array(
         'paginator' => $paginator
     ));
      
      // return new ViewModel(array(
         // 'albums' => $this->getAlbumTable()->fetchAll(),
      // ));
   }
    
   public function ajouterAction()
   {
      $form = new AlbumForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $album = new Album();
             $form->setInputFilter($album->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $album->exchangeArray($form->getData());
                 $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('album');
             }
         }
         return array('form' => $form);
   } 

    public function modifierAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('album', array(
                 'action' => 'ajouter'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $album = $this->getAlbumTable()->getAlbum($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('album', array(
                 'action' => 'index'
             ));
         }

         $form  = new AlbumForm();
         $form->bind($album);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($album->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('album');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
    }
    
   public function supprimerAction()
   {
       $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('album');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getAlbumTable()->deleteAlbum($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('album');
         }

         return array(
             'id'    => $id,
             'album' => $this->getAlbumTable()->getAlbum($id)
         );
   }
   
   
   public function getAdapter()
   {
      if (!$this->adapter) {
         $sm = $this->getServiceLocator();
         $this->adapter = $sm->get('Zend\Db\Adapter\Adapter');
      }
      return $this->adapter;
   }
   
   
   
   public function rechercherAction(){
      $this->getAlbumTable()->resultss();
   }
   
   // public function queryAction(){
      // $this->getAlbumTable()->resultss();
   // }
   


}

