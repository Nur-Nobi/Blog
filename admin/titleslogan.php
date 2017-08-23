<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<style>
	.leftside{float:left; width:70%;}
	.rightside{float:right; width:20%;}
	.rightside img{height:160px; width:170px; }
</style>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
		<?php 
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$title = $fm->validation($_POST['title']);
				$slogan = $fm->validation($_POST['slogan']);
				
				$title = mysqli_real_escape_string($db->link, $title);
				$slogan = mysqli_real_escape_string($db->link, $slogan);
				
				
				$permited = array('png');
				 $file_name = $_FILES['logo']['name'];
				
				 $file_size = $_FILES['logo']['size'];
				
				$file_tmp = $_FILES['logo']['tmp_name'];
				$div = explode('.', $file_name);
				$file_ext = strtolower(end($div));
				$same_img = 'logo'.'.'.$file_ext;
				$uploaded_img = "upload/".$same_img;
				
				if($title == "" || $slogan == ""){
				
					echo "<span class = 'error'>field must not be empty...</span>";	
					
				}else{
					if(!empty($file_name)){
				
						if($file_size > 1048567){
							echo  "<span class='error'>image size must be 1 MB!</span>";
							
						}elseif(in_array($file_ext, $permited) === false){
							echo  "<span class='error'>you can upload only:-".implode(', ',$permited)."</span>";
							
						}else{
							
							move_uploaded_file($file_tmp, $uploaded_img);
							$query = "UPDATE title_slogan
									SET
									title = '$title',
									slogan = '$slogan',
									logo = '$uploaded_img'
									WHERE id='1' ";
							$updated_rows = $db->update($query);
							
						if($updated_rows){
							echo "<span class='success'>Post updated successfully.</span>";
						}else{
							echo  "<span class='error'>Post not updated successfully</span>";
						}

					} 
				
				}else{
						$query = "UPDATE title_slogan
									SET
									title = '$title',
									slogan = '$slogan'
									WHERE id='1' ";
							$updated_rows = $db->update($query);
							
						if($updated_rows){
							echo "<span class='success'>Post updated successfully.</span>";
						}else{
							echo  "<span class='error'>Post not updated successfully</span>";
						}
				}
		 }
		}
			
		?>		
				
		<?php
			$query = "select * from title_slogan where id='1'";
			$blog_title = $db->select($query);
			if($blog_title){
				while($result = $blog_title->fetch_assoc()){
					
		?>	
                <div class="block sloginblock">   
		
			<div class="leftside">
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title']; ?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan']; ?>"  name="slogan" class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo"/>
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
			</div>
			<div class="rightside">
				<img src="<?php echo $result['logo']; ?>" alt="logo"/>
				logo
			</div>
                </div>
			<?php } } ?>
            </div>
        </div>

<?php include "inc/footer.php"; ?>
