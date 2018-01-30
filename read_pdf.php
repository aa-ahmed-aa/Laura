<?php
require_once __DIR__ . "/vendor/autoload.php";
use Smalot\PdfParser\Parser;

$parser = new Parser();
$pdf    = $parser->parseFile('Ahmedkhaled.pdf');
 
// Retrieve all pages from the pdf file.
$pages  = $pdf->getPages();
 
// Loop over each page to extract text.
foreach ($pages as $i => $page) {
    echo $page->getText();
}
 
?>