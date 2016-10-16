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
		var resu = table_res.row( $(this).parents('tr') ).data();
		$("#myModalLabel").html();
		$.ajax({
			type:"POST",
			url:"monappli/getbyid",
			data:{
				id_c : resu[0]
			},
			success:function(resu){
				$("#myModal").html(resu);
			}
		})
   }) 
   
   $("#my_data tbody").on('click','#suppr_r',function(){
		var resu = table_res.row( $(this).parents('tr') ).data();
		if(confirm("Voulez vous supprimer le client "+resu[1]))
		{
			$.ajax({
				type:"POST",
				url:"monappli/supprimer",
				data:{
					id_c : resu[0]
				},
				success:function(resu){
					//$("#myModal").html(resu);
					alert('Suppression effectué');
					$("#annul_ajout").trigger("click");
					location.reload();
				}
			})
		}
   })
   
   
   $("#my_doctrine").DataTable();
   $("#exporter_").click(function(){
		window.location.href = "monappli/export";
   })
   
})
