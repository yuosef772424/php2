<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>photos</title>
</head>
<body>
    <div align="center">
        <?php 
$conn=mysqli_connect("localhost", "root", "", "photo");

        if(isset($_POST['add'])){
            $image=$_FILES['image'];
            $file_p="images/".$image['name'];
            move_uploaded_file($image["tmp_name"],$file_p);
           $un=$_POST['uname'];
            $phot=$image["name"];

$ins="insert into item (name,photo)value('$un','$phot')";      
   $sql=mysqli_query($conn,$ins);
   if($sql){
echo "تم الاضافة بنجاح";
   }else{
    echo ("ee".mysqli_error($conn));
   }                 
        ?>

<?php 
 }


 ?>
 <br><br>
 <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image"><br>
    <input type="text" name="uname"><br>
    <input type="submit" name="add" value="add">
    </form>
    <table border="2">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>photo</td>
        
        </tr>
<?php 


$sel="select * from item";
$se=mysqli_query($conn,$sel);
while($row=mysqli_fetch_array($se)){
?>
<td><?php echo $row['id_i']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><img width="20%" src="images/<?php echo $row['photo']; ?>" ></td>
<?php 
}
?>

        <tr>

        </tr>
    </table>
    </div>
    
</body>
</html>