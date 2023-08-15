<?php
include 'config.php';

if(isset($_POST['login'])){


    $aname = mysqli_real_escape_string($conn, $_POST['adminname']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $select_users = mysqli_query($conn, "SELECT * FROM `admin` WHERE adminname = '$aname' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){

        $row = mysqli_fetch_assoc($select_users);

           $_SESSION['admin_name'] = $row['adminname'];
           $_SESSION['admin_id'] = $row['id'];
           header('location:admin-addBook.php');
  
     }else{
        $message[] = 'incorrect email or password!';
     }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-login.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if(isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <div class="form-container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Admin-name:</label>
                    <input type="text" name="adminname" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
        
    </div>
</body>
</html>
