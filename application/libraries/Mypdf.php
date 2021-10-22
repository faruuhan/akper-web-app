<?php

class Mypdf {
  public function pdfgenerate($html, $filename, $paper, $orientation){
    // instantiate and use the dompdf class
    $dompdf = new Dompdf\Dompdf(array('enable_remote' => true));
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper($paper, $orientation);

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($filename, array('Attachment' => 0));
  }
}