<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php 
	$editpostid = mysqli_real_escape_string($db->link, $_GET['editpostid']);
	if(!isset($editpostid) || $editpostid == NULL){
		header("Location:postlist.php");
	}else{
		$postid = $editpostid;
	}
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
		
		<?php 
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$title = mysqli_real_escape_string($db->link, $_POST['title']);
				$description = mysqli_real_escape_string($db->link, $_POST['description']);
				$cat = mysqli_real_escape_string($db->link, $_POST['cat']);
				$body = mysqli_real_escape_string($db->link, $_POST['body']);
				$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
				$author = mysqli_real_escape_string($db->link, $_POST['author']);
				$userid = mysqli_real_escape_string($db->link, $_POST['userid']);
				
				$permited = array('jpg', 'jpeg', 'png', 'gif');
				 $file_name = $_FILES['image']['name'];
				
				 $file_size = $_FILES['image']['size'];
				
				$file_tmp = $_FILES['image']['tmp_name'];
				$div = explode('.', $file_name);
				$file_ext = strtolower(end($div));
				$unique_img = substr(md5(time()),0,10).'.'.$file_ext;
				$uploaded_img = "upload/".$unique_img;
				
				if($title == "" || $description == "" || $cat == "" || $body == "" || 
				$tags == "" || $author == ""){
				
					echo "<span class = 'error'>field must not be empty...</span>";	
					
				}else{
					if(!empty($file_name)){
				
						if($file_size > 1048567){
							echo  "<span class='error'>image size must be 1 MB!</span>";
							
						}elseif(in_array($file_ext, $permited) === false){
							echo  "<span class='error'>you can upload only:-".implode(', ',$permited)."</span>";
							
						}else{
							
							move_uploaded_file($file_tmp, $uploaded_img);
							$query = "UPDATE tbl_post
									SET
									cat = '$cat',
									title = '$title',
									description = '$description',
									body = '$body',
									image = '$uploaded_img',
									author = '$author',
									tags = '$tags',
									userid = '$userid'
									WHERE id='$postid' ";
							$updated_rows = $db->update($query);
							
						if($updated_rows){
							echo "<span class='success'>Post updated successfully.</span>";
						}else{
							echo  "<span class='error'>Post not updated successfully</span>";
						}

					} 
				
				}else{
						$query = "UPDATE tbl_post
									SET
									cat = '$cat',
									title = '$title',
									description = '$description',
									body = '$body',
									author = '$author',
									tags = '$tags',
									userid = '$userid'
									WHERE id='$postid' ";
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
                <div class="block">  

		<?php 
			$query = "select * from tbl_post where id='$postid' order by id desc";
			$getpost = $db->select($query);
			while($postresult = $getpost->fetch_assoc()){
			
		?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $postresult['title']; ?>" 
								class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>Description</label>
                            </td>
                            <td>
                                <input type="text" name="description" 
								value="<?php echo $postresult['description']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat" name="select">
									<option>Select Category</option>
							<?php 
								$query = "select * from tbl_category";
								$category = $db->select($query); 
								if($category){
									while($result = $category->fetch_assoc()){
									
							
							?>
                                    <option
							<?php 
								if($postresult['cat'] == $result['id']){ ?>
									selected = "selected"
							<?php	} ?>
									value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                            <?php } } ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                      
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
								<img src="<?php echo $postresult['image']; ?>" height="80px" width="200px"/><br/>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
									<?php echo $postresult['body']; ?>
								</textarea>
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $postresult['tags']; ?>" class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $postresult['author']; ?>"
								class="medium" />
								<input type="hidden" name="userid" value="<?php echo session::get('userid');?>"
								class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
			<?php } ?>
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