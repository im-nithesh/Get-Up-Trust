<?php

include('wp-config.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = file_get_contents("php://input");
$themeSlugs = json_decode($data, true);

$theme_name=$themeSlugs['theme_name'];
$theme_action=$themeSlugs['action'];
$user_path=$themeSlugs['user_path'];
$theme_default='twentynineteen';

/*$theme_name='Evolution';
$theme_action='status';
$user_path='/home/chezh79/public_html';
$theme_default='twentynineteen';*/

$conn=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!empty($theme_name) && $theme_action == 'activate'){
	$dir=$user_path."/wp-content/themes/".$theme_name;
        if (!is_dir($dir)){ 
        	echo "\nDirectory does not exist."; exit;
        }else{
		$sql_theme="UPDATE `".$table_prefix."options` SET `option_value` = '".$theme_name."' WHERE `".$table_prefix."options`.`option_id` = 40";
		$sql_style_sheet="UPDATE `".$table_prefix."options` SET `option_value` = '".$theme_name."' WHERE `".$table_prefix."options`.`option_id` = 41";

		$row_theme=mysqli_query($conn, $sql_theme);
		$row_style_sheet=mysqli_query($conn, $sql_style_sheet);

		if($row_theme && $row_style_sheet){
			echo "Theme activativated successfully.";
		}
	}
}else if(!empty($theme_name) && $theme_action == 'deactivate'){
        $sql_theme="UPDATE `".$table_prefix."options` SET `option_value` = '".$theme_default."' WHERE `".$table_prefix."options`.`option_id` = 40";
        $sql_style_sheet="UPDATE `".$table_prefix."options` SET `option_value` = '".$theme_default."' WHERE `".$table_prefix."options`.`option_id` = 41";

        $row_theme=mysqli_query($conn, $sql_theme);
        $row_style_sheet=mysqli_query($conn, $sql_style_sheet);

        if($row_theme && $row_style_sheet){
                echo "Theme deactivativated successfully.";
        }
}else if(!empty($theme_name) && $theme_action == 'delete'){
	$sql="SELECT * FROM `wp_options` WHERE `option_value` = '".$theme_name."'";
        $row=mysqli_query($conn, $sql);

        if(mysqli_num_rows($row) == 0){
	        $dir=$user_path."/wp-content/themes/".$theme_name;
        	if (!is_dir($dir)){
			echo "Directory does not exist."; exit;
        	}else{
			shell_exec("rm -rfv $user_path/wp-content/themes/$theme_name");
			echo "Theme uninstalled successfully.";
		}
        }else {
		$message = "Theme is in active state";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}else if($theme_action == 'status'){
	$sql="SELECT `option_value` FROM `wp_options` WHERE option_id='40'";
        $row=mysqli_query($conn, $sql);

	$active_theme=mysqli_fetch_assoc($row);
echo $active_theme['option_value'];
	return $active_theme['option_value'];	
}

?>
