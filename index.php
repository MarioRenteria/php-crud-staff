<?php include('db.php'); ?>
<?php include('includes/header.php'); ?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!-- Messages -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissibl fade form show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();
            } ?>

            <!-- Add Staff Form -->
            <div class="card card-body">
                <form action="save_staff.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Staff Name" autofocus>
                    </div>
                    <div class="form-group">
                        <input name="salary" class="form-control" placeholder="Salary" />
                    </div>
                    <input type="submit" value="Save Staff" name="save_staff" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM staff";
                    $result_staff = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result_staff)) { ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_staff.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>