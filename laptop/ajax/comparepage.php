<?php
session_start();
include("../../admin/config/dbcon.php");

if(isset($_POST["singleRemove"])){
   $value = $_POST["value"];
   if(isset($_SESSION['laptop_compare'])){
      unset($_SESSION['laptop_compare'][$value]);
   }
   $_SESSION['laptop_compare'] = array_values($_SESSION['laptop_compare']);
   

}
if(isset($_POST["compare"])){
	if(isset($_SESSION['laptop_compare'])){
		if(count($_SESSION['laptop_compare'])!=3){
		   if (in_array($_POST["id"], $_SESSION['laptop_compare'], TRUE)){
		   }
		   else{
			  $_SESSION['laptop_compare'][]= $_POST["id"];
		   }
		}
  
  }
	else{
	 $_SESSION['laptop_compare'][]= $_POST["id"];
  }
  }


?>
<?php 
$title='';
if(isset($_SESSION['laptop_compare'])){
	$list = $_SESSION['laptop_compare'];
	if (array_key_exists(0, $list)){
		$l0=$list[0];
		$query = "SELECT image,name FROM laptop WHERE id='$l0'";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
			 $title.=$row['name'];
			}
		}
	}
	if (array_key_exists(1, $list)){
		$l1=$list[1];
		$query = "SELECT image,name FROM laptop WHERE id='$l1'";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0){
				 while($row = mysqli_fetch_array($result)){
				  $title.=' vs '.$row['name'];
			}
		}
	}
	if (array_key_exists(2, $list)){
		$l2=$list[2];
		$query = "SELECT image,name FROM laptop WHERE id='$l2'";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0){
				 while($row = mysqli_fetch_array($result)){
				  $title.=' vs '.$row['name'];
			}
		}
	}
}
$title = strtolower(preg_replace('/_/', '-', preg_replace('/ /', '-', $title)));

$output = array(
'title'		=>	$title
);
echo json_encode($output);


	?>
	