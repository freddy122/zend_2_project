<?php//filename : module/SanAuthWithDbSaveHandler/src/SanAuthWithDbSaveHandler/Controller/SuccessController.phpnamespace Album\Controller; use Zend\Mvc\Controller\AbstractActionController;use Zend\Authentication\AuthenticationService;use Zend\View\Model\ViewModel;use Album\Form\AlbumForm;use Album\Model\Album;use Zend\Session\Container;class SuccessController extends AbstractActionController{       protected $albumTable;	  protected $authService;         //we will inject authService via factory    // public function __construct(AuthenticationService $authService)    // {        // $this->authService = $authService;    // }   public function getAlbumTable()   {      if (!$this->albumTable) {           $sm = $this->getServiceLocator();           $this->albumTable = $sm->get('Album\Model\AlbumTable');      }      return $this->albumTable;   }       public function indexAction()   {       // $session = new Container('base');	  // $uu = $session->fred;		 // print_r($uu.'--');	  // grab the paginator from the AlbumTable     $paginator = $this->getAlbumTable()->fetchAll(true);     // set the current page to what has been passed in query string, or to 1 if none set     $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));     // set the number of items per page to 10     $paginator->setItemCountPerPage(10);     return new ViewModel(array(         'paginator' => $paginator     ));              }          public function ajouterAction()    {      $form = new AlbumForm();         $form->get('submit')->setValue('Add');         $request = $this->getRequest();         if ($request->isPost()) {             $album = new Album();             $form->setInputFilter($album->getInputFilter());             $form->setData($request->getPost());             if ($form->isValid()) {                 $album->exchangeArray($form->getData());                 $this->getAlbumTable()->saveAlbum($album);                 // Redirect to list of albums                 return $this->redirect()->toRoute('album');             }         }         return array('form' => $form);    }    }