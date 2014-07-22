<?php


/* JSON-Headers */
function jsonheaders() {
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT"); 
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Pragma: no-cache");
	header("Content-type: application/json");
}
/* JSON echo response */
function response($json) {
	jsonheaders();
	echo json_encode($json);
	exit;
}


if(isset($_POST['url']['path'])) {
    
    include('pattern.php');
    $pathname = explode("/", $_POST['url']['path']);
    $pathname = explode("_", $pathname[count($pathname)-1]);
    $pathname = implode(" ", $pathname);
    if(array_key_exists($pathname, $pattern)) {
        
        response( array("url"=>$_POST['url']['path'], "pattern"=>$pattern[$pathname]) );
        
    }
    
}



//response( array("url"=>"/x", "html"=>"HTMLText") );

