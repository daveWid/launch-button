<?php

$response = array(
	'success' => true,
	'body' => ""
);

// Grab the phing deploy output.
$file = realpath("..").DIRECTORY_SEPARATOR."build.xml";

if ( ! is_file($file))
{
	$response['success'] = false;
	$response['body'] = "&#10006; build.xml not found.";
}
else
{
	$command = "phing -f {$file} deploy";
	$output = array();
	$return = null;

	exec($command, $output, $return);

	// Strip out the color codes from the console
	$cleaned = preg_replace("/\x1B\[([0-9]{1,2}(;[0-9]{1,2})?)?[m|K]/", "", trim(implode("\n", $output)));

	$matches = array();
	preg_match_all("/\[echo\] [^\n]*/", $cleaned, $matches);

	$strip_echo = function($line){
		return str_replace("[echo] ", "", $line);
	};

	$response['body'] = "&#10003; ".implode("<br />", array_map($strip_echo, $matches[0]));
}

header("Content-Type: application/json");
echo json_encode($response);
