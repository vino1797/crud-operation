<?php
include 'database.php';
    $id=$_GET['updateid'];
    $sql="SELECT * FROM userdata WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $firstName=$row['first_name'];
    $lastName=$row['last_name'];
    $gender=$row['gender'];
    $education=$row['user_education'];
    $edu=explode(",",$education);
    $phonNumber=$row['phone_number'];
    $dob=$row['user_dob'];
    $address=$row['user_address'];
    if(isset($_POST["update"]))
    {
        
    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $gender=$_POST['gender'];
    $education=implode(',', $_POST['user_education']);
    $phonNumber=$_POST['phone_number'];
    $dob=$_POST['user_dob'];
    $address=$_POST['user_address'];
   
    $sql = "UPDATE `userdata` SET id='$id', first_name='$firstName', last_name='$lastName', gender='$gender', user_education='$education', phone_number='$phonNumber', user_dob='$dob', user_address='$address' WHERE id=$id";
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
    <title>UPDATE FORM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form action="" method="post">
        <label class="form-group">First Name : 
            <input autocomplete="off" type="text" value="<?php echo $firstName; ?>" name="first_name">
        </label><br>
        <label class="form-group">Last Name : 
            <input autocomplete="off" type="text" value="<?php echo $lastName; ?>" name="last_name">
        </label><br>
        <label class="form-group">Gender : 
            <input autocomplete="off" type="radio" name="gender" value="Male"
            <?php
                if($gender == "Male"){
                    echo "checked";
                }
            ?>
            > Male
            <input autocomplete="off" type="radio" name="gender" value="Female"
            <?php
                if($gender == "Female"){
                    echo "checked";
                }
            ?>
            > Female
        </label>
        <label class="form-group">Education : 
            <input autocomplete="off" type="checkbox" name="user_education[]" value="Degree"
            <?php
               if(in_array("Degree",$edu)){
                echo "checked";
               }
            ?>
            > Degree
            <input autocomplete="off" type="checkbox" name="user_education[]" value="12th"
           <?php
               if(in_array("12th",$edu)){
                echo "checked";
               }
            ?>
            > 12th
            <input autocomplete="off" type="checkbox" name="user_education[]" value="10th"
           <?php
               if(in_array("10th",$edu)){
                echo "checked";
               }
            ?>
            > 10th
        </label>
        <label class="form-group">Phone Number :
            <input autocomplete="off" type="text" value="<?php echo $phonNumber; ?>" name="phone_number" minlength="10" maxlength="10">
        </label><br>
        <label class="form-group">Date of Birth : 
            <input autocomplete="off" type="date" value="<?php echo $dob; ?>" name="user_dob" class="px-2 py-1">
        </label><br>
        <label class="form-group" for="address">Address :
            <textarea name="user_address" cols="50" rows="5"><?php echo $address; ?></textarea>
        </label>
        <input autocomplete="off" type="submit" name="update" value="Update" class="btn btn-success">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>