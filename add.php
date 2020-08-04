<!DOCTYPE html>
<html>
<head>
	<title>Add Students</title>
	<link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h2>Add Students</h2>
		</div>

        <a href="show.php">Trở về</a> <br/> <br/>

		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" id="form" class="form">
            <div class="form-control">
				<label for="username">Mã SV:</label>
				<input type="text" name="maSV" placeholder="CT/AT******">
			</div>

            <div class="form-control">
                <label for="username">Tên SV:</label>
                <input type="text" name="tenSV" placeholder="name">
            </div>

            <div class="form-control">
                <label for="username">Ngày sinh:</label>
                <input type="date" name="ngaySinh" placeholder="**/**/****">
            </div>

            <div class="form-control">
                <label for="username">Gender</label>
                <input type="text" placeholder="nam/nữ" name="gioiTinh" />
            </div>

            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" placeholder="a@gmail.com" name="email" />
            </div>

			<div class="form-control">
    			<label for="username">Phone</label>
    			<input type="tel" placeholder="xxxxxxxxxx" name="phone" />
    		</div>

    		<div class="form-control">
    			<label for="username">Password</label>
    			<input type="passWord" placeholder="Password" name="passWord"/>
    		</div>
			

			<button type="submit" name="Submit1">Submit</button>	
		</form>
	</div>
</body>
<!-- Hrp8a7kbJbTdpYGK -->
</html>
<?php 
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sinhvien";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if($conn -> connect_error){
  die("Connection failed:".$conn->connect_error);
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Submit1"])){
        if(isset($_POST["maSV"])){
            $maSV = $_POST['maSV'];
        }
        if(isset($_POST["tenSV"])){
            $tenSV = $_POST['tenSV'];
        }
        if(isset($_POST["ngaySinh"])){
            $ngaySinh = $_POST['ngaySinh'];
        }
        if(isset($_POST["gioiTinh"])){
            $gioiTinh = $_POST['gioiTinh'];
        }
        if(isset($_POST["email"])){
            $email = $_POST['email'];
        }
        if(isset($_POST["phone"])){
            $phone = $_POST['phone'];
        }
        if(isset($_POST["passWord"])){
            $passWord = $_POST['passWord'];
        }

        $sql = "INSERT INTO sv(maSV, tenSV, ngaySinh, gioiTinh, email, phone, passWord) VALUES('$maSV', '$tenSV', '$ngaySinh', '$gioiTinh', '$email', '$phone', '$passWord')";

        if($conn->query($sql) === TRUE){
            header("location: show.php");
            //echo "New recode created successfully";
        }else{
            echo "Error:".$sql."<br>".$conn->error;
        }

        mysqli_close($conn);
    }
  }
    
?>
