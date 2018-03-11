<!DOCTYPE html>

<html>


<?php
function protect($string){
	$string=trim(strip_tags(addslashes($string)));
	return $string;
}

  ?>


</html>