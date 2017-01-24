<?php
include("../conexion/conexion.php");



$busqueda = new conexion; 

//    if 
//     (isset($_POST['marca'])&&($_POST['smarca'])&&($_POST['transmicion'])&&($_POST['nplaca'])&&
//				($_POST['nmotor'])&&($_POST['nserie'])&&($_POST['fad'])&&($_POST['neconomico'])&&
//						($_POST['ee'])&&($_POST['vee'])&&($_POST['fact'])&&($_POST['tc'])&&
//						($_POST['otros'])&&($_POST['observaciones']))
//		{

						$marca =$_POST['marca'];
						$submarca =$_POST['smarca'];
						$transmision =$_POST['transmicion'];
						$numplaca =$_POST['nplaca'];
						$nummotor =$_POST['nmotor'];
						$numserie =$_POST['nserie'];
						$funcion =$_POST['fad'];
						$numeconomico =$_POST['neconomico'];
						$equipoespecial =$_POST['ee'];
						$valorequipoespecial =$_POST['vee'];
						$cfact =$_POST['fact'];
						$ctic =$_POST['tc'];
						$otros =$_POST['otros'];
						$observaciones =$_POST['observaciones'];
				
				//,	NumSerie='".$numserie."'	

				$query="UPDATE aseguramiento set  Marca ='".$marca."', Submarca = '".$submarca."',
				Transmision = '".$transmision."',NumPlaca = '".$numplaca."',NumMotor='".$nummotor."',
				Funcion='".$funcion."',NumEconomico= '".$numeconomico."',
				EquipoEspecial='".$equipoespecial."',ValorEquipoEspecial='".$valorequipoespecial."',
				CFACT='".$cfact."',CTIC='".$ctic."',Otros='".$otros."',
				Observaciones ='".$observaciones."' WHERE  NumSerie ='".$numserie."'";
				

				$consulta = mysql_query($query,$busqueda->conexion);
				if ($consulta==1 )
					{ echo "Se han modifacado los datos  " ;}
				else
					{ echo "Fallaron los datos ";} 

 // }
//else { echo "Error de parametrogggs";
//}
				
mysql_close($busqueda->conexion);
//$busqueda->cerrar();
//revisasr los errores al cerrar conexiones 

?>