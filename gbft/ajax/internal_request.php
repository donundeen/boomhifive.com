<?

session_start();
if(!is_array($_SESSION['grid'])){
	$_SESSION['grid'] = array();
	$i = 0;
	while($i < $width){
		$j = 0;
		while($j < $height){
			$_SESSION['grid'][$i][$j] = ".";		
			$j++;
		}
		$i++;
	}
}
$colors = array("plum","lightgreen","skyblue","pink");
echo rand(0,$width-1).rand(0,$height-1);
echo "\n";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "\n";
echo $colors[rand(0,count($colors) - 1 )];

?>