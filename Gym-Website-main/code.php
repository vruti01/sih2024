<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM user_form WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: table.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['password']);
    $course = mysqli_real_escape_string($con, $_POST['user_type']);

    $query = "UPDATE user_form SET name='$name', email='$email',password='$phone' , user_type='$course' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: table.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['password']);
    $course = mysqli_real_escape_string($con, $_POST['user_type']);

    $query = "INSERT INTO user_form (name,email,password,user_type) VALUES ('$name','$email','$phone','$course')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>