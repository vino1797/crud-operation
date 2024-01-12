<?php
  include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISPLAY FORM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid my-3">
      <a href="user_form.php" class="btn btn-primary mb-2">Add User</a>
   <table class="table table-striped table-hover border border-black border-2 text-center">
  <thead>
    <tr>
      <th scope="col">SI.no</th>
      <th scope="col">first_name</th>
      <th scope="col">last_name</th>
      <th scope="col">gender</th>
      <th scope="col">user_education</th>
      <th scope="col">phone_number</th>
      <th scope="col">user_dob</th>
      <th scope="col">user_address</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($conn, $sql);
    $number=1;
    if($result){
     while($row = mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $firstName=$row['first_name'];
      $lastName=$row['last_name'];
      $gender=$row['gender'];
      $education=$row['user_education'];
      $phonNumber=$row['phone_number'];
      $dob=$row['user_dob'];
      $address=$row['user_address'];

      echo '<tr>
            <th scope="row">'.$number.'</th>
            <td>'.$firstName.'</td>
            <td>'.$lastName.'</td>
            <td>'.$gender.'</td>
            <td>'.$education.'</td>
            <td>'.$phonNumber.'</td>
            <td>'.$dob.'</td>
            <td>'.$address.'</td>
            <td>
            <a href="update.php?updateid='.$id.'"class="btn btn-success px-2">Update</a>
            <a href="delete.php?deleteid='.$id.'"class="btn btn-danger px-2">Delete</a>
            </td>
            </tr>';
            $number++;
     }
    }
    ?>
  </tbody>
</table>
</div>