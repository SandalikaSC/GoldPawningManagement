<?php

    require_once APPROOT . "/helpers/vendor/autoload.php";

    use Dompdf\Dompdf;
    use Dompdf\Options;    

    $html = $this->view('/PawnOfficer/invoice', $data);    

    $dompdf = new Dompdf();

    $dompdf->setPaper("A4", "portrait");
    $dompdf->loadHtmlFile($html, $data);

    $dompdf->render();

    $dompdf->addInfo("Title", "Payment Invoice");

    $dompdf->stream("invoice.pdf", ["Attachment" => 0]);
?>
   



