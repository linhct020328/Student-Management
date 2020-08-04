<?php
  $id = isset($_POST['id']) ? $_POST['id'] : '';
  if ($id){
      delete($id);
  }

  function delete($id)
  {
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "sinhvien";

          $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn -> connect_error){
            die("Connection failed:".$conn->connect_error);
            }
       
      // Câu truy sửa
      $sql = "DELETE FROM sv WHERE maSV = '$id' ";
       
      // Thực hiện câu truy vấn
      $query = mysqli_query($conn, $sql);
       
      return $query;
  }
   
  // Trở về trang danh sách
  header("location: show.php");
?>