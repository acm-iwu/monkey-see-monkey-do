<?php
$allowedExts = array("gif", "jpeg", "jpg", "png", "txt");
$fileTypes = array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/x-png", "text/plain", "image/png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$type = $_FILES["file"]["type"];

if (in_array($type, $fileTypes)
&& ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    


    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      echo "File Uploded Succesfully";
      }
    }
  }
else
  {
  echo "Invalid file!!!!!!!!!!!!!!!!!! Have a nice day.";
  }
?>