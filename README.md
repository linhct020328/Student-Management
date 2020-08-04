# Student-Management
add+edit+delete+search on MySQLi Object-Oriented
myphpadmin

create database sinhvien;

CREATE TABLE `sv` (
  `maSV` varchar(8) NOT NULL,
  `tenSV` varchar(30)  NOT NULL,
  `ngaySinh` date  NOT NULL,
  `gioiTinh` varchar(3) NOT NULL,
  `email` varchar(30)  NOT NULL,
  `password` varchar(16)  NOT NULL,
  `phone` varchar(10)  NOT NULL
)

ALTER TABLE `sv`
  ADD PRIMARY KEY (`maSV`)
  
  note: chưa có js, bạn có thể làm javascrip tương tự trong https://github.com/linhct020328/form-Login-Regist
