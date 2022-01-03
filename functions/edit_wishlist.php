<?php
$page = "home";
require "firstcalls.php";
$this_product['id'] = $_POST['product_id'];
$action = $_POST['product_action'];
if($action == "reduce"){
	if($_SESSION["cart"]){
		$idExists = FALSE;
		foreach($_SESSION["cart"] as $key => $value){
			if($value['id'] == $this_product['id']){
				$idofArray = $key;
				$idExists = TRUE;
			}
		}
		if($idExists == TRUE){
			$_SESSION["cart"][$idofArray]['count']--;
			if($_SESSION["cart"][$idofArray]['counttext'] == 1){
				$_SESSION["cart"][$idofArray]['counttext'] = "item";
			}
			if($_SESSION["cart"][$idofArray]['count'] == 0){
				unset($_SESSION["cart"][$idofArray]);
			}
			echo json_encode($_SESSION['cart']);
		}
	}
	else{
		echo "0";
	}
}
else if($action == "add"){
	if($_SESSION["cart"]){
		$idExists = FALSE;
		foreach($_SESSION["cart"] as $key => $value){
			if($value['id'] == $this_product['id']){
				$idofArray = $key;
				$idExists = TRUE;
			}
		}
		if($idExists == TRUE){
			$_SESSION["cart"][$idofArray]['counttext'] = "items";
			$_SESSION["cart"][$idofArray]['count']++;
			echo json_encode($_SESSION['cart']);
		}
		else{
			echo "0";
		}
	}
	else{
		echo "0";
	}
}
else{
	if($action == "remove"){
		if($_SESSION["cart"]){
			$idExists = FALSE;
			foreach($_SESSION["cart"] as $key => $value){
				if($value['id'] == $this_product['id']){
					$idofArray = $key;
					$idExists = TRUE;
				}
			}
			if($idExists == TRUE){
				unset($_SESSION["cart"][$idofArray]);
				echo json_encode($_SESSION['cart']);
			}
			else{
				echo "0";
			}
		}
		else{
			echo "0";
		}
	}
}
//unset($_SESSION['cart']);
?>