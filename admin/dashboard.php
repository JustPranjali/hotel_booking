<?php
require('inc/essentials.php');
   adminLogin();
   session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/links.php') ?>
</head>
<body class="bg-light">
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between">
    <h3 class="me-0">ADMIN PANEL</h3>
    <a class="btn btn-light btn-sm" href="logout.php">Log Out</a>
</div>

<?php require('inc/scripts.php') ?>
    
</body>
</html>