<?php 
	include "../lib/session.php"; 
	session::checksession();
?>

<?php include "../config/config.php"; ?>
<?php include "../lib/database.php"; ?>

<?php 
	$db = new database();

?>
<?php 
	$sliderid = mysqli_real_escape_string($db->link, $_GET['sliderid']);
	if(!isset($sliderid) || $sliderid == NULL){
		header("Location:sliderist.php");
	}else{
		$sliderid = $sliderid;
		$query = "SELECT * from tbl_slider WHERE id='$sliderid'";
		$getslider = $db->select($query);
		if($getslider){
			while($delslider = $getslider->fetch_assoc()){
				$dellink = $delslider['image'];
				unlink($dellink);
			}
		}
		
		$delquery = "delete from  tbl_slider where id='$sliderid'";
		$delslider = $db->delete($delquery);
		if($delslider){
			echo "<script>alert('Slider Deleted Successfully..');</script>";
			echo "<script>window.location = 'sliderlist.php';</script>";
					
		}else{
			echo "<script>alert('Slider Not Deleted ..');</script>";
			echo "<script>window.location = 'sliderlist.php';</script>";
		}
	}
?>