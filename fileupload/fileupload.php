<?php 
session_start();
include('config.php');
include('common.php');

$username=$_SESSION['username'];
$password=$_SESSION['password'];
 $saveBtn = (isset($_POST['filesub'])) ? realkillstring($_POST["filesub"], 25, '0', '0') : "null";
 if (!isset($_SESSION['username']) || $_SESSION['username'] != true) {
    // Redirect to fileupload.php if not logged in
    header("Location: index.php");
    exit();
}
 if( $saveBtn=="fileupload"){
    $target_dir = "../uploads/";  // Secure directory outside web root
    $allowed_extensions = array("jpg", "png", "pdf", "docx");
    $max_file_size = 5 * 1024 * 1024; // 5MB
    if (is_dir($target_dir)) {
        $file = $_FILES["fileuploadcheck"];
        $filen = $_FILES["fileuploadcheck"]["name"];
        $sql=mysqli_query($conn,"select * from user where username='".$username."'" );
        $row = $sql->fetch_assoc();
        $userid=$row['userid'];
        $file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $msg="Enter a Valid  File Type";
             $sql1 = "INSERT INTO logs (userid, filename,ip,filepath,status) VALUES ('".$userid."', '".$filen."','".$_SERVER['REMOTE_ADDR']."','','.$msg.')";
                $conn->query($sql1);
          
        }
       else if ($file["size"] > $max_file_size) {
        $msg="File size exceeds limit.";
        $sql1 = "INSERT INTO logs (userid, filename,ip,filepath,status) VALUES ('".$userid."', '".$filen."','".$_SERVER['REMOTE_ADDR']."','','.$msg.')";
                $conn->query($sql1);
           
        }
         else{
            $sanitized_filename = sanitize_filename($file["name"]);
         $target_file = $target_dir . $sanitized_filename;
          if (move_uploaded_file($file["tmp_name"], $target_file)) {
           
             
            $conn->begin_transaction();
            try {
                // Perform SQL operations within the transaction
                $sql=mysqli_query($conn,"select * from uploads where userid='".$userid."'" );
                $count=mysqli_num_rows($sql);
                if($count==0){
                    $sql1 = "INSERT INTO uploads (userid, filename,filepath) VALUES ('".$userid."', '".$sanitized_filename."','".$target_file."')";
                $conn->query($sql1);
                }
                else{
                    $sql2 = "UPDATE uploads SET filename = '".$sanitized_filename."',filepath = '".$target_file."'  WHERE userid = '".$userid."'";
                    $conn->query($sql2);
                }
                // Commit the transaction if everything is successful
                 $sql1 = "INSERT INTO logs (userid, filename,ip,filepath,status) VALUES ('".$userid."', '".$sanitized_filename."','".$_SERVER['REMOTE_ADDR']."','".$target_file."','Sucessfully Uploaded')";
                $conn->query($sql1);
                $conn->commit();
                $msg= "File Uploaded successfully";
            } catch (Exception $e) {
                // An error occurred, rollback the transaction
                $conn->rollback();
                $msg=  "Transaction failed: " . $e->getMessage();
            }
        
            // 5. Database operations (store filename, user, etc.)
            // 6. Logging
            // 7. Redirect to success page
        } 
        else {
            die("File upload failed.");
        }
    }
      
    } else {
        $msg= 'Upload Diectory does not exist.';
    }

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file Upload</title>
    <script src="js/fileupload.js"></script>
    <link rel="stylesheet" href="css/fileupload.css" type="text/css">
</head>
<body>
<p class="required" ><a href="logout.php">Logout</a></p>
    <h1>File Upload</h1>

    <p class="required" >Welcome <span><?php echo $username; ?><span></p>
    
    <form method="POST" enctype="multipart/form-data" name="fileupload">
<div class="file-upload">
<?php if(@$msg!=''){
						?>
						<span class="require"><?php echo $msg; ?></span>
                        <br/>
                        <br/>
						<?php
						}?>
    <input type="file" class="file-upload-btn" name="fileuploadcheck"/>

 
  <div class="file-upload-content">
   
    <div class="image-title-wrap">
      <button type="button" onclick="addUpload()" class="add-image">SUBMIT</button>
      <input type="hidden" name="filesub"/>
    </div>
    <!-- <div>To view the last Uploaded files <a onclick="view()" target="_blank" >click here</a></div> -->
  </div>
</div>
</form>


</body>

</html>