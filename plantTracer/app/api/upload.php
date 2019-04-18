<?php
header("Access-Control-Allow-Origin: *");
    
$db = new mysqli( '162.144.115.100', 'oasznymy_planttr', 'Arabidopsis2!', "oasznymy_planttracer_app");	
	
	$tmp_name = $_FILES['file']["tmp_name"][0];
	$target_path = '../app/api/uploads/' . urldecode($_FILES['file']['name']);
        
	$data = array();
	$data['files'] = $_FILES['file']["tmp_name"];
	$data['video'] = $_FILES['file']['name'];
	$data['upload'] = move_uploaded_file($_FILES['file']["tmp_name"], $target_path);
	$data['tmp'] = $tmp_name;
	$data['target'] = $target_path;
	$data['uploaded'] = is_uploaded_file($data['files']);

	$res = array($_FILES, urldecode($_FILES['file']['name']));
	$data['response'] = $res;
	
	if($data['upload']){
		$name = explode("_", urldecode($_FILES['file']['name'] ));
		$q = "UPDATE plant_tracing set video = '".urldecode($_FILES['file']['name'])."' WHERE id = ".(int)$name[0];
		$r = $db->query( $q );
        $data['key'] = $name;
        $data['q'] = $q;
        $data['r'] = $r;
	}
	
	echo json_encode( $res );

?>