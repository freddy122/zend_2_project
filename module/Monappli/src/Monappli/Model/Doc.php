<?php

 namespace Monappli\Model;

 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Adapter\Adapter;
 use Zend\Db\Sql\Sql;
 use Zend\Paginator\Adapter\DbSelect;

 
 class Doc extends AbstractAdapter
 {
      
     protected $tableGateway;
     public $dbAdapter;
     public function resultatAjax(){
         $uu        = $this->db;
         $sql      	= new Sql($uu);
         $select   	= $sql->select();
         $select->from('dossier')->order('dossier.numero_client desc');
         $statement = $sql->prepareStatementForSqlObject($select);
         $results 	= $statement->execute();
         $resultSet = new ResultSet;
         $resultSet->initialize($results);
         $tot_row  	= $resultSet->count();
         foreach ($resultSet as $row){
		 $res_date 	  = new \DateTime($row->date_numerisation);
		 $dt_num 	  = date_format($res_date,"d/m/Y"); 
            $arrs[] = array(
				$row->numero_client,
				$row->nom_client,
				 $dt_num,
				"<input type='hidden' value=".$row->numero_client." id='val_hid'><button class='btn btn-success' id='modif_r'  data-toggle='modal' data-target='#myModal'>modifier</button>&nbsp;<button class='btn btn-danger' id='suppr_r'>Supprimer</button>"
            ); 
        }
        $datatables = json_encode(
			array
				(
				   "iTotalRecords"         => $tot_row,
				   "iTotalDisplayRecords"  => $tot_row,
				   "aaData" 			   => $arrs
				)
        );
         echo $datatables;
     }
	 
	 public function ajouter($num_cl,$nom_cl,$date_numerisation)
	 {
		$sql = "
			INSERT INTO `app_zend`.`dossier`
						(`numero_client`,
						 `nom_client`,
						 `date_numerisation`)
			VALUES ('".$num_cl."',
					'".$nom_cl."',
					'".$date_numerisation."'
					);
		";
		$statement = $this->db->query($sql);
		return $statement->execute();
	 }
	 
	public function afficherparId($id_cli)
	{
		$sql = "
			SELECT
			  `numero_client`,
			  `nom_client`,
			  `date_numerisation`
			FROM `app_zend`.`dossier`
			WHERE `numero_client` = '".$id_cli."'
		";
		$statement = $this->db->query($sql);
		return $statement->execute();
	}
	 
	 
	 public function querys(){
		//$adapt       = $this->db;
		$sql = "
			SELECT 	a.numero_client , UPPER(d.nom_client) AS nom_client, d.date_numerisation, i.date_integration
				,CASE WHEN a.nombre_pages IS NULL THEN 0 ELSE a.nombre_pages END AS nb_conventions
				,CASE WHEN b.nombre_pages IS NULL THEN 0 ELSE b.nombre_pages END AS nb_factures
				,CASE WHEN c.nombre_pages IS NULL THEN 0 ELSE c.nombre_pages END AS nb_pieces
			FROM nombre a
				LEFT JOIN (
					SELECT b.numero_client ,b.type_document , b.nombre_pages
					FROM nombre b
					
					WHERE b.type_document = '03'
					
				) b
					ON a.numero_client = b.numero_client
				LEFT JOIN (
					SELECT c.numero_client ,c.type_document , c.nombre_pages
					FROM nombre c
					
					WHERE c.type_document = '02'
					
				) c
					ON a.numero_client = c.numero_client
					
				INNER JOIN dossier d
					ON a.numero_client = d.numero_client
					
				INNER JOIN envoi_infos e
					ON a.numero_client = e.numero_client
				
				LEFT JOIN integration i
					ON a.numero_client = i.numero_client
					
			WHERE a.type_document = '01' 
				AND (e.envoi = 1 OR e.envoi = 3)
			GROUP BY a.numero_client	
		"; 
		$statement = $this->db->query($sql);
		$res= $statement->execute();
		$resultSet = new ResultSet;
        $resultSet->initialize($res);
		foreach($resultSet as $rws){
			 // echo '<pre>';
				// print_r($rws);
			// echo '</pre>';
		}
		 
		
		
	 }

  }    