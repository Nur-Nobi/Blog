<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php 
	$msgid = mysqli_real_escape_string($db->link, $_GET['msgid']);
	if(!isset($msgid) || $msgid == NULL){
		header("Location:inbox.php");
	}else{
		$id = $msgid;
	}
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View message</h2>
		
		<?php 
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$to = $fm->validation($_POST['toemail']);
				$from = $fm->validation($_POST['fromemail']);
				$subject = $fm->validation($_POST['subject']);
				$message = $fm->validation($_POST['message']);
				$sendmail = mail($to, $subject, $message, $from);
				if($sendmail){
					echo "<span class='success'>message sent successfully.</span>";
				}else{
					echo "<span class='error'>something went wrong..</span>";
				}
			}
			
		?>
                <div class="block">               
                <form action="" method="post">
				 <?php
						$query = "select * from tbl_contact where id='$id'";
						$msg = $db->select($query);
						if($msg){
							while($result = $msg->fetch_assoc()){
				?>
                    <table class="form">
						
						<tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name="toemail" value="<?php echo $result['email']; ?>"
								class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" placeholder="enter your mail address"
								class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                 <input type="text" name="subject" placeholder="enter your mail subject"
								class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message">

								</textarea>
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                            </td>
                        </tr>
                    </table>
				<?php } } ?>
                    </form>
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