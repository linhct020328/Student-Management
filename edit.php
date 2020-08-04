<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "sinhvien";

      $conn = new mysqli($servername, $username, $password, $dbname);

  $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id){
        $data = get_by_sv($id);
    }

    if(!$data){
      header("location: show.php");
    }
    function get_by_sv($maSV){
      //$GLOBALS["somevar"];

      if($GLOBALS["conn"] -> connect_error){
      die("Connection failed:".$GLOBALS["conn"]->connect_error);
      }
      // Câu truy vấn lấy tất cả sinh viên
      $sql = "select * from sv where maSV = '$maSV'";
       
      // Thực hiện câu truy vấn
      $query = mysqli_query($GLOBALS["conn"], $sql);
       
      // Mảng chứa kết quả
      $result = array();
       
      // Nếu có kết quả thì đưa vào biến $result
      if (mysqli_num_rows($query) > 0){
          $row = mysqli_fetch_assoc($query);
          $result = $row;
      }
       
      // Trả kết quả về
      return $result;
  }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Submit1"])){
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

        $sql = "UPDATE sv SET tenSV = '$tenSV', ngaySinh = '$ngaySinh', gioiTinh = '$gioiTinh', email = '$email', phone = '$phone', passWord = '$passWord' WHERE maSV = '$id'";

        if($GLOBALS["conn"]->query($sql) === TRUE){
            header("location: show.php");
            //echo "New recode created successfully";
        }else{
            echo "Error:".$sql."<br>".$conn->error;
        }
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Students</title>
    <link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Edit Students</h2>
        </div>

        <a href="show.php">Trở về</a> <br/> <br/>

        <?php
        if (!empty($_POST['Submit1'])){
          $data['tenSV']        = isset($_POST['tenSV']) ? $_POST['tenSV'] : '';
          $data['ngaySinh']        = isset($_POST['ngaySinh']) ? $_POST['ngaySinh'] : '';
          $data['gioiTinh']        = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : '';
          $data['email']        = isset($_POST['email']) ? $_POST['email'] : '';
          $data['phone']        = isset($_POST['phone']) ? $_POST['phone'] : '';
          $data['passWord']        = isset($_POST['passWord']) ? $_POST['passWord'] : '';
        }
        ?>

        <form action="edit.php?id=<?php echo $id; ?>" method = "post" id="form" class="form">
            <div class="form-control">
                <label for="username">Tên SV:</label>
                <input type="text" name="tenSV" value="<?php echo $data['tenSV']; ?>"/>
            </div>

            <div class="form-control">
                <label for="username">Ngày sinh:</label>
                <input type="date" name="ngaySinh" value="<?php echo $data['ngaySinh']; ?>"/>
            </div>

            <div class="form-control">
                <label for="username">Gender</label>
                <input type="text" name="gioiTinh" value="<?php echo $data['gioiTinh']; ?>"/>
            </div>

            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" name="email" value="<?php echo $data['email']; ?>"/>
            </div>

            <div class="form-control">
                <label for="username">Phone</label>
                <input type="tel" name="phone" value="<?php echo $data['phone']; ?>"/>
            </div>

            <div class="form-control">
                <label for="username">Password</label>
                <input type="passWord" name="passWord" value="<?php echo $data['passWord']; ?>"/>
            </div>

            <button type="submit" name="Submit1">Update</button>    
        </form>
    </div>
</body>
</html>
