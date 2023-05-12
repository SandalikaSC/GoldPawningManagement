<?php
// reference the Dompdf namespace
use Dompdf\Dompdf;

require 'vendor/autoload.php';


function printReciept()
{
   
    // $path = URLROOT.'/img/FULLlogo.png';
    // $type = pathinfo($path, PATHINFO_EXTENSION);
    // $data = file_get_contents($path);
    // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
     
    $html = '<html> 
    
    <head>
        
        <link rel="stylesheet" href="'.  URLROOT .'/css/pdfstyle.css"> 
    </head>
    
    <body>
    
        
    <div class="invo-title">
    <h1>Invoice</h1>
</div> 
 
<table class="tbl1">
    <tr>
        <td for="">Payment Id</td>
        <td for="">15</td>
    </tr>
    <tr>
        <td for="">Customer Id</td>
        <td for="">'.$_SESSION['user_id'].'</td>
    </tr>
    <tr>
        <td for="">Customer Name</td>
        <td for="">'.$_SESSION['user_fname']." ".$_SESSION['user_lname'].'</td>
    </tr>
    <tr>
        <td for="">Payment Date</td>
        <td for="">'.date("Y-m-d").'</td>
    </tr>





</table>
<table class="paytbl">

    <th for="">Item</th>
    <th for="">Principle</th>
    <th for="">Interest</th>
    <th class="total-slip">Total</th>
    
        <tr>
            <td for="">'. $_SESSION['payment']['PawnId'].'</td>
            <td for="">'. $_SESSION['payment']['Principle'].'</td>
            <td for="">'. $_SESSION['payment']['interest'].'</td>
            <td class="total-info">'. $_SESSION['payment']['amount'].'</td>

        </tr>

     
</table>

    </body>
    
    </html>';
    // instantiate and use the dompdf class
    $dompdf = new Dompdf(array('enable_remote' => true));
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("Vogue_Payment_Slip.pdf");
}
