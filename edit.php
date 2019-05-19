<?php
include("db.php");
$name = '';
$salary = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM staff WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $salary = $row['salary'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $query = "UPDATE staff set name = '$name', salary = '$salary' WHERE id = $id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Staff Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}
?>

<?php include('includes/header.php') ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Update Name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="salary" class="form-control" value="<?php echo $salary ?>"/>
                    </div>
                    <button class="btn btn-success" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>