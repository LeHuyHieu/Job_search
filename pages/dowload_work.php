<?php

// Include the PHPWord library
require '../vendor/autoload.php';

// Function to convert HTML to Word and download the file
function convertHtmlToWordAndDownload($htmlContent, $filename) {
    // Create a new PHPWord object
    $phpWord = new \PhpOffice\PhpWord\PhpWord();

    // Get the default section of the Word document
    $section = $phpWord->addSection();

    // Add the HTML content as plain text to the Word document
    $section->addText(htmlspecialchars_decode($htmlContent));

    // Generate the Word document
    $tempFilePath = tempnam(sys_get_temp_dir(), $filename);
    $phpWord->save($tempFilePath, 'HTML');

    // Set the appropriate headers for downloading the file
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Length: " . filesize($tempFilePath));

    // Serve the file for download
    readfile($tempFilePath);

    // Remove the temporary file
    unlink($tempFilePath);
}

// Example usage:
// Assuming you have the HTML content in a variable named $htmlContent and you want to name the file "output.docx"
$htmlContent = '<h1>Hello World!</h1><p>This is an example HTML content converted to Word.</p>';
$filename = 'cv.docx';
convertHtmlToWordAndDownload($htmlContent, $filename);
header('loacation:./candidate/view_resumer.php');
?>