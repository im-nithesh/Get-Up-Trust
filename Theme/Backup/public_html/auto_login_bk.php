<?php

//require( dirname( __FILE__ ) . '/wp-load.php' );
if(!function_exists("sanatizeItem")){
        function sanatizeItem($var, $type)
        {
                if($var == '' || isset($var) == NULL)
                return NULL ;
                $flags = NULL;
                switch($type)
                {
                        case 'url':
                        $filter = FILTER_SANITIZE_URL;
                        break;
        
                        case 'int':
                        $filter = FILTER_SANITIZE_NUMBER_INT;
                        break;

                        case 'pass':
                        $filter = FILTER_UNSAFE_RAW;
                        $flags = null;
                        break ;
        
                        case 'IP':
                        $filter = FILTER_VALIDATE_IP;
                        $flags = FILTER_FLAG_IPV4;
                        break;
        
                        case 'email':
                        $var = substr($var, 0, 254);
                        $filter = FILTER_SANITIZE_EMAIL;
                        break;
        
                        case 'string':
                        $filter = FILTER_SANITIZE_STRING;
                        break;

                        case 'boolean':
                        $filter = FILTER_VALIDATE_BOOLEAN;
                        break;
        
                        default:
                        $filter = FILTER_SANITIZE_STRING;
                        $flags = FILTER_FLAG_NO_ENCODE_QUOTES;
                        break;
                }

        $output = filter_var($var, $filter, $flags);
        $output = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a","="), array('', '', '', '', '', '', '','','',''), $output);
                return($output);
        }
}

function ValidationLoginUrls ($tmpfile,$key) {

        if(empty($tmpfile) || empty($key)){

                echo "<h1>Low Unauthorized Access!!!</h1>";exit;
        }
        $filename = sanatizeItem($tmpfile,'string');
        $tmp_dir = __DIR__;
        $tmp_dir_path = str_replace("public_html","",$tmp_dir);
        $file = $tmp_dir_path."tmp/$filename";
        $key = sanatizeItem($key,'string');
        $garble = trim(file_get_contents($file));
        $authorised_key = "WORDPRESS_SERVER_KEY";
        $getPassword = trim(decrypt($key,$garble));

        if($getPassword != $authorised_key){
                echo "<h1>Unauthorized Access!!!</h1>";exit;
        }
        return true;
}

function _generate_iv()
{
    global $cc_encryption_hash;
    srand((double) microtime() * 1000000);
    $iv = md5(strrev(substr($cc_encryption_hash, 13)) . substr($cc_encryption_hash, 0, 13));
    $iv .= rand(0, getrandmax()); 
    $iv .= serialize(array( "key" => md5(md5($cc_encryption_hash)) . md5($cc_encryption_hash) ));
    return _hash($iv);
}

function _hash($string)
{
    if( function_exists("sha1") )
    {
        $hash = sha1($string);
    }
    else
    {
        $hash = md5($string);
    }

    $out = "";
    $c = 0;
    while( $c < strlen($hash) )
    {
        $out .= chr(hexdec($hash[$c] . $hash[$c + 1]));
        $c += 2;
    }
    return $out;
}

function decrypt($cc_encryption_hash, $string)
{
    $key = md5(md5($cc_encryption_hash)) . md5($cc_encryption_hash);
    $hash_key = _hash($key);
    $hash_length = strlen($hash_key);
    $string = base64_decode($string);
    $tmp_iv = substr($string, 0, $hash_length);
    $string = substr($string, $hash_length, strlen($string) - $hash_length);
    $iv = "";
    $out = "";
    for( $c = 0; $c < $hash_length; $c++ )
    {
        $ivValue = (isset($tmp_iv[$c]) ? $tmp_iv[$c] : "");
        $hashValue = (isset($hash_key[$c]) ? $hash_key[$c] : "");
        $iv .= chr(ord($ivValue) ^ ord($hashValue));
    }
    $key = $iv;
    for( $c = 0; $c < strlen($string); $c++ )
    {
        if( $c != 0 && $c % $hash_length == 0 )
        {
            $key = _hash($key . substr($out, $c - $hash_length, $hash_length));
        }

        $out .= chr(ord($key[$c % $hash_length]) ^ ord($string[$c]));
    }
    return $out;
}

function autoLoginUser($user_id,$tmpfile,$ovikey){

require( dirname( __FILE__ ) . '/wp-load.php' );
	
	ValidationLoginUrls($tmpfile,$ovikey);

	$user = get_user_by( 'id', $user_id );
	if( $user ) {
		wp_set_current_user( $user_id, $user->user_login );
		wp_set_auth_cookie( $user_id );
		do_action( 'wp_login', $user->user_login, $user);
		wp_redirect( home_url('wp-admin') );
	}
}

$tmpfile=sanatizeItem($_GET['automod'],'string');
$key=sanatizeItem($_GET['vailjs'],'string');

autoLoginUser('1',$tmpfile,$key);
?>
