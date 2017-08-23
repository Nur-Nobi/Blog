<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php 
	$pageid = mysqli_real_escape_string($db->link, $_GET['pageid']);
	if(!isset($pageid) || $pageid == NULL){
		header("Location:index.php");
	}else{
		$id = $pageid;
	}
?>
<style>
	.actiondel{margin-left:10px;}
	.actiondel a{background:#f0f0f0 none repeat scroll 0 0;border:1px solid #ddd; color:#444; cursor:pointer;
	font-size:20px; font-width:normal; padding:4px 10px;}
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Page</h2>
		
		<?php 
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$name = mysqli_real_escape_string($db->link, $_POST['name']);
				$body = mysqli_real_escape_string($db->link, $_POST['body']);
				
				if($name == "" || $body == ""){
				
					echo "<span class = 'error'>field must not be empty...</span>";	
					
				}else{
						$query = "UPDATE tbl_page
									SET
									name = '$name',
									body = '$body'
									WHERE id='$id' ";
							$updated_rows = $db->update($query);
							
						if($updated_rows){
							echo "<span class='success'>Page updated successfully.</span>";
						}else{
							echo  "<span class='error'>page not updated</span>";
						} 
				}
				
			}
			
		?>
                <div class="block"> 
			<?php
				$pagequery = "select * from tbl_page  where id='$id'";
				$pagedetail = $db->select($pagequery);
				if($pagedetail){
					while($result = $pagedetail->fetch_assoc()){
								
			?>
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" 
								class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
									<?php echo $result['body']; ?>
								</textarea>
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="UPDATE" />
								<span class="actiondel"><a onclick="return confirm('Are You Sure To Delete');"
								href="deletepage.php?delpage=<?php echo $result['id']; ?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
			<?php } } ?>
                </div>
            </div>
        </div>
		
	<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
	
<?php include "inc/footer.php"; ?> 