$(document).ready(function(){
   var table_res = $("#my_data").DataTable({
      "processing": true,
		//"serverSide": true,
		"aaSorting": [[1,'asc']],
		"sPaginationType": "full_numbers",
		"order": [[ 3, "asc" ]],
		"oLanguage" : {
			"sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
			"sZeroRecords": "Nothing found - sorry",
			"sInfo": "Affichage de _START_ &agrave;  _TOTAL_ enregistrements",
			"sInfoEmpty": "Showing 0 to 0 of 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)",
			"sProcessing": "Chargement...",
			"oPaginate": {
				'sFirst': 'D\351but',
				'sLast': 'Fin',
				'sNext': 'Suivant',
				'sPrevious': 'Pr&eacutec&eacutedent'
			},
		},
		//"scrollX" : true,
			
		"iDisplayLength": 10,
		"iDisplayStart": 0,
		"ajax": {
			"url" : "monappli/getdata",
		},
		"columndefs": [{
            "data": null,
		}],
      
   });
   $("#dt_num_mod").datepicker({
				dateFormat:"dd-mm-yy"
	});
   $("#my_data tbody").on('click','#modif_r',function(){
		// var resu = table_res.row($(this)).data();
		var resu = table_res.row( $(this).parents('tr') ).data();
		//alert(resu[0]);
		//$("#modif_client").load("monappli/getbyid");
		$("#myModalLabel").html("Modification du données pour le client <font color='blue'>"+resu[1]+"</font> dont l'identifiant est <font color='blue'>"+resu[0]);
		$.ajax({
			type:"POST",
			url:"monappli/getbyid",
			data:{
				id_c : resu[0]
			},
			success:function(resu){
				$("#modif_client").html(resu);
			}
		})
   })
   
   
   
   // $("#ajout_cl").html("monappli/ajouter");
   
   // click(function(){
	
   // })
})