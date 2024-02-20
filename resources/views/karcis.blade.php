<script>
    window.location.replace("/masuk");
</script>

<?php

    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    use Mike42\Escpos\Printer;
    use App\Models\Masuk;
    use App\Models\User;
    use App\Http\Controllers\MasukController;
    use Milon\Barcode\BarcodeServiceProviders;
    use Milon\Barcode\Facades\DNS1DFacade;
    use Milon\Barcode\Facades\DNS2DFacade;


    try {
            $connector = new WindowsPrintConnector("TM-T82");
            $printer = new Printer($connector);

            $title = "TEST PRINTER ANTRIAN";
            $printer->initialize();
            $printer->setFont(Printer::FONT_A);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("\n");

            $printer->initialize();
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->setTextSize(2, 2);
            $printer->text("SMKN 7 SAMARINDA" . "\n");
            $printer->text("\n");
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text(date('d/m/Y H:i:s'). "\n");
            $printer->setLineSpacing(5);
            $printer->text("\n\n\n");

            foreach ($print as $print) {
            
            $printer->selectPrintmode();
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->setBarcodeHeight(60);
            $printer->setBarcodewidth(2);
            $printer->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
            $printer->barcode($print->kode, Printer::BARCODE_CODE39);
            $printer->text("\n\n\n");
            $printer->feed();
            
            }   
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_A);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Jangan Sampai Hilang\n");
            $printer->text("Terima Kasih\n");
            $printer->text("\n");

            $printer->cut();
        
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }

 ?>
