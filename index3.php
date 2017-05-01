<?php 
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'uploadimg2.php'; 
$max_file_size = 300*1024;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd"> 
<html lang="en"> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
        <link rel="stylesheet" type="text/css" href="stylesheet.css"> 
        <title>Upload form</title> 
    </head> 
    <body> 
    <form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post"> 
        <h1> 
            Upload form 
        </h1> 
         
        <p> 
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"> 
        </p> 
         
        <p> 
            <label for="file">File to upload:</label> 
            <input id="file" type="file" name="file"> 
        </p> 
                 
        <p> 
            <label for="submit">Press to...</label> 
            <input id="submit" type="submit" name="submit" value="Upload me!"> 
        </p> 
    </form> 
    </body> 
</html> 