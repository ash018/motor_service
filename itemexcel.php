<?php
	/*
	header('Content-type: application/vnd.ms-excel');
	header('Content-disposition: attachment; filename='.date("D-M-d-Y-G-i", time()).'.xls');
	// Fix for crappy IE bug in download.
	header("Pragma: no-cache");
	header("Expires: 0");
	echo "\xEF\xBB\xBF"; //UTF-8 BOM
	*/
	header("Content-Type: application/vnd.ms-excel");
	header('Content-Disposition: attachment; filename='.date("D-M-d-Y-G-i", time()).'.xls');
	echo "
    <html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">
    <html>
        <head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head>
        <body>
	";
	echo $_REQUEST['datatodisplay'];
	
?>