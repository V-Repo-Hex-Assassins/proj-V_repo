<?php
	include ( 'class.pdf2text.php' ) ;

	function  output ( $message )
	   {
		if  ( php_sapi_name ( )  ==  'cli' )
		echo ( $message ) ;
		else
		echo ( nl2br ( $message ) ) ;
	    }

	$file	=  'sample' ; // name of pdf file without .pdf extenstion, sample.pdf
	$pdf	=  new PdfToText ( "$file.pdf" ) ;


	output ( "Extracted file contents :\n" ) ;
	output ( $pdf -> Text ) ;
?>
