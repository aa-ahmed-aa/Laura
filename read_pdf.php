<?php
require_once __DIR__ . "/vendor/autoload.php";
use Smalot\PdfParser\Parser;

$file_name = $_GET['file_name'];

$parser = new Parser();
$pdf    = $parser->parseFile($file_name);
 
// Retrieve all pages from the pdf file.
$pages  = $pdf->getPages();
 
 $content = '';
// Loop over each page to extract text.
foreach ($pages as $i => $page) {
    $content .= $page->getText();
}
 	
die($content);
?>