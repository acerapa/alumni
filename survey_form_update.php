<?php
session_start();
include('./admin/db_connect.php');

$id = $_POST['user_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$civil_status = $_POST['civil_status'];
$elementary = $_POST['elementary'];
$elementary_year = $_POST['elementary_year'];
$elementary_award = $_POST['elementary_award'];
$highschool = $_POST['highschool'];
$highschool_year = $_POST['highschool_year'];
$highschool_award = $_POST['highschool_award'];
$college = $_POST['college'];
$college_year = $_POST['college_year'];
$college_award = $_POST['college_award'];
$studies = json_encode([$_POST['studies-1'], $_POST['studies-2'], $_POST['studies-3']]);
$studies_year = json_encode([$_POST['studies_year-1'], $_POST['studies_year-2'], $_POST['studies_year-3']]);
$studies_earned = json_encode([$_POST['studies_earned-1'], $_POST['studies_earned-2'], $_POST['studies_earned-2']]);
$employment_status = $_POST['employment_status'];
$present_occupation = $_POST['present_occupation'];
$date_hired = $_POST['date_hired'];
$present_company_name = $_POST['present_company_name'];
$present_company_address = $_POST['present_company_address'];
$job = $_POST['job'];
$job_year = $_POST['job_year'];
$job_company_name = $_POST['job_company_name'];



    if (isset($_FILES["image_pathname"])) {
            $target_dir = "./image/";
            $message = "";
            $target_file = $target_dir . basename($_FILES["image_pathname"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          
            // $check = getimagesize($_FILES["image_pathname"]["tmp_name"]);
            // if ($check !== false) {
              move_uploaded_file($_FILES["image_pathname"]["tmp_name"], $target_file);

            $sql = "UPDATE graduate_survey_form SET
                address = '$address' ,
                civil_status =  '$civil_status',
                elementary = '$elementary',
                elementary_year = '$elementary_year',
                elementary_award = '$elementary_award',
                highschool = '$highschool',
                highschool_year = '$highschool_year',
                highschool_award = '$highschool_award',
                college = '$college',
                college_award = '$college_award',
                studies = '$studies',
                studies_year = '$studies_year',
                studies_earned = '$studies_earned',
                employment_status = '$employment_status',
                present_occupation = '$present_occupation',
                date_hired = '$date_hired',
                present_company_name = '$present_company_name',
                present_company_address = '$present_company_address',
                job = '$job',
                job_year = '$job_year',
                job_company_name = '$job_company_name'
                WHERE user_id = '$id'";

            $query_run =  mysqli_query($conn, $sql);

            if($query_run){
                echo 
                ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully Updated.');
                window.location.href='index.php';
                </script>");
            }else{
                echo mysqli_error($conn);
            }
        // }else{
        //     echo 
        //         ("<script LANGUAGE='JavaScript'>
        //         window.alert('File is not an image');
        //         window.location.href='index.php';
        //         </script>");
        // }
   
    }





?>