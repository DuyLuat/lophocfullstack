<?php
require('database.php');
$db=new database();
$db->connect('localhost','root','','quanlysinhvien');
// $db->dellRow('students', 3);
// $db->update('students',[
//     'fullname'=>'Đào Duy Luât',
//     'age'=>15
// ], 4);
$student=$db->getSingle('students',4);
echo $student->fullname;

die();

if(isset($_POST['addstudent'])){

    $name=$_POST['name'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    $db->insert('students', [
        'name'=>$name, 'age'=>$age,'phone'=>$phone,'address'=>$address
    ] );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <title>Thêm sinh viên</title>
</head>
<body>
    
    <form action="index.php" method="POST" role="form">
        <legend>Thêm sinh viên</legend>
    
        <div class="form-group">
            <label for="">Tên sinh viên:</label>
            <input type="text" class="form-control" name="name" >
            <label for="">Tuổi:</label>
            <input type="text" class="form-control" name="age" >
            <label for="">Điện thoại:</label>
            <input type="text" class="form-control" name="phone" >
            <label for="">Địa chỉ:</label>
            <input type="text" class="form-control" name="address" >
        </div>
       
        <button type="submit" name="addstudent" class="btn btn-primary">Thêm sinh viên</button>
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>