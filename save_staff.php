<?php
include('db.php');
if (isset($_POST['save_staff'])){
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $query = "INSERT INTO staff(name, salary) VALUES ('$name', '$salary')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message'] = 'Staff Saved Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}
?>