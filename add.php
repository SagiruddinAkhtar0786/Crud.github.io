<?php
    if(isset($_POST['submit']) && $_POST['submit'] != ''){
        // echo "<pre>";
        // print_r($_POST);


        
        // connecting to the db connection
        require_once 'includes/db.php';
        $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
        $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
        $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
        $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
        $course = (!empty($_POST['course'])) ? $_POST['course'] : '';
        $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';

        if(!empty($id)){
            // update the record

            $stu_sql=" UPDATE `students` SET `first_name`='$first_name',`last_name`='$last_name',`gender`= '$gender',`email`='$email',`course`='$course' WHERE id='$id'";
            $msg = "update";

        }else{
            // insert the record

            $stu_sql = "INSERT INTO `students`(`first_name`, `last_name`, `gender`, `email`, `course`) VALUES ('$first_name' , '$last_name' , '$gender' , '$email'  , '$course')";
            $msg = "add";
        }


        $result = mysqli_query($conn,$stu_sql);

        if($result){
            // echo "record has been submitted";
            header('location:/crud2/index.php?msg='.$msg);
        }
        else{
            echo "not";
        }
    }

    if(isset($_GET['id']) && $_GET['id']!=''){

        // connecting to the db connection
        require_once 'includes/db.php';
        $stu_id = $_GET['id'];
        $stu_sql = "SELECT * FROM `students` WHERE id='$stu_id'";
        $stu_result = mysqli_query($conn,$stu_sql);
        $results = mysqli_fetch_row($stu_result);
        // echo "<pre>";print_r($results);
        $first_name = $results[1];
        $last_name = $results[2];
        $gender = $results[3];
        $email = $results[4];
        $course = $results[5];
    }
    else{
        $first_name = "";
        $last_name = "";
        $gender = "";
        $email = "";
        $course = "";
        $stu_id = "";
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
        <div class="formdiv">
            <div class="info"></div>
            <form action="" method="post">
                <div class="form-group row">
                    <label for="first_name " class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="first_name" name="first_name" class="form-control"
                            placeholder="First Name" value="<?php echo $first_name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last_name " class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $last_name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender " class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male" <?php if($gender=='male'){echo 'selected';} ?>>Male</option>
                            <option value="female" <?php if($gender=='female'){echo 'selected';} ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email " class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="course " class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                        <select name="course" id="course" class="form-control">
                            <option value="">Select Course</option>
                            <option value="BCA" <?php if($course=='BCA'){echo 'selected';} ?>>BCA</option>
                            <option value="MCA" <?php if($course=='MCA'){echo 'selected';} ?>>MCA</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <input type="hidden" name="student_id" value="<?php echo $stu_id;?>">
                        <input class="btn btn-success" value="SUBMIT" name="submit" type="submit">
                    </div>
                </div>
            </form>

        </div>
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