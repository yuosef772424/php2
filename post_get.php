

<?php

// if (isset($_GET['name'])) {
//     echo "Hello " . htmlspecialchars($_GET['name']);
// }



if (isset($_POST['name'])) { //isset(): This is a function in PHP used to check whether variables are defined 
    echo "Hello " . htmlspecialchars($_POST['name']);
     //htmlspecialchars A function used to convert special characters in a string to HTML code, protecting against attacks
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>assignment</title>
</head>
<body>
    <!-- ------------GIT-------- -->
    <!-- GET is used to send data to the server. The data is included in the URL, making it visible 
     Use GET to retrieve information where the data is not sensitive
    -->

<!-- <form action="" method="git">  
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Send">
</form> -->

<!-- ---------------POST---------- -->

<!-- POST is used to send data to the server invisibly. The data is sent in the body of the request 
 the data will be sent using the POST method, making the data more secure during transmission
-->

 <form action="" method="post">   <!--action ="" This means that the form will be submitted to the same page  -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Send">
</form>
</body>
</html>