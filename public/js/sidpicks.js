/*
Niaina RAKOTONIARY
vivetic.com

Système d'information date picker

*/
$(function () {
      		
				$(".clddfin").hide();
				$(".cljour").hide();
				
				var _date						= $("#datedeb").val();
				var _tdate						= _date.split("/");
				plage							= "op=egal&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
				$("#hvaldate").val(plage);
				
				//debut on click du bouton
				$("#rechercher_interv").click(function() {
					var selectervalue	=	$("#plage_selecteur").val();
					
					var plage			= "";
					
					var jsnow 		= new Date();
					var jstimezone	= jsnow.getTimezoneOffset();
					
					switch ( selectervalue )
					{
					case "d":
						var _date						= $("#datedeb").val();
						var _tdate						= _date.split("/");
						plage							= "op=egal&res=d&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
					  break;
					  
					case "ds":
						var _date						= $("#datedeb").val();
						var _tdate						= _date.split("/");
						plage							= "op=egal&res=ds&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
						
					  break;
					  
					case "di":
						
						var _date						= $("#datedeb").val();
						var _tdate						= _date.split("/");
						plage							= "op=inferieuregal&res=di&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
						
					  break;
					case "dd":
						
						var _datedeb					= $("#datedeb").val();
						var _datefin					= $("#datefin").val();
						var _tdated						= _datedeb.split("/");
						var _tdatef						= _datefin.split("/");
                  
                  var d1 = new Date(_datedeb);
                  var d2 = new Date(_datefin);
                  if(d2.getTime() < d1.getTime()){
                     alert("Date fin devrait supérieur ou égale à date deb");
                     $("#loader").css("display","none");
                     //$("#res_filtre").css("display","none");
                     return;
                  }
						plage							   = "op=entre&res=dd&dtdeb="+_tdated[0]+"-"+_tdated[1]+"-"+_tdated[2]+"&dtfin="+_tdatef[0]+"-"+_tdatef[1]+"-"+_tdatef[2];
                  
						
					  break;
					case "j":
						
						var _year						= jsnow.getFullYear();
						var _mois						= ("0" + (jsnow.getMonth()/1+1/1)).slice(-2);
						var _day						= ("0" + jsnow.getDate()).slice(-2);
						plage							= "op=egal&res=j&dtdeb="+_year+"-"+_mois+"-"+_day;
						
					  break;
					case "j1":
						/*var _year						= jsnow.getFullYear();
						
						var _mois						= ("0" + (jsnow.getMonth()/1 + 1/1)).slice(-2);
						var _day						= ("0" + (jsnow.getDate()/1-1/1)).slice(-2);
						plage							= "op=egal&dtdeb="+_year+"-"+_mois+"-"+_day;*/
						
						  var yesterday = new Date();
				          yesterday.setHours(0, 0, 0, 0);
				          yesterday.setDate(yesterday.getDate() - 1);
				
				          var _mois  = ('0' + parseInt(yesterday.getMonth()+1)).slice(-2);
				          var _year = yesterday.getFullYear();
				          var _day = yesterday.getDate();
				      
				          plage       = "op=egal&res=j1&dtdeb="+_year+"-"+_mois+"-"+_day;
					break;
					  
					case "s":
						
						var debutsem=new Date();
						debutsem=debutsem.setUTCDate(debutsem.getUTCDate()-debutsem.getUTCDay()+1);
						
						var tomorrow = new Date();
						var today = new Date(debutsem);
						var someDate = new Date(debutsem);
						
						someDate.setDate(someDate.getDate() );
						
						var dd = someDate.getDate();
						var mm = someDate.getMonth() + 1;
						var y = someDate.getFullYear();
						
						someDate.setDate(someDate.getDate() + (6));
						var ddf = someDate.getDate();
						var mmf = someDate.getMonth() + 1;
						var yf = someDate.getFullYear();
						if (dd<10) dd="0"+dd; 
						if (ddf<10) ddf="0"+ddf;
						if (mm<10) mm="0"+mm; 
						if (mmf<10) mmf="0"+mmf; 
						var strPlageweek =  y+'-'+mm +'-'+dd+'&&'+yf+'-'+ mmf +'-'+ddf;
						
						var tstrPlageweek				= strPlageweek.split("&&");
						
						var dtdeb						= tstrPlageweek[0];
						var dtfin						= tstrPlageweek[1];
																	
						plage							= "op=entre&res=s&dtdeb="+dtdeb+"&dtfin="+dtfin;
						//alert(plage);
					  
					  break;
					case "ss":
						var _year						= (jsnow.getFullYear());
						var _mois						= jsnow.getMonth()/1+1/1 ;
						var _day						= jsnow.getDate() ;
						
												
						var debutsem=new Date();
						debutsem=debutsem.setUTCDate(debutsem.getUTCDate()-debutsem.getUTCDay()+1);
						
						var tomorrow = new Date();
						var today = new Date(debutsem);
						var someDate = new Date(debutsem);
						
						someDate.setDate(someDate.getDate() + (-14));
						
						var dd = someDate.getDate();
						var mm = someDate.getMonth() + 1;
						var y = someDate.getFullYear();
						
						someDate.setDate(someDate.getDate() +13);
						var ddf = someDate.getDate();
						var mmf = someDate.getMonth() + 1;
						var yf = someDate.getFullYear();
						if (dd<10) dd="0"+dd; 
						if (ddf<10) ddf="0"+ddf;
						if (mm<10) mm="0"+mm; 
						if (mmf<10) mmf="0"+mmf; 
						var strPlageweek =  y+'-'+mm +'-'+dd+'&&'+yf+'-'+ mmf +'-'+ddf;
						
						var tstrPlageweek				= strPlageweek.split("&&");
						
						var dtdeb						= tstrPlageweek[0];
						var dtfin						= tstrPlageweek[1];
						
						plage							= "op=entre&res=ss&dtdeb="+dtdeb+"&dtfin="+dtfin;
						
					  break;
						
					  
					case "s1":
						
						var _year						= (jsnow.getFullYear());
						var _mois						= jsnow.getMonth()/1+1/1 ;
						var _day						= jsnow.getDate() ;
						
												
						var debutsem=new Date();
						debutsem=debutsem.setUTCDate(debutsem.getUTCDate()-debutsem.getUTCDay()+1);
						
						var tomorrow = new Date();
						var today = new Date(debutsem);
						var someDate = new Date(debutsem);
						
						someDate.setDate(someDate.getDate() + (-7));
						
						var dd = someDate.getDate();
						var mm = someDate.getMonth() + 1;
						var y = someDate.getFullYear();
						
						someDate.setDate(someDate.getDate() + (6));
						var ddf = someDate.getDate();
						var mmf = someDate.getMonth() + 1;
						var yf = someDate.getFullYear();
						if (dd<10) dd="0"+dd; 
						if (ddf<10) ddf="0"+ddf;
						if (mm<10) mm="0"+mm; 
						if (mmf<10) mmf="0"+mmf; 
						var strPlageweek =  y+'-'+mm +'-'+dd+'&&'+yf+'-'+ mmf +'-'+ddf;
						
						var tstrPlageweek				= strPlageweek.split("&&");
						
						var dtdeb						= tstrPlageweek[0];
						var dtfin						= tstrPlageweek[1];
											
						
						plage							= "op=entre&res=s1&dtdeb="+dtdeb+"&dtfin="+dtfin;
						
						/*plage							= "op=entre&dtdeb="+_dated+"-"+_monthd+"-"+_yeard+"&dtfin="+_datef+"-"+_monthf+"-"+_yearf;*/
						//alert(plage);
					  break;
					case "m":
											
						var _year						= jsnow.getFullYear();
						var _mois						= jsnow.getMonth() ;
						var _day						= jsnow.getDate() ;
						
						var _datedeb					= new Date(_year,_mois,1)	;
						var _datefin					= new Date(_year,_mois/1+1,0)	;
						
						var _yeard						= _datedeb.getFullYear();
						var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
						var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
						
						var _yearf						= _datefin.getFullYear();
						var _moisf						= ("0" + (_datefin.getMonth()/1 + 1/1)).slice(-2); 
						var _dayf						= ("0" + _datefin.getDate()).slice(-2) ;
						
						plage							= "op=entre&res=m&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd+"&dtfin="+_yearf+"-"+_moisf+"-"+_dayf;
						
					  break;
					case "m1":
						
						var _year						= jsnow.getFullYear();
						var _mois						= jsnow.getMonth() ;
						var _day						= jsnow.getDate() ;
						
						var _datedeb					= new Date(_year,_mois/1-1,1)	;
						var _datefin					= new Date(_year,_mois,0)	;
						
						var _yeard						= _datedeb.getFullYear();
						var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
						var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
						
						var _yearf						= _datefin.getFullYear();
						var _moisf						= ("0" + (_datefin.getMonth()/1 + 1/1)).slice(-2); 
						var _dayf						= ("0" + _datefin.getDate()).slice(-2) ;
						
						plage							= "op=entre&res=m1&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd+"&dtfin="+_yearf+"-"+_moisf+"-"+_dayf;
						
					  break;
					case "y":
						
						var _year						= jsnow.getFullYear();
											
						var _datedeb					= new Date(_year,0,1)	;
						var _datefin					= new Date(_year,12,0)	;
						
						var _yeard						= _datedeb.getFullYear();
						var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
						var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
						
						var _yearf						= _datefin.getFullYear();
						var _moisf						= ("0" + (_datefin.getMonth()/1 + 1/1)).slice(-2); 
						var _dayf						= ("0" + _datefin.getDate()).slice(-2) ;
						
						plage							= "op=entre&res=y&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd+"&dtfin="+_yearf+"-"+_moisf+"-"+_dayf;
						
					  break;
					case "jr":
						$(".clddeb").hide();
						$(".clddfin").hide();
						$(".cljour").show();
						
						var _nbjour						= $("#nbjour").val();
					
						var _year						= jsnow.getFullYear();
						var _mois						= jsnow.getMonth() ;
						var _day						= jsnow.getDate() ;
						
						var _datedeb					= new Date(_year,_mois,_day/1-_nbjour/1)	;
						
						
						var _yeard						= _datedeb.getFullYear();
						var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
						var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
								
						plage							= "op=egal&res=jr&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd;
					
					  break;
					default:
							var _date						= $("#datedeb").val();
							var _tdate						= _date.split("/");
							plage							= "op=egal&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
				}
				$("#hvaldate").val(plage);
            
				$("#loader").css("display","block");
				$("#res_filtre").css("display","none");
            get_alldata()
            }); //fin on click du bouton
			
         
         
         
         
         
         
         
         
         
         $("#export_interv").click(function() {
					var selectervalue	=	$("#plage_selecteur").val();
					
					var plage			= "";
					
					var jsnow 		= new Date();
					var jstimezone	= jsnow.getTimezoneOffset();
					
					switch ( selectervalue )
					{
                  case "d":
                     var _date						= $("#datedeb").val();
                     var _tdate						= _date.split("/");
                     plage							= "op=egal&res=d&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
                    break;
                    
                  case "ds":
                     var _date						= $("#datedeb").val();
                     var _tdate						= _date.split("/");
                     plage							= "op=egal&res=ds&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
                     
                    break;
                    
                  case "di":
                     
                     var _date						= $("#datedeb").val();
                     var _tdate						= _date.split("/");
                     plage							= "op=inferieuregal&res=di&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
                     
                    break;
                  case "dd":
                     
                     var _datedeb					= $("#datedeb").val();
                     var _datefin					= $("#datefin").val();
                     var _tdated						= _datedeb.split("/");
                     var _tdatef						= _datefin.split("/");
                     
                     var d1 = new Date(_datedeb);
                     var d2 = new Date(_datefin);
                     if(d2.getTime() < d1.getTime()){
                        alert("Date fin devrait supérieur ou égale à date deb");
                        $("#loader").css("display","none");
                        //$("#res_filtre").css("display","none");
                        return;
                     }
                     plage							   = "op=entre&res=dd&dtdeb="+_tdated[0]+"-"+_tdated[1]+"-"+_tdated[2]+"&dtfin="+_tdatef[0]+"-"+_tdatef[1]+"-"+_tdatef[2];
                     
                     
                    break;
                  case "j":
                     
                     var _year						= jsnow.getFullYear();
                     var _mois						= ("0" + (jsnow.getMonth()/1+1/1)).slice(-2);
                     var _day						= ("0" + jsnow.getDate()).slice(-2);
                     plage							= "op=egal&res=j&dtdeb="+_year+"-"+_mois+"-"+_day;
                     
                    break;
                  case "j1":
                     /*var _year						= jsnow.getFullYear();
                     
                     var _mois						= ("0" + (jsnow.getMonth()/1 + 1/1)).slice(-2);
                     var _day						= ("0" + (jsnow.getDate()/1-1/1)).slice(-2);
                     plage							= "op=egal&dtdeb="+_year+"-"+_mois+"-"+_day;*/
                     
                       var yesterday = new Date();
                         yesterday.setHours(0, 0, 0, 0);
                         yesterday.setDate(yesterday.getDate() - 1);
               
                         var _mois  = ('0' + parseInt(yesterday.getMonth()+1)).slice(-2);
                         var _year = yesterday.getFullYear();
                         var _day = yesterday.getDate();
                     
                         plage       = "op=egal&res=j1&dtdeb="+_year+"-"+_mois+"-"+_day;
                  break;
                    
                  case "s":
                     
                     var debutsem=new Date();
                     debutsem=debutsem.setUTCDate(debutsem.getUTCDate()-debutsem.getUTCDay()+1);
                     
                     var tomorrow = new Date();
                     var today = new Date(debutsem);
                     var someDate = new Date(debutsem);
                     
                     someDate.setDate(someDate.getDate() );
                     
                     var dd = someDate.getDate();
                     var mm = someDate.getMonth() + 1;
                     var y = someDate.getFullYear();
                     
                     someDate.setDate(someDate.getDate() + (6));
                     var ddf = someDate.getDate();
                     var mmf = someDate.getMonth() + 1;
                     var yf = someDate.getFullYear();
                     if (dd<10) dd="0"+dd; 
                     if (ddf<10) ddf="0"+ddf;
                     if (mm<10) mm="0"+mm; 
                     if (mmf<10) mmf="0"+mmf; 
                     var strPlageweek =  y+'-'+mm +'-'+dd+'&&'+yf+'-'+ mmf +'-'+ddf;
                     
                     var tstrPlageweek				= strPlageweek.split("&&");
                     
                     var dtdeb						= tstrPlageweek[0];
                     var dtfin						= tstrPlageweek[1];
                                                      
                     plage							= "op=entre&res=s&dtdeb="+dtdeb+"&dtfin="+dtfin;
                     //alert(plage);
                    
                    break;
                  case "ss":
                     var _year						= (jsnow.getFullYear());
                     var _mois						= jsnow.getMonth()/1+1/1 ;
                     var _day						= jsnow.getDate() ;
                     
                                       
                     var debutsem=new Date();
                     debutsem=debutsem.setUTCDate(debutsem.getUTCDate()-debutsem.getUTCDay()+1);
                     
                     var tomorrow = new Date();
                     var today = new Date(debutsem);
                     var someDate = new Date(debutsem);
                     
                     someDate.setDate(someDate.getDate() + (-14));
                     
                     var dd = someDate.getDate();
                     var mm = someDate.getMonth() + 1;
                     var y = someDate.getFullYear();
                     
                     someDate.setDate(someDate.getDate() +13);
                     var ddf = someDate.getDate();
                     var mmf = someDate.getMonth() + 1;
                     var yf = someDate.getFullYear();
                     if (dd<10) dd="0"+dd; 
                     if (ddf<10) ddf="0"+ddf;
                     if (mm<10) mm="0"+mm; 
                     if (mmf<10) mmf="0"+mmf; 
                     var strPlageweek =  y+'-'+mm +'-'+dd+'&&'+yf+'-'+ mmf +'-'+ddf;
                     
                     var tstrPlageweek				= strPlageweek.split("&&");
                     
                     var dtdeb						= tstrPlageweek[0];
                     var dtfin						= tstrPlageweek[1];
                     
                     plage							= "op=entre&res=ss&dtdeb="+dtdeb+"&dtfin="+dtfin;
                     
                    break;
                     
                    
                  case "s1":
                     
                     var _year						= (jsnow.getFullYear());
                     var _mois						= jsnow.getMonth()/1+1/1 ;
                     var _day						= jsnow.getDate() ;
                     
                                       
                     var debutsem=new Date();
                     debutsem=debutsem.setUTCDate(debutsem.getUTCDate()-debutsem.getUTCDay()+1);
                     
                     var tomorrow = new Date();
                     var today = new Date(debutsem);
                     var someDate = new Date(debutsem);
                     
                     someDate.setDate(someDate.getDate() + (-7));
                     
                     var dd = someDate.getDate();
                     var mm = someDate.getMonth() + 1;
                     var y = someDate.getFullYear();
                     
                     someDate.setDate(someDate.getDate() + (6));
                     var ddf = someDate.getDate();
                     var mmf = someDate.getMonth() + 1;
                     var yf = someDate.getFullYear();
                     if (dd<10) dd="0"+dd; 
                     if (ddf<10) ddf="0"+ddf;
                     if (mm<10) mm="0"+mm; 
                     if (mmf<10) mmf="0"+mmf; 
                     var strPlageweek =  y+'-'+mm +'-'+dd+'&&'+yf+'-'+ mmf +'-'+ddf;
                     
                     var tstrPlageweek				= strPlageweek.split("&&");
                     
                     var dtdeb						= tstrPlageweek[0];
                     var dtfin						= tstrPlageweek[1];
                                    
                     
                     plage							= "op=entre&res=s1&dtdeb="+dtdeb+"&dtfin="+dtfin;
                     
                     /*plage							= "op=entre&dtdeb="+_dated+"-"+_monthd+"-"+_yeard+"&dtfin="+_datef+"-"+_monthf+"-"+_yearf;*/
                     //alert(plage);
                    break;
                  case "m":
                                    
                     var _year						= jsnow.getFullYear();
                     var _mois						= jsnow.getMonth() ;
                     var _day						= jsnow.getDate() ;
                     
                     var _datedeb					= new Date(_year,_mois,1)	;
                     var _datefin					= new Date(_year,_mois/1+1,0)	;
                     
                     var _yeard						= _datedeb.getFullYear();
                     var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
                     var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
                     
                     var _yearf						= _datefin.getFullYear();
                     var _moisf						= ("0" + (_datefin.getMonth()/1 + 1/1)).slice(-2); 
                     var _dayf						= ("0" + _datefin.getDate()).slice(-2) ;
                     
                     plage							= "op=entre&res=m&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd+"&dtfin="+_yearf+"-"+_moisf+"-"+_dayf;
                     
                    break;
                  case "m1":
                     
                     var _year						= jsnow.getFullYear();
                     var _mois						= jsnow.getMonth() ;
                     var _day						= jsnow.getDate() ;
                     
                     var _datedeb					= new Date(_year,_mois/1-1,1)	;
                     var _datefin					= new Date(_year,_mois,0)	;
                     
                     var _yeard						= _datedeb.getFullYear();
                     var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
                     var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
                     
                     var _yearf						= _datefin.getFullYear();
                     var _moisf						= ("0" + (_datefin.getMonth()/1 + 1/1)).slice(-2); 
                     var _dayf						= ("0" + _datefin.getDate()).slice(-2) ;
                     
                     plage							= "op=entre&res=m1&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd+"&dtfin="+_yearf+"-"+_moisf+"-"+_dayf;
                     
                    break;
                  case "y":
                     
                     var _year						= jsnow.getFullYear();
                                    
                     var _datedeb					= new Date(_year,0,1)	;
                     var _datefin					= new Date(_year,12,0)	;
                     
                     var _yeard						= _datedeb.getFullYear();
                     var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
                     var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
                     
                     var _yearf						= _datefin.getFullYear();
                     var _moisf						= ("0" + (_datefin.getMonth()/1 + 1/1)).slice(-2); 
                     var _dayf						= ("0" + _datefin.getDate()).slice(-2) ;
                     
                     plage							= "op=entre&res=y&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd+"&dtfin="+_yearf+"-"+_moisf+"-"+_dayf;
                     
                    break;
                  case "jr":
                     $(".clddeb").hide();
                     $(".clddfin").hide();
                     $(".cljour").show();
                     
                     var _nbjour						= $("#nbjour").val();
                  
                     var _year						= jsnow.getFullYear();
                     var _mois						= jsnow.getMonth() ;
                     var _day						= jsnow.getDate() ;
                     
                     var _datedeb					= new Date(_year,_mois,_day/1-_nbjour/1)	;
                     var _yeard						= _datedeb.getFullYear();
                     var _moisd						= ("0" + (_datedeb.getMonth()/1 + 1/1)).slice(-2);
                     var _dayd						= ("0" + _datedeb.getDate()).slice(-2) ;
                           
                     plage							= "op=egal&res=jr&dtdeb="+_yeard+"-"+_moisd+"-"+_dayd;
                  
                    break;
                  default:
                        var _date						= $("#datedeb").val();
                        var _tdate						= _date.split("/");
                        plage							= "op=egal&dtdeb="+_tdate[0]+"-"+_tdate[1]+"-"+_tdate[2];
               }
				$("#hvaldate").val(plage);
            
				
            get_alldata_export()
            }); //fin on click du bouton
			
			//debut on change du select box operation
			$("#plage_selecteur").change(function(){
				var selectervalue	=	$("#plage_selecteur").val();
				
				var plage			= "";
				
				var jsnow 		= new Date();
				var jstimezone	= jsnow.getTimezoneOffset();
				
				switch ( selectervalue )
				{
					case "d":
					$(".clddeb").show();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "ds":
					$(".clddeb").show();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "di":
					$(".clddeb").show();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "dd":
					$(".clddeb").show();
					$(".clddfin").show();
					$(".cljour").hide();
					
				  break;
				case "j":
					
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "j1":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "s":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "ss":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "s1":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "m":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "m1":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "y":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").hide();
					
				  break;
				case "jr":
					$(".clddeb").hide();
					$(".clddfin").hide();
					$(".cljour").show();
					
				  break;
				default:
										
					$(".clddeb").show();
					$(".clddfin").hide();
					$(".cljour").hide();
				}
				
				
		   });
		   
         });
			//fin du on change du select box operation
	
