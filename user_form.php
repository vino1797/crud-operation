<?php
include 'database.php';

    if(isset($_POST["submit"]))
    {
        
    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $gender=$_POST['gender'];
    $education=implode(',', $_POST['user_education']);
    $phonNumber=$_POST['phone_number'];
    $dob=$_POST['user_dob'];
    $address=$_POST['user_address'];

    $sql = "INSERT INTO userdata (first_name, last_name, gender, user_education, phone_number, user_dob, user_address) 
    VALUES ('$firstName', '$lastName', '$gender', '$education', '$phonNumber', '$dob', '$address')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      header('Location: user_view.php');
    }else{
      die(mysqli_error($conn));
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE FORM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form action="user_form.php" method="post">
        <label class="form-group">First Name : 
            <input autocomplete="off" type="text" name="first_name">
        </label><br>
        <label class="form-group">Last Name : 
            <input autocomplete="off" type="text" name="last_name">
        </label><br>
        <label class="form-group">Gender : 
            <input autocomplete="off" type="radio" name="gender" value="Male"> Male
            <input autocomplete="off" type="radio" name="gender" value="Female"> Female
        </label>
        <label class="form-group">Education : 
            <input autocomplete="off" type="checkbox" name="user_education[]" value="Degree"> Degree
            <input autocomplete="off" type="checkbox" name="user_education[]" value="12th"> 12th
            <input autocomplete="off" type="checkbox" name="user_education[]" value="10th"> 10th
        </label>
        <label class="form-group">Phone Number :
            <input autocomplete="off" type="text" name="phone_number" minlength="10" maxlength="10">
        </label><br>
        <label class="form-group">Date of Birth : 
            <input autocomplete="off" type="date" name="user_dob" class="px-2 py-1">
        </label><br>
        <label class="form-group" for="address">Address :
            <textarea name="user_address" cols="50" rows="5"></textarea>
        </label>
        <input autocomplete="off" type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>