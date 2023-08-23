<script>
    window.location.replace("/keluar");
</script>

<?php
    
    // require __DIR__ . '/vendor/autoload.php';
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
            
            /** RATA TENGAH */
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
            

            // $printer->initialize();
            // $printer->setFont(Printer::FONT_A);
            // $printer->setJustification(Printer::JUSTIFY_CENTER);
            // $printer->text("Nomor Antrian Anda Adalah :\n");
            // $printer->text("\n");
            
            // $printer->initialize();
            // $printer->setJustification(Printer::JUSTIFY_LEFT);
            // $printer->setTextSize(6, 4);
            // $printer->text("P00" .  $print->id . "\n");
            // $printer->text("\n");
            

            // $printer->initialize();
            // $printer->setFont(Printer::FONT_C);
            // $printer->setTextSize(2, 2);
            // $printer->setJustification(Printer::JUSTIFY_LEFT);
            // // {!! DNS1D::getBarcodeHTML("$data->kode", 'C39') !!}
            // // $printer->text(DNS1D::getBarcodeHTML("$print->kode", 'C39') . "\n");
            // $printer->text($print->kode . "\n");
            // $printer->text("\n\n");
            
            // $printer->selectPrintmode();
            // $printer->setJustification(Printer::JUSTIFY_LEFT);
            // $printer->setBarcodeHeight(60);
            // $printer->setBarcodewidth(2);
            // $printer->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
            // $printer->barcode($print->kode, Printer::BARCODE_CODE39);
            // $printer->text("\n\n\n");
            // $printer->feed();
            
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