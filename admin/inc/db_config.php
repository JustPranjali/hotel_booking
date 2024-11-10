<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Cannot Connect to Database: " . mysqli_connect_error());
}

function filteration($data) {
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($data[$key]);
        $data[$key] = htmlspecialchars($data[$key]);
        $data[$key] = strip_tags($data[$key]);
    }
    return $data;
}

function select($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            if ($res === false) {
                die("Query failed to execute - select: " . mysqli_error($con));
            }
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - select: " . mysqli_error($con));
        }
    } else {
        die("Query cannot be prepared - select: " . mysqli_error($con));
    }
}
?>