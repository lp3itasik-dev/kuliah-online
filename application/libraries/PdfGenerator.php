<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./template/global_assets/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

class PdfGenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "landscape")
  {
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}