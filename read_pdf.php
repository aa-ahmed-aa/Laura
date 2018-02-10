<?php
require_once __DIR__ . "/vendor/autoload.php";
use Smalot\PdfParser\Parser;

function uniord($u) {
    // i just copied this function fron the php.net comments, but it should work fine!
    $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
    $k1 = ord(substr($k, 0, 1));
    $k2 = ord(substr($k, 1, 1));
    return $k2 * 256 + $k1;
}
function is_arabic($str) {
    if(mb_detect_encoding($str) !== 'UTF-8') {
        $str = mb_convert_encoding($str,mb_detect_encoding($str),'UTF-8');
    }

    /*
    $str = str_split($str); <- this function is not mb safe, it splits by bytes, not characters. we cannot use it
    $str = preg_split('//u',$str); <- this function woulrd probably work fine but there was a bug reported in some php version so it pslits by bytes and not chars as well
    */
    preg_match_all('/.|\n/u', $str, $matches);
    $chars = $matches[0];
    $arabic_count = 0;
    $latin_count = 0;
    $total_count = 0;
    foreach($chars as $char) {
        //$pos = ord($char); we cant use that, its not binary safe 
        $pos = uniord($char);

        if($pos >= 1536 && $pos <= 1791) {
            $arabic_count++;
        } else if($pos > 123 && $pos < 123) {
            $latin_count++;
        }
        $total_count++;
    }
    if(($arabic_count/$total_count) > 0.6) {
        // 60% arabic chars, its probably arabic
        return true;
    }
    return false;
}

function str_to_array2($string)
{
    $length = mb_strlen($string, "UTF-8");
    $ret = [];

    for ($i = 0; $i < $length; $i += 1) 
    {
	    $ret[] = mb_substr($string, $i, 1, "UTF-8");
	}

    return $ret;
}

function utf8_strrev2($string)
{
    return implode(array_reverse(str_to_array2($string)));
}

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

if(is_arabic($content))
	die(utf8_strrev2($content));
else
	die($content);

?>