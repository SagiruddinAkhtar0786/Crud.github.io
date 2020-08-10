<?php
// mysql connection

require_once 'includes/db.php';
$sql = "SELECT * FROM `students`";

$result = mysqli_query($conn,$sql);
$records = mysqli_num_rows($result);

$msg = "";

if(!empty($_GET['msg'])){
    $msg = $_GET['msg'];
    $alert_msg = ($msg =='add') ? "new msg has been added successfully!" : (($msg =='del') ? "record has been deleted successfully!" : "record has been updated successfully!");
}
else{
    $alert_msg = "";
}



?>



<!doctype html>
<html lang="en">

<?php 
    include 'partial/head.php';
?>

<body>

    <?php 
    include 'partial/nav.php';
?>

    <div class="container">

        <?php
        if(!empty($alert_msg)){  ?>
        <div class="alert alert-success"><?php echo $alert_msg; ?></div>
        <?php } ?>


        <div class="info"></div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>

            <tbody>

                <?php
                if(!empty($records)){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                <tr>
                    <th scope="row"> <?php echo $row['id']; ?> </th>
                    <td><?php echo $row['first_name'].' ' .$row['last_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td>
                        <a href="/crud2/add.php?id= <?php echo $row['id']; ?> " class="btn btn-primary">EDIT</a>
                        <a href="/crud2/delete.php?id= <?php echo $row['id']; ?>" class="btn btn-danger"
                            onClick="javascript:return confirm(' Do you want to really delete?');">DELETE</a>
                    </td>
                </tr>
                <?php
                    }
                }
            ?>

            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>