<?php
require('tfpdf.php');
class CalPDF extends TFPDF {
  
    public function CreateTable($data,$alum)
    {
         $header = array(
             array('Materia',90), 
             array('1º parcial',23), 
             array('2º parcial',23),
             array('3º parcial',23),
             array('Ordinario',21),
             array('1º Extra',21),
             array('2º Extra',21),
             array('Especial',21),
             array('Promedio',21),
          );
         $this->AddFont('A','','Calibri.ttf',true);
        $this->SetFont('A','',20);
        $this->setTitle("Calificaciones",true);
        $this->SetFillColor(255);
        $this->SetTextColor(0);
         $this->Ln(30);
        $this->SetX(76);
       
        $this->Image('logo.jpg',20,10,-180);
        $this->write(5,'Calificaciones del alumno: '.$alum['Nombre']." ".$alum['ApellidoPaterno']." ".$alum['ApellidoMaterno']);
         $this->Ln(20);
         $this->SetX(20);

         $this->AddFont('A','','Calibri.ttf',true);
        $this->SetFont('A','',14);
        $this->write(5,'Matricula: '.$alum['Matricula']."   ");
         $this->write(5,'Semestre: '.$alum['Semestre']."   ");
          $this->write(5,'Grupo: '.$alum['Grupo']."   ");
           $this->write(5,'Licenciatura: '.$alum['Carrera']);
        $this->Ln(20);
          $this->SetX(20);
        $this->SetFillColor(0);
        $this->SetTextColor(255);

        foreach ($header as $col) {
            //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
            $this->Cell($col[1], 10, $col[0], 1, 0, 'L', true);
        }
        $this->Ln();
        $this->SetX(20);
        // Data
        $this->SetFillColor(255);
        $this->SetTextColor(0);
       
        foreach ($data as $row)
        {
            $i = 0;
            foreach ($row as $field) {
                $this->Cell($header[$i][1], 6, $field, 1, 0, 'L', true);
                $i++;
            }
            $this->Ln();
            $this->SetX(20);
        }
    }
}






?>