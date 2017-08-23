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
	$delpage = mysqli_real_escape_string($db->link, $_GET['delpage']);
	if(!isset($delpage) || $delpage == NULL){
		header("Location:index.php");
	}else{
		$pageid = $delpage;
		
		$delquery = "delete from  tbl_page where id='$pageid'";
		$deldata = $db->delete($delquery);
		if($deldata){
			echo "<script>alert('Page Deleted Successfully..');</script>";
			echo "<script>window.location = 'index.php';</script>";
					
		}else{
			echo "<script>alert('Page Not Deleted ..');</script>";
			echo "<script>window.location = 'index.php';</script>";
		}
	}
?>