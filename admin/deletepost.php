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
	$delpostid = mysqli_real_escape_string($db->link, $_GET['delpostid']);
	if(!isset($delpostid) || $delpostid == NULL){
		header("Location:postlist.php");
	}else{
		$postid = $delpostid;
		$query = "SELECT * from tbl_post WHERE id='$postid'";
		$getdata = $db->select($query);
		if($getdata){
			while($delimg = $getdata->fetch_assoc()){
				$dellink = $delimg['image'];
				unlink($dellink);
			}
		}
		
		$delquery = "delete from  tbl_post where id='$postid'";
		$deldata = $db->delete($delquery);
		if($deldata){
			echo "<script>alert('Data Deleted Successfully..');</script>";
			echo "<script>window.location = 'postlist.php';</script>";
					
		}else{
			echo "<script>alert('Data Not Deleted ..');</script>";
			echo "<script>window.location = 'postlist.php';</script>";
		}
	}
?>