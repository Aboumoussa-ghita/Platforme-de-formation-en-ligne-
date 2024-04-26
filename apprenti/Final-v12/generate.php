<?php
if (isset($_GET['id_formation'])) {
    $id_formation = $_GET['id_formation'];
} else {
    $id_formation = 0;
}
if (isset($_GET['score'])) {
    $score = $_GET['score'];
} else {
    $score = 0;
}


if (isset($_GET['id_chap'])) {
    $idChapitre = $_GET['id_chap'];
} else {
    $idChapitre = 0;
}




?>
<?php include('connexion.php'); 

$FN = $_POST["FN"];
$FR = $_POST["FR"];


require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;




/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */
$dompdf->setPaper("A4", "landscape");

/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template.html");

$html = str_replace(["{{ FN }}", "{{ FR }}"],[$FN, $FR], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "Certification"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("'".$FR."'.pdf", ["Attachment" => 0]);

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);