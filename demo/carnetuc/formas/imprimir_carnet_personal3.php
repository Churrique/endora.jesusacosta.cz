<!--
//************************
//Version 0.1 18-06-2007 *
//************************-->
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<div>
<table border="0" cellpadding="0" cellspacing="0">
   <tr> 
     <td>
	 <SPAN style="position: absolute;display:block; top:0px;_top:0px; left:0px;_left:0px;"><img src="images/carnet_azul8.jpg" width="302" height="195"></SPAN>
	 <SPAN style="position: absolute;display:block; width:100px; top:65px;_top:65px; left:90px;_left:90px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 18px;"><?php echo $_SESSION['nacionalidad']."-".$_SESSION['cedula'];?></SPAN>
	 <SPAN style="position: absolute;display:block; width:300px; top:100px;_top:100px; left:11px;_left:11px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 14px;"><?php echo $_SESSION['primer_apellido']." ".$_SESSION['ini_segundo_apellido']." ".$_SESSION['primer_nombre']." ".$_SESSION['ini_segundo_nombre'];?></SPAN>
	  <SPAN style="position: absolute;display:block; width:300px; top:118px;_top:118px; left:11px;_left:11px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 12px;"><?php echo $_SESSION['nombre_dependencia'];?></SPAN>
	   <SPAN style="position: absolute;display:block; width:300px; top:110px;_top:110px; left:243px;_left:243px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 8px;">Secretario</SPAN>
	   <SPAN style="position: absolute;display:block; width:300px; top:135px;_top:135px; left:11px;_left:11px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 10px;">VENCE:<?php echo $_SESSION['dia']."-".$_SESSION['mes']."-".$_SESSION['ano'];?></SPAN>
	  <SPAN style="position: absolute;display:block;top:6px;_top:6px; left:232px;_left:232px;">  
	                 <?php
//					  if($_SESSION['cedula']<10000000)
//					  {
//					        $imagen="0".$_SESSION['cedula'].".jpg";
//					  }
//					  else
//					  {
//					 		$imagen=$_SESSION['cedula'].".jpg";
//					  }
                      if($_SESSION['cedula']>=1 && $_SESSION['cedula']<=999) {
                        $imagen="00000".$_SESSION['cedula'].".jpg";
                      }
                      else {
                        if($_SESSION['cedula']>999 && $_SESSION['cedula']<=9999) {
                          $imagen="0000".$_SESSION['cedula'].".jpg";
                        }
                        else {
                          if($_SESSION['cedula']>9999 && $_SESSION['cedula']<=99999) {
                            $imagen="000".$_SESSION['cedula'].".jpg";
                          }
                          else {
                            if($_SESSION['cedula']>99999 && $_SESSION['cedula']<=999999) {
                              $imagen="00".$_SESSION['cedula'].".jpg";
                            }
                            else {
                              if($_SESSION['cedula']>999999 && $_SESSION['cedula']<=9999999) {
                                $imagen="0".$_SESSION['cedula'].".jpg";
                              }
                              else {
                                $imagen=$_SESSION['cedula'].".jpg";
                              }
                            }
                          }
                        }
                      }
					  
                     $ruta='fotos/'.$imagen;
                     if(file_exists($ruta))
				     {
					    
                       echo '<div align="center"><img src="fotos/'.$imagen.'" width="66" heigth="94" /></div>';
				     }
				     else
				     {
					  echo '<SPAN style="position: absolute;display:block; width:50px; top:20px;_top:20px; left:10px;_left:10px;"><div align="center" class="resaltar_rojo2" style="color:#FF0000">SIN FOTO</div></SPAN>';
				     }
			         ?></SPAN>
	  <SPAN style="position: absolute;display:block; top:149px;_top:149px; left:0px;_left:0px;"><img src="codigo_barra.php"></SPAN>
	    <SPAN style="position: absolute; top:  px; left:  px;"><?php
		
		 if($_SESSION[nombre_autoridad]!="")
	     {
		    
			   if($_SESSION[num_caracter_autoridad]<=12)
			   {
			        if($_SESSION[nombre_autoridad]==CHOFER)
					{
					    echo '<SPAN style="position: absolute;display:block; top:164px;_top:164px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_verde_chofer.jpg" width="100" heigth="30" /></div></SPAN>';
			         echo '<SPAN style="position: absolute;display:block; width:100px; top:168px;_top:16px; left:198px;_left:198px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 12px; color:#FFFFFF;"><div align="center">'.$_SESSION[nombre_autoridad].'</div></SPAN>';
					}
			        else
					{
			         echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_vinotinto.jpg" width="100" heigth="30" /></div></SPAN>';
			         echo '<SPAN style="position: absolute;display:block; width:100px; top:165px;_top:16px; left:198px;_left:198px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 12px; color:#FFFFFF;"><div align="center">'.$_SESSION[nombre_autoridad].'</div></SPAN>';                    }
		       }
			   else
			   {
			        echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_vinotinto.jpg" width="100" heigth="30" /></div></SPAN>';
			         echo '<SPAN style="position: absolute;display:block; width:100px; top:159px;_top:159px;left:198px;_left:198px; font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 11px; color:#FFFFFF;"><div align="center">'.$_SESSION[nombre_autoridad].'</div></SPAN>';        
			   }
		  }
		  else
		  {
		
		      	if($_SESSION[nombre_tipo]==ADMINISTRATIVO)
				{
					echo '<SPAN style="position: absolute;display:block; top:164px;_top:164px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_verde_adm.jpg" width="100" heigth="30" /></div></SPAN>';
						
        		}
				else
				{
				   if($_SESSION[nombre_tipo]==DOCENTE)
				   {
					   echo '<SPAN style="position: absolute;display:block; top:164px;_top:164px;left:198px;_left:198px;"><div align="center"><img src="images/fondo_verde_doc.jpg" width="100" heigth="30" /></div></SPAN>';
						
        		   }
				   else
				   {
				      if($_SESSION[nombre_tipo]==OBRERO)
				   	  {
					     echo '<SPAN style="position: absolute;display:block; top:164px;_top:164px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_verde_obr.jpg" width="100" heigth="25" /></div></SPAN>';
						
        		      }
					  else
					  {
					     if($_SESSION[nombre_tipo]=="DOCENTE CONTRATADO")
				   	     {
					         echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_naranja_doc.jpg" width="100" heigth="30" /></div></SPAN>';
							
        		         }
						 else
						 {
						     if($_SESSION[nombre_tipo]=="ADMINISTRATIVO CONTRATADO")
				   	         {
					             echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_naranja_adm.jpg" width="100" heigth="30" /></div></SPAN>';
						     
        		             }
						     else
							 {
							     if($_SESSION[nombre_tipo]=="OBRERO CONTRATADO")
				   	             {
//					                   echo "<SPAN style=\"position: absolute; top: 159 px; left: 198 px;\"><div align=\"center\"><img src=\"images/fondo_naranja_obr.jpg\" width=\"100\" heigth=\"30\" /></div></SPAN>";
					                   echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_naranja_obr.jpg" width="100" heigth="30" /></div></SPAN>';
						   
        		                 }
								 else
								 {
								    if($_SESSION[nombre_tipo]=="DOCENTE JUBILADO")
				   	               {
					                   echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_azul_claro_doc.jpg" width="100" heigth="30" /></div></SPAN>';
						    
						
        		                   }
								   else
								   {
								       if($_SESSION[nombre_tipo]=="ADMINISTRATIVO JUBILADO")
				   	                  {
					                     echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_azul_claro_adm.jpg" width="100" heigth="30" /></div></SPAN>';
						               
						
        		                      }
									  else
									  {
									     if($_SESSION[nombre_tipo]=="OBRERO JUBILADO")
				   	                     {
					                        echo '<SPAN style="position: absolute;display:block; top:159px;_top:159px; left:198px;_left:198px;"><div align="center"><img src="images/fondo_azul_claro_obr.jpg" width="100" heigth="30" /></div></SPAN>';
						                   
						
        		                        }
									  }
								   
								   }
								 
								 }
							 }
						 }
					  } 
				   }
				}
			}	?></SPAN>
	 </td>
   </tr>
</table>
</div>
<!--<div  style="page-break-before: always;">holaaaaaaaaaaa</div>-->


