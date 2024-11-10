<?php
session_start(); // Start session at the beginning
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('inc/links.php'); ?>
    <?php require('inc/db_config.php'); ?>
    <?php require('inc/essentials.php'); ?>

    <style>
        .login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;

        }
        
    </style>
</head>
<body class="bg-light">

<div class="login-form text-center rounded bg-white shadow overflow-hidden">
    <form method="POST"> 
        <h4 class="bg-dark text-white py-3">Admin Login Panel</h4>
        
        <div class="p-4">
            <div class="mb-3">
                <input name="admin_name" type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
            </div>
            <div class="mb-4">
                <input name="admin_pass" type="password" class="form-control shadow-none text-center" placeholder="Password">
            </div>

            <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['login'])) 
{
    $frm_data = filteration($_POST);
    echo "<pre>"; print_r($frm_data); echo "</pre>"; // Debugging line to check filtered data
    
    $query = "SELECT * FROM `admin_cred` WHERE `admin_name` = ? AND `admin_pass` = ?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']]; 

    $res = select($query, $values, "ss");
    
    // Check if $res is valid and if there is a matching user
    if ($res && $res->num_rows == 1) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['sr_no'];
        redirect('dashboard.php');
         
    } else {
        alert('error', 'Login Failed - Invalid Credentials'); 
    }
}
?>

</body>
</html>