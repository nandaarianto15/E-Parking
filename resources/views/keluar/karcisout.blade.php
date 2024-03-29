<script>
    window.location.replace("/keluar");
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

            foreach ($print as $print) {
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Plat :" . $print->plat. "\n");
            $printer->setLineSpacing(5);
            $printer->text("\n\n\n");
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Entry :" . $print->created_at . "\n");
            $printer->setLineSpacing(5);
            $printer->text("\n\n\n");
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Exit :" . $print->updated_at . "\n");
            $printer->setLineSpacing(5);
            $printer->text("\n\n\n");
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Duration :" . $print->durasi. "\n");
            $printer->setLineSpacing(5);
            $printer->text("\n\n\n");
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Total :" . $print->harga. "\n");
            $printer->setLineSpacing(5);
            $printer->text("\n\n\n");
            
            }   
            
            $printer->initialize();
            $printer->setFont(Printer::FONT_A);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Terima kasih atas kunjungannya\n");
            $printer->text("Selamat Jalan\n");
            $printer->text("\n");

            $printer->cut();
            
            /* Close printer */
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }

 ?>
