<?

include_once("blocked_ip_check.php");

include_once('config.php');

$CITY_NAME = $GLOBALS['city_name'];
$STATE_NAME = $GLOBALS['state_name'];
$SHORT_NAME = $GLOBALS['short_name'];
if(preg_match('/^www/',$_SERVER['HTTP_HOST'])){
	$GOOGLE_MAP_API_KEY = $GLOBALS['GOOGLE_MAP_API_KEY_WWW'];
}else{
	$GOOGLE_MAP_API_KEY = $GLOBALS['GOOGLE_MAP_API_KEY_NO_WWW'];
}
include_once(dirname(__FILE__)."/classes/class.session.php");
$SESSION = new session();

include_once(dirname(__FILE__)."/classes/SmartyTemplate/Smarty.class.php");


include_once(dirname(__FILE__)."/classes/class.process_input.php");

global $SESSION;
global $ERROR_MSGS;
$ERROR_MSGS = array();
		


$smarty = new Smarty();

$smarty->template_dir = dirname(__FILE__)."/templates";
$smarty->compile_dir= dirname(__FILE__)."/templates_c";

// get list of all smarty templates
//$handle = opendir($smarty->template_dir);
$all_files = getTemplates($smarty->template_dir, $smarty->template_dir);

$smarty->assign("ALL_TEMPLATES", $all_files);




$input = new process_input();

$input->set_vars();

if($SESSION->user){
	$input->set_user($SESSION->user);
}

$input->go();



$SESSION = new session();


//echo "<pre>".__LINE__." ".print_r($SESSION->user, true)."</pre>";


$smarty->assign("CITY_NAME", $CITY_NAME);
$smarty->assign("STATE_NAME", $STATE_NAME);
$smarty->assign("SHORT_NAME", $SHORT_NAME);
$smarty->assign("GOOGLE_MAP_API_KEY", $GOOGLE_MAP_API_KEY);
$smarty->assign("PHP_SELF", $PHP_SELF);
$smarty->assign("THIS_URL", $_SERVER['REQUEST_URI']);
$smarty->assign("BROWSER_IS_IE", preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']) ? true : false);
$smarty->assign("TIME_NOW", date("Y-m-d H:i:s"));
$smarty->assign("HOST", $_SERVER['HTTP_HOST']);

$script_path = $_SERVER['PHP_SELF'];
$split = explode('/', $script_path);
array_pop($split);
$script_dir = implode('/', $split);
$smarty->assign("THIS_DIR", $script_dir);



$conn = $SESSION->conn;
unset($SESSION->conn); 
$smarty->assign("session", $SESSION);
$SESSION->conn = $conn;


if($SESSION->user){
	$conn = $SESSION->user->conn;
	unset($SESSION->user->conn);
	$smarty->assign("user", $SESSION->user);	
	$SESSION->user->conn = $conn;
}





function getTemplates($directory, $initial_dir) {
   // Try to open the directory
   if($dir = opendir($directory)) {
       // Create an array for all files found
       $tmp = Array();

       // Add the files
       while($file = readdir($dir)) {
           // Make sure the file exists
           if($file != "." && $file != ".." && $file[0] != '.') {
               // If it's a directiry, list all files within it
               if(is_dir($directory . "/" . $file)) {
                   $tmp2 = getTemplates($directory . "/" . $file, $initial_dir);
                   if(is_array($tmp2)) {
                       $tmp = array_merge($tmp, $tmp2);
                   }
               } else {
               		$filepath = $directory . "/" . $file;
               		$filepath = str_replace($initial_dir.'/', '', $filepath);
               		$tmp[$filepath] = $filepath;
//                   array_push($tmp, $filepath);
               }
           }
       }

       // Finish off the function
       closedir($dir);
       return $tmp;
   }
}


function mysql_real_escape_string($string){
  global $SESSION;
  return mysqli_real_escape_string($SESSION->conn, $string);
}
function mysql_escape_string($string){
  global $SESSION;
  return mysqli_escape_string($SESSION->conn, $string);
}
?>
