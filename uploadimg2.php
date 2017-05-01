<?php
session_start();
require('databse_link.php');
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . '/uploads2/'; 
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'index3.php'; 
$uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload2.php'; 
$fieldname = 'file'; 
$errors = array(1 => 'php.ini max file size exceeded', 
                2 => 'html form max file size exceeded', 
                3 => 'file upload was only partial', 
                4 => 'no file was attached'); 
isset($_POST['submit']) 
    or error('the upload form is needed', $uploadForm); 
($_FILES[$fieldname]['error'] == 0) 
    or error($errors[$_FILES[$fieldname]['error']], $uploadForm); 
@is_uploaded_file($_FILES[$fieldname]['tmp_name']) 
    or error('not an HTTP upload', $uploadForm); 
@getimagesize($_FILES[$fieldname]['tmp_name']) 
    or error('only image uploads are allowed', $uploadForm); 
$now = time(); 
while(file_exists($uploadFilename = $uploadsDirectory.$now.'-'.$_FILES[$fieldname]['name'])) 
{ 
    $now++; 
} 
move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename.$fileext) 
    or error('receiving directory insuffiecient permission', $uploadForm); 
header('Location: ' . $uploadSuccess); 
function error($error, $location, $seconds = 5) 
{ 
    header("Refresh: $seconds; URL=\"$location\""); 
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'."\n". 
    '"http://www.w3.org/TR/html4/strict.dtd">'."\n\n". 
    '<html lang="en">'."\n". 
    '    <head>'."\n". 
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'."\n\n". 
    '        <link rel="stylesheet" type="text/css" href="stylesheet.css">'."\n\n". 
    '    <title>Upload error</title>'."\n\n". 
    '    </head>'."\n\n". 
    '    <body>'."\n\n". 
    '    <div id="Upload">'."\n\n". 
    '        <h1>Upload failure</h1>'."\n\n". 
    '        <p>An error has occured: '."\n\n". 
    '        <span class="red">' . $error . '...</span>'."\n\n". 
    '         The upload form is reloading</p>'."\n\n". 
    '     </div>'."\n\n". 
    '</html>'; 
    exit; 
}
        $name=$_SESSION['name'];
        $len=strlen("C:/xampp/htdocs/3/tweet/uploads2/");
        $strup=substr($uploadFilename, $len);
        $sql="UPDATE `login` SET `image` = '$strup' WHERE `username` = \"$name\"";
        $result=mysqli_query($conn,$sql);

?> 