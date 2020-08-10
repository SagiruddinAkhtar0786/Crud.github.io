<?php
if(!empty($_GET['id'])){
    // require connection
    require_once  'includes/db.php';

    $students_id = $_GET['id'];

    $sql = "DELETE FROM `students` WHERE id = '$students_id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:/crud2/index.php?msg=del');
    }
 }

?>