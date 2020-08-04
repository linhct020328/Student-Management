<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "sinhvien";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if($conn -> connect_error){
      die("Connection failed:".$conn->connect_error);
      }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Show Students</title>
  <link rel="stylesheet" type="text/css" href="show.css">

</head>
<body>

  <div class="container">
      <div class="header">
        <h2>Show Students</h2>
      </div>

      <form  action="search.php" method="POST" class="form">
          <div class="form-control">
            <input class="au-input au-input--xl" type="text" name="key" placeholder="Search for datas &amp; reports..." />
            <button class="submit" name = "search" type="submit">Search</button>
          </div>
      </form>

      <table class="table">
        <thead>
            <tr>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Ngày Sinh</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Phone</th>
                <th>PassWord</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if(isset($_POST['search'])){
              $key = trim($_POST['key']);
              $sql = "SELECT * FROM sv WHERE Year(ngaySinh) = '$key'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['maSV']; ?></td>
                    <td><?php echo $row['tenSV']; ?></td>
                    <td><?php echo $row['ngaySinh']; ?></td>
                    <td><?php echo $row['gioiTinh']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['passWord']; ?></td>
                    <td>
                      <form method="post" action="delete.php">
                        <input onclick="window.location = 'edit.php?id=<?php echo $row['maSV']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $row['maSV']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                      </form>
                    </td>
                </tr>
            <?php endwhile;} ?>
        </tbody>
      </table>
      <button type="submit" onclick="window.location.href='./add.php'">Add</button>
    </div>
</body>
</html>
