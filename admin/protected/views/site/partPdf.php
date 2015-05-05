<?php
    ob_start();
    echo $this->renderPartial('htmlpage'); 
    $content = ob_get_clean();

    Yii::import('application.extensions.tcpdf.HTML2PDF');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content,false);
        $html2pdf->Output("pdfdemo.pdf");
        
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }