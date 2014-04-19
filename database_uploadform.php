<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Monkey Database</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
  	
	

    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> !-->
          <a class="navbar-brand" href="index.html">Monkey Database</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.html">Home</a></li>
            <li class="active"><a href="database_uploadform.php">Upload</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div> 
    </div>

    <div class="container">

	 
	<!-- HERE IS THE monkey_uploadform HTML THING !-->
	<form class="form-horizontal" role="form" action="?" method="post"
	enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="file" class="col-sm-2 control-label">File</label>
		    <div div class=" col-sm-10"> 
			 <input type="file" name="file" id="file"> 
		    </div>  
		  </div>
		  <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
      		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
    		</div>
  		</div>
	</form>

	<?php
	
	if(isset($_POST['submit']))
	{
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
   		   move_uploaded_file($_FILES["file"]["tmp_name"],
   		   "upload/database.txt");
   		   //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
   		   echo "<br> Your database has been successflly uploded";
  		  }
 		 }
		else
 		 {
 		 echo "Invalid file. Have a nice day!";
 		 }
 	 } 
	?>

      <!--<div class="starter-template">
		<form class="form-horizontal" role="form">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Sex</label>
		    <div class="col-sm-10"> 
			  <div class="btn-group">
			    <button type="button" class="btn btn-default">Male</button>
			    <button type="button" class="btn btn-default">Female</button>
		      </div>
		    </div>  
		  </div>
		  <div class="form-group">
		    <label for="leftEar" class="col-sm-2 control-label">Left Ear</label>
		    <div class="col-sm-10"> 
			  <div class="btn-group">
  			    <button type="button" class="btn btn-default">0</button>
  			    <button type="button" class="btn btn-default">0</button>
  			    <button type="button" class="btn btn-default">0</button>
		      </div>
		      <div class="btn-group">
  			    <button type="button" class="btn btn-default">Don't Know</button>
  			  </div>
  			</div>
		  </div>
		  <div class="form-group">
		    <label for="rightEar" class="col-sm-2 control-label">Right Ear</label>
		    <div class="col-sm-10"> 
			  <div class="btn-group">
			    <button type="button" class="btn btn-default">0</button>
			    <button type="button" class="btn btn-default">0</button>
			    <button type="button" class="btn btn-default">0</button>
			  </div>
		      <div class="btn-group">
  			    <button type="button" class="btn btn-default">Don't Know</button>
  			  </div>
  			</div>  
		  </div>
		  <div class="form-group">
		    <label for="rightEar" class="col-sm-2 control-label">Group</label>
			<div class="col-sm-10">  
			  <select class="form-control">
			  </select>
		    </div>
		  </div>
		</form>
		<table class="table table-striped">
		  <thead>
		    <tr>
		  	  <th>ID</th>
		  	  <th>Sex</th>
		  	  <th>Birth Year</th>
		  	  <th>Ear Notches</th>
		  	  <th>Notes</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<tr>
		  	</tr>
		  </tbody>
		</table> !-->
      </div> 

	<!-- NOT SURE WHERE TO PASTE THE PHP UPLOAD FORM. GUESS WE'LL TRY RIGHT HERE! !-->
	
	
	
	



    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
