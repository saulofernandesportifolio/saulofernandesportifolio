

<!DOCTYPE html>
<html>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style>
<body>
<div id="container">
	<div class="content">
		<form action="index.php" method="post" enctype="multipart/form-data">
        <fieldset>
     	<table width="350" border="0" align="center">
   		<legend>Data Entry
		
		  <tr><td><label>First Name <span class="required">*</span></label></td>
		  <td align="center"><input type="text" name="fname" placeholder="First Name"></br></td></tr>
	
          <tr><td><label>Last Name<span class="required">*</span></label></td>
		  <td align="center"><input type="text" name="lname" placeholder="Last Name"></br></td></tr>
		  
          <tr><td><label>Middle Name<span class="required">*</span></label></td>
		  <td align="center"><input type="text" name="mi" placeholder="Middle Name"></br></td></td>
		  
          <tr><td><label>Age<span class="required">*</span></label></td>
		  <td align="center"><input type="text" name="age" class="input-small" placeholder="Age"></br></td></tr>
		  
          <tr><td><label>Gender</label>
		  <label class="radio"></td>
		  <td align="center"><input type="radio" name="gender" id="optionsRadios1" value="Male" checked>
		  Male</label>
		  <label class="radio">
		  <input type="radio" name="gender" id="optionsRadios2" value="Female" checked>
		  Female</label></br></td></td>
		  
          <tr><td><label>Address<span class="required">*</span></label></td>
		  <td align="center"><input type="text" name="address" class="input-xlarge" placeholder="Address"></br></td></tr>
		  
          <tr><td><label for="file">Upload Picture:</label></td>
		  <td align="right"><input type="file" name="file" id="file"><br></td></tr>  
          <tr><td>&nbsp;  </td></tr>
		<tr><td colspan="2" align="center"><button type="submit" name="submit" class="btn">Submit</button>
		<a href="view_data.php?o=0" class="btn btn-primary">View Data</a></td></tr>
        
<tr><td colspan="2"> &nbsp </td></tr>      
<tr><td colspan="2" align="center">        
<?php
if(isset($_REQUEST['submit']))
{
$con=mysqli_connect("localhost","root","","dataentry");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysql_connect_error();
		  }
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$mname=$_POST['mi'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$file=$_FILES["file"]["name"];
		$size= $_FILES["file"]["size"];
       
if( empty($lname) || empty($mname) || empty($age) || empty($address) || empty($file))
{
	echo "<label class='err'>All field is required</label>";
}
	elseif(!is_numeric($age))
	{
	echo "<label class='err'>Age must be numeric</label>";
	}
	elseif($size >40000)
	{
		echo "<label class='err'> Image size must not greater than 40kb </label>";
	}
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 40000)
		&& in_array($extension, $allowedExts)) 
		{
		  if ($_FILES["file"]["error"] > 0) 
		  {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		  } 
		  
				if (file_exists("upload/" . $_FILES["file"]["name"])) 
				{
				  echo $_FILES["file"]["name"] . "Image upload already exist. ";
    			} 
				else
				{
				  move_uploaded_file($_FILES["file"]["tmp_name"],
				  "upload/" . $_FILES["file"]["name"]);
				  mysqli_query($con,"INSERT INTO data (fname, lname, mname, age, gender, address, filename)
					VALUES ('$fname', '$lname','$mname','$age','$gender', '$address', '$file')");
				echo " <font color='green' size=4>Data Entered Successfully Saved!</font>
";
    			}

		}
	mysqli_close($con);
}
?>
</td></tr>
        </legend>
        </table>
        </fieldset>
		</form>
    </div>
  <div class="footer"> Copyright © sourcecodester.com</div>
</div>
</body>
</html>
