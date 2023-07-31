<?php
$host='localhost';
$user='root';
$pass='';
$db='student';
$con= mysqli_connect($host,$user,$pass,$db);
$res= mysqli_query($con,"select * from student");

$id='';
$name='';
$address='';

if(isset($_POST['id'])){

    $id=$_POST['id'];
}

if(isset($_POST['name'])){

    $name= $_POST['name'];
}
if(isset($_POST['address'])){

    $address= $_POST['address']; 
}

$sqls ='';;

if(isset($_POST['add'])){

    $sqls= "insert into student value($id , '$name' , '$address')";
    mysqli_query($con , $sqls);
    header("location: home.php");
}

if(isset($_POST['del'])){

    $sqls = "delete from student where name='$name'";
    mysqli_query($con , $sqls);
    header("location: home.php");
}


?> 




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
<link  href="css/style1.css" rel="stylesheet">
 
    <title>pro</title>

    
</head>

<body dir="rtl">
<div id="mother">

        <form method="POST"   >
            <div class="aside">
                <div id="div">

                    <img src="logo.png" alt="لوجو الموقع" width="100">
                    <h3>لوحة المدير</h3>
                    <label class="stnum" >رقم الطالب</label><br>
                    <input type="text" name="id" id="id"> <br>
                    <label class="stnum">أسم الطالب</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label class="stnum">عنوان الطالب</label><br>
                    <input type="text" name="address" id="address"><br><br>

                    <button name="add">أضافة طالب</button><br>
                    <button name="del">حذف طالب</button>

                </div>
            </div>

            <div class="main">
                <table id="tbl">

                <tr>
                    <th >الرقم التسلسل</th>
                    <th >اسم الطالب</th>
                    <th >عنوان الطالب</th>
                </tr>
                <?php
                 while( $row = mysqli_fetch_array($res)){

                    
                    echo"<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['address']."</td>";   
                    echo"</tr>";
                    
                 }
                
                ?>
                </table>


            </div>

        </form>
    </div>


    <script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbwbBrxWYnoRn8jlBdjcBUA-uHhGFRT1SLgcoDUy5oHbakI7dLbvg3-tH8P3yR5zpYne/exec'
 
  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => console.log('Success!', response))
      .catch(error => console.error('Error!', error.message))
  })
</script>
</body>



</html>