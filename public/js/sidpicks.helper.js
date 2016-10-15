			//Obtenir le premier jour de la semaine
			function FirstDayOfWeek(sem, an){
			  var debut=new Date()
			  debut.setUTCFullYear(an,0,1);
			  var FirstDayOfYear= debut.getDay()
			  var FirstBitLength=0
			  switch(FirstDayOfYear){
				 case 0: FirstBitLength=FirstDayOfYear+2;
							break;
				 case 1: FirstBitLength=FirstDayOfYear;
							break;
				 case 2: FirstBitLength=FirstDayOfYear+5;
							break;
				 case 3: FirstBitLength=FirstDayOfYear+3;
							break;
				 case 4: FirstBitLength=FirstDayOfYear+1;
							break;
				 case 5: FirstBitLength=FirstDayOfYear-1;
							break;
				 case 6: FirstBitLength=FirstDayOfYear-3;
							break;
				}	
				adddays=(sem-1)*7+FirstBitLength
			  finalDate=new Date()
			  finalDate.setUTCFullYear(an,0,adddays)
			  finalDateEnd=new Date()
			  finalDateEnd.setUTCFullYear(an,0,adddays+6)
			 
			  jdeb	=	finalDate.getDate();
			  mdeb	=	finalDate.getMonth();
			  adeb	=	finalDate.getFullYear();
			  
			  jfin	=	finalDateEnd.getDate();
			  mfin	=	finalDateEnd.getMonth();
			  afin	=	finalDateEnd.getFullYear();
				
			  return (sem==0 || sem>53)?"erreur": adeb+"-"+mdeb+"-"+jdeb+"&&"+afin+"-"+mfin+"-"+jfin;
			}
			//Obtenir le numero de la semaine
			function getWeekNumber() {
				var d = new Date();
				var DoW = d.getDay();
				d.setDate(d.getDate() - (DoW + 6) % 7 + 3); // Nearest Thu
				var ms = d.valueOf(); // GMT
				d.setMonth(0);
				d.setDate(4); // Thu in Week 1
				return Math.round((ms - d.valueOf()) / (7 * 864e5)) + 1;
			}