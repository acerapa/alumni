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

//regex for inputed numbers
$numberRegex = "/[0-9]/";
//check validation if there are duplicates 
$check_name = "SELECT * FROM graduate_survey_form WHERE name = '$name'";
$duplicate_name = mysqli_query($conn, $check_name);

$check_email = "SELECT * FROM graduate_survey_form WHERE email = '$email'";
$duplicate_email = mysqli_query($conn, $check_email);

if(preg_match($numberRegex, $name, $match)){
    echo 
    ("<script LANGUAGE='JavaScript'>
    window.alert('Invalid Name, make sure there is no numbers.');
    window.location.href='surveyform.php';
    </script>");
}else if(mysqli_num_rows($duplicate_name) > 0){
    echo 
    ("<script LANGUAGE='JavaScript'>
    window.alert('Name is already taken.');
    window.location.href='surveyform.php';
    </script>");
}else if(mysqli_num_rows($duplicate_email) > 0){
        echo 
        ("<script LANGUAGE='JavaScript'>
        window.alert('Email is already taken.');
        window.location.href='surveyform.php';
        </script>");
}else{

    if (isset($_FILES["image_pathname"])) {
            $target_dir = "./image/";
            $message = "";
            $target_file = $target_dir . basename($_FILES["image_pathname"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          
            // $check = getimagesize($_FILES["image_pathname"]["tmp_name"]);
            // if ($check !== false) {
              move_uploaded_file($_FILES["image_pathname"]["tmp_name"], $target_file);

            $sql = "INSERT INTO graduate_survey_form (
                user_id,
                name,
                address,
                email,
                contact,
                civil_status,
                elementary,
                elementary_year,
                elementary_award,
                highschool,
                highschool_year,
                highschool_award,
                college,
                college_year,
                college_award,
                studies,
                studies_year,
                studies_earned,
                employment_status,
                present_occupation,
                date_hired,
                present_company_name,
                present_company_address,
                job,
                job_year,
                job_company_name,
                image_pathname
            )VALUES(
                '$id',
                '$name',
                '$address',
                '$email',
                '$contact',
                '$civil_status',
                '$elementary',
                '$elementary_year',
                '$elementary_award',
                '$highschool',
                '$highschool_year',
                '$highschool_award',
                '$college',
                '$college_year',
                '$college_award',
                '$studies',
                '$studies_year',
                '$studies_earned',
                '$employment_status',
                '$present_occupation',
                '$date_hired',
                '$present_company_name',
                '$present_company_address',
                '$job',
                '$job_year',
                '$job_company_name',
                '" . $_FILES["image_pathname"]["name"] . "'
            )";

            $query_run =  mysqli_query($conn, $sql);

            if($query_run){
                echo 
                ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully Added.');
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
    }else{
        $sql = "INSERT INTO graduate_survey_form (
            user_id,
            name,
            address,
            email,
            contact,
            civil_status,
            elementary,
            elementary_year,
            elementary_award,
            highschool,
            highschool_year,
            highschool_award,
            college,
            college_year,
            college_award,
            studies,
            studies_year,
            studies_earned,
            employment_status,
            present_occupation,
            date_hired,
            present_company_name,
            present_company_address,
            job,
            job_year,
            job_company_name,
        )VALUES(
            '$id',
            '$name',
            '$address',
            '$email',
            '$contact',
            '$civil_status',
            '$elementary',
            '$elementary_year',
            '$elementary_award',
            '$highschool',
            '$highschool_year',
            '$highschool_award',
            '$college',
            '$college_year',
            '$college_award',
            '$studies',
            '$studies_year',
            '$studies_earned',
            '$employment_status',
            '$present_occupation',
            '$date_hired',
            '$present_company_name',
            '$present_company_address',
            '$job',
            '$job_year',
            '$job_company_name',
        )";

        $query_run =  mysqli_query($conn, $sql);

        if($query_run){
            echo 
            ("<script LANGUAGE='JavaScript'>
            window.alert('Successfully Added.');
            window.location.href='index.php';
            </script>");
        }else{
            echo mysqli_error($conn);
        }
    }
}





?>