<?php
 define ("MAX_SIZE","1000"); 

 $errors=0;

 if(isset($_POST['Submit'])) 
 {
    $image=$_FILES['image']['name'];
    $file=$_FILES['image'];
    if ($image) {
        $filename = stripslashes($_FILES['image']['name']);
       if((($file['type'] == 'image/gif') || ($file['type'] == 'image/jpeg') ||
        ($file['type'] == 'image/pjpeg') || ($file['type'] == 'image/png')) &&
		($file['size'] > 0) && ($file['size'] <= MAXFILESIZE)){
            echo '<h1>Unknown extension!</h1>';
            $errors=1;
        }
    	else
        {
            $size=$file['size'];
            if ($size > MAX_SIZE*1024)
            {
                echo '<h1>You have exceeded the size limit!</h1>';
                $errors=1;
            }
  
            else{
	            $temp=resizeImage($_FILES['image']['tmp_name'],200,200);
        	}
        }
    }
  
    else
    {
        echo "<h1>Select Image File</h1>";
        $errors=1;
    }
}
  
//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
    echo "<h1>File Uploaded Successfully! Try again!</h1>";
 }
  
   
   
function resizeImage($imgSrc,$thumbnail_width,$thumbnail_height) { //$imgSrc is a FILE - Returns an image resource.
    //getting the image dimensions  
    list($width_orig, $height_orig) = getimagesize($imgSrc);   
    if($width_orig < $height_orig){
    	echo 'landscape only';
    }
}
 ?>
  
 <!--next comes the form, you must set the enctype to "multipart/frm-data" and use an input type "file" -->
 <form name="newad" method="post" enctype="multipart/form-data"  action="">
 <table>
    <tr><td><input type="file" name="image"></td></tr>
    <tr><td><input name="Submit" type="submit" value="Upload image"></td></tr>
 </table> 
 </form>