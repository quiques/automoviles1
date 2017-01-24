<?php
require('../fpdf/fpdf.php');
 
class PDF extends FPDF
{
    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 10);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(2,156,116);
        $this->SetTextColor(240,255,240);
        $ejeX = 10;
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            
            $this->Cell(42,7, utf8_decode($fila),1, 0 , 'L',true );
            
        }
    }
 
    function datosHorizontal($datos)
    {
        $this->SetXY(10,17);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229,229,229);// Gris tenue de cada fila
        $this->SetTextColor(3,3,3);// Color del texto:negro
        $bandera = false;//para alternar el relleno
        

        //Siendo un array tipo: $datos => $fila
        //Significa que $datos tiene 'nombre' 'apellido' 'matricula'
        //$fila tiene cada valor de los antes mencionados
        foreach($datos as $fila)
        {
            $this->Cell(42,7, utf8_decode($fila['No.']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['Marca']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['Submarca']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['Transmision']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['NumPlaca']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['NumMotor']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['NumSerie']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['Funcion']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['NumEconomico']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['EquipoEspecial']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['ValorEquipoEspecial']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['Fecha']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['CFACT']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['CTIC']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['Otros']),1,0,'L',$bandera);
            $this->Cell(42,7, utf8_decode($fila['Observaciones']),1,0,'L',$bandera);
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }
    }
 
    //Integrando cabecera y datos en un solo método
    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal($datosHorizontal);
    }
 } // FIN Class PDF

  
?>