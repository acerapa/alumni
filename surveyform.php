<?php 
session_start();
include('./admin/db_connect.php');

 

// if (isset($_POST['submit'])  && !empty($_FILES["file"]["name"])) {
//     $name = $_POST['name'];
//     $address = $_POST['address'];
//     $email = $_POST['email'];
//     $contact = $_POST['contact'];
//     $civil_status = $_POST['civil_status'];
//     $elementary = $_POST['elementary'];
//     $elementary_year = $_POST['elementary_year'];
//     $elementary_award = $_POST['elementary_award'];
//     $highschool = $_POST['highschool'];
//     $highschool_year = $_POST['highschool_year'];
//     $highschool_award = $_POST['highschool_award'];
//     $college = $_POST['college'];
//     $college_year = $_POST['college_year'];
//     $college_award = $_POST['college_award'];
//     $studies = $_POST['studies'];
//     $studies_year = $_POST['studies_year'];
//     $studies_earned = $_POST['studies_earned'];
//     $employment_status = $_POST['employment_status'];
//     $occupation = $_POST['occupation'];
//     $datehired = $_POST['datehired'];
//     $company_name = $_POST['company_name'];
//     $company_address = $_POST['company_address'];
//     $job = $_POST['job'];
//     $job_year = $_POST['job_year'];
//     $job_company_name = $_POST['job_company_name'];

//     // File upload path
//     $targetDir = "admin/upload/";
//     $fileName = basename($_FILES["file"]["name"]);
//     $targetFilePath = $targetDir . $fileName;
//     $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

//        // Allow certain file formats
//        $allowTypes = array('jpg','png','jpeg','gif','pdf');
//        if(in_array($fileType, $allowTypes)){
//        // Upload file to server
//        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
//    $sql = "INSERT INTO graduate_survey_form(name, address, email, contact, civil_status, elementary, elementary_year, elementary_award, highschool, highschool_year, highschool_award, college, college_year, college_award,  studies, studies_year, studies_earned,  employment_status, occupation, datehired, company_name, company_address, proof_employment, job, job_year, job_company_name)
//     VALUES ('$name', '$address', '$email', '$contact', '$civil_status', '$elementary', '$elementary_year', '$elementary_award', '$highschool', '$highschool_year', '$highschool_award', '$college','$college_year', '$college_award', '$studies', '$studies_year','$studies_earned', '$employment_status', '$occupation', '$datehired', '$company_name', '$company_address', '".$fileName."', '$job','$job_year','$job_company_name')";
//     if (mysqli_query($conn, $sql)) {
//         echo '<script type="text/javascript">alert("Saved successfully") </script>';
//     } else {
        
//     }
//     mysqli_close($conn);
//   }
// }
// }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form | Graduate Tracer</title>
</head>

<?php
      $id = $_GET['id'];
      $sql0 = "SELECT count(user_id) as exist FROM graduate_survey_form WHERE user_id = '$id'";
      $result0 = mysqli_query($conn, $sql0);
      $row = mysqli_fetch_array($result0);
      $exist  = $row['exist']  ;
      
    ?>
<?php if($exist== 0): ?>

<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <h4 style="text-align: center;">Graduate Employment Survey Form</h4>
 
    <a href="index.php"><div style="margin-top:-40px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
</div>
    <hr>
    <br>
    <br>
    <form action="survey_form_process.php" method="POST" enctype="multipart/form-data">
    <div style="margin-left:10%;">
    <h4>General Information</h4>
    <?php
      $id = $_GET['id'];
      $sql3 = "SELECT * FROM users WHERE id = '$id'";
      $result = mysqli_query($conn, $sql3);
      $row = mysqli_fetch_assoc($result);
    ?>
    <div class="col-md-4">
        <input value="<?php echo $row['id'] ?>"  style="width:250px; padding:5px; margin-left:2%; display:none;" type="text" class="form-control" readonly name="user_id" >
     </div>
    <div class="col-md-4">
        <label for="" class="control-label">Name</label>
        <input readonly value="<?php echo $row['name'] ?>"style="width:250px; padding:5px; margin-left:9%" type="text" class="form-control" name="name" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Permanent Address</label>
        <input  style="width:250px; padding:5px; margin-left:1.9%;" type="text" class="form-control" name="address" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Email Address</label>
        <input  value="<?php echo $row['username'] ?>" readonly style="width:250px; padding:5px; margin-left:4.9%" type="email" class="form-control" name="email" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Contact Number</label>
        <input value="<?php echo $row['contact'] ?>" style="width:250px; padding:5px; margin-left:3%" readonly type="text" class="form-control" name="contact" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Civil Status</label>
        <select name="civil_status" id="civil_status" style="padding:5px; margin-left:6.3%; width:10%;" >
            <option selected value="">Choose</option>
            <option value="single">Single</option>
            <option value="maried">Married</option>
            <option value="widow">Widow/Widower</option>
            <option value="single_parent">Single Parent</option>
            <option value="separated">Separated</option>
        </select>
     </div>
     </div>
     <br>
<hr>
    <div style="margin-left:10%;">
    <h4>Educational Background</h4>
     <div class="col-md-4">
        <label for="" class="control-label">Elementary</label>
        <input  style="width:250px;padding:5px; margin-left:3%" type="text" class="form-control" name="elementary"  >
         &nbsp; Year Graduated
        <input  style="width:250px; padding:5px; margin-left:.9%" type="text" class="form-control" name="elementary_year"  >
        &nbsp; Awards Received
        <input  style="width:250px; padding:5px; margin-left:.9%" type="text" class="form-control" name="elementary_award"  >
     </div>
    <div class="col-md-4">
        <label for="" class="control-label">Highschool</label>
        <input  style="width:250px; padding:5px; margin-left:3%" type="text" class="form-control" name="highschool" >
         &nbsp; Year Graduated
        <input  style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="highschool_year"  >
        &nbsp; Awards Received
        <input  style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="highschool_award"  >
     </div>
    <div class="col-md-4">
        <label for="" class="control-label">College</label>
        <input  style="width:250px; padding:5px; margin-left:5%" type="text" class="form-control" name="college"  >
         &nbsp; Year Graduated
        <input  style="width:250px; padding:5px; margin-left:1%" value="<?php echo $row['course'] ?>" readonly type="text" class="form-control" name="college_year"  >
        &nbsp; Awards Received
        <input  style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="college_award" >
     </div>
         <div class="col-md-4">
        <label for="" class="control-label">Advance Studies</label>
        <input  style="width:250px; padding:5px; margin-left:.4%" type="text" class="form-control" name="studies"   >
         &nbsp; Year Graduated
        <input  style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="studies_year"  >
        &nbsp; Unit Earned
        <input  style="width:250px; padding:5px; margin-left:3.6%" type="text" class="form-control" name="studies_earned"  >
        <br>
        <input  style="width:250px; padding:5px; margin-left: 115px" type="text" class="form-control" name="studies"   >
        <input  style="width:250px; padding:5px; margin-left:10.4%" type="text" class="form-control" name="studies_year"  >
        <input  style="width:250px; padding:5px; margin-left:11.2%" type="text" class="form-control" name="studies_earned"  >
        <br>
        <input  style="width:250px; padding:5px; margin-left: 115px" type="text" class="form-control" name="studies"   >
        <input  style="width:250px; padding:5px; margin-left:10.4%" type="text" class="form-control" name="studies_year"  >
        <input  style="width:250px; padding:5px; margin-left:11.2%" type="text" class="form-control" name="studies_earned"  >
     </div>
     </div>
     </div>
     <br>
     <hr>
     <div style="margin-left:10%;">
    <h4>Employment Data</h4>
    <div class="col-md-4">
        <!-- <label for="" class="control-label">Employment Status</label> -->
        <!-- <select name="employment_status"   id="" style="padding:5px; margin-left:70px;">
            <option value="">Choose</option>
            <option value="employed">Employed</option>
            <option value="unemployed">Unemployed</option>
        </select> -->

        <input type="button" onclick="Employment_Status()" id="employment_status" value="Employment Status">
        <div class="col-md-4 mb-4" id="employment_status_options" style="display: none;">
            <br />
            <div id="employed_checkbox">
               <label class="container"><p id="checkbox_text">Are you Employed?</p>
                  <input type="checkbox" id="employed_checkmark" onclick="employed_function()" class="radio">
                  <input type="text" readonly value="unemployed" id="employment_status_id" style="display: none" name="employment_status">
                  <span class="checkmark"></span>
               </label>
            </div>
         </div>
         <div class="col-md-4 mb-4" id="employed_input" style="display: none;">
            <br />
               <div class="col-md-4">
                  <label for="" class="control-label">Present Occupation</label>
                     <input  id="present_occupation" style="width:250px; padding:5px; margin-left:5%" type="text" class="form-control" name="present_occupation"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Date Hired</label>
                     <input  id="date_hired" style="width:250px; padding:5px; margin-left:9.6%;" type="date" class="form-control" name="date_hired"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Company Name</label>
                     <input id="present_company_name"  style="width:250px; padding:5px; margin-left:7%" type="text" class="form-control" name="present_company_name"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Company Address</label>
                     <input id="present_company_address" style="width:250px; padding:5px; margin-left:6%" type="text" class="form-control" name="present_company_address"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Proof of Employment</label><br /><br /> 
                     <div id="profilepic" style="border-radius: 50%; height: 100px; width: 100px; overflow: hidden; background-position: 50% 50%; background-size: cover;  text-align: center;">
                           <img src="./blank.png" id="add-item-img" alt="" style="height: 100%; width: 100%; object-fit: cover;">
                        </div>
                        <p><input type="file" value="upload" id="image_pathname" accept="image/*" name="image_pathname" onchange="loadFile(this)" style="display: block;"></p>
                        <!-- <input type="file" name="image_pathname"> -->
                     </div>
                  </div>
               </div>
         </div>
     <br>
   <hr>
   <div style="margin-left:10%;">
    <h4>Previous Job</h4>
    <!-- <label for="" class="control-label">Is this your first job!</label> -->
        <!-- <select name="employment_status"   id="" style="padding:5px; margin-left:70px;">
            <option value="">Choose</option>
            <option value="employed">Employed</option>
            <option value="unemployed">Unemployed</option>
        </select> -->

    <div class="col-md-4">
        <label for="" class="control-label">Job Title</label>
        <input  style="width:250px; padding:5px; margin-left:1%"   type="text" class="form-control" name="job" >
         &nbsp; Date Hired
        <input  style="width:247px; padding:5px; margin-left:1%"   type="date" class="form-control" name="job_year" >
        &nbsp;Company Name
        <input  style="width:250px; padding:5px; margin-left:1%"  type="text" class="form-control" name="job_company_name" >
        <br>
        <label for="" class="control-label">Job Title</label>
        <input  style="width:250px; padding:5px; margin-left:1%"   type="text" class="form-control" name="job" >
        &nbsp; Date Hired
        <input  style="width:247px; padding:5px; margin-left:1%"   type="date" class="form-control" name="job_year" >
        &nbsp;Company Name
        <input  style="width:250px; padding:5px; margin-left:1%"  type="text" class="form-control" name="job_company_name" >
        <br>
        <label for="" class="control-label">Job Title</label>
        <input  style="width:250px; padding:5px; margin-left:1%"   type="text" class="form-control" name="job" >
         &nbsp; Date Hired
        <input  style="width:247px; padding:5px; margin-left:1%"   type="date" class="form-control" name="job_year" >
        &nbsp;Company Name
        <input  style="width:250px; padding:5px; margin-left:1%"  type="text" class="form-control" name="job_company_name" >
     </div>
      
     <br>
     </div>

     <button style="padding: 10px; width:20%; float:right; margin-bottom:9px; margin-top:13px;" type="submit" name="submit">Submit</button>
     </form>


<?php else: ?>


<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <h4 style="text-align: center;">Graduate Employment Survey Form [Update] </h4>
 
    <a href="index.php"><div style="margin-top:-40px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
</div>
    <hr>
    <br>
    <br>
    <form action="survey_form_update.php" method="POST" enctype="multipart/form-data">
    <div style="margin-left:10%;">
    <h4>General Information</h4>
    <?php
      $id = $_GET['id'];
      $sql = "SELECT * FROM graduate_survey_form WHERE user_id = '$id'";
      $result2 = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result2);
    ?>
    <div class="col-md-4">
        <input value="<?php echo $row['user_id'] ?>"  style="width:250px; padding:5px; margin-left:2%; display:none;" type="text" class="form-control" readonly name="user_id" >
     </div>
    <div class="col-md-4">
        <label for="" class="control-label">Name</label>
        <input readonly value="<?php echo $row['name'] ?>"style="width:250px; padding:5px; margin-left:9.1%" type="text" class="form-control" name="name" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Permanent Address</label>
        <input value="<?php echo $row['address'] ?>" style="width:250px; padding:5px; margin-left:1.9%;" type="text" class="form-control" name="address" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Email Address</label>
        <input  value="<?php echo $row['email'] ?>" readonly style="width:250px; padding:5px; margin-left:4.9%" type="email" class="form-control" name="email" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Contact Number</label>
        <input value="<?php echo $row['contact'] ?>" style="width:250px; padding:5px; margin-left:3%" readonly type="text" class="form-control" name="contact" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Civil Status</label>
        <select name="civil_status" id="civil_status" style="padding:5px; margin-left:6.3%; width:10%;" >
            <option selected value="">Choose</option>
            <option value="single">Single</option>
            <option value="maried">Married</option>
            <option value="widow">Widow/Widower</option>
            <option value="single_parent">Single Parent</option>
            <option value="separated">Separated</option>
        </select>
     </div>
     </div>
     <br>
<hr>
    <div style="margin-left:10%;">
    <h4>Educational Background</h4>
     <div class="col-md-4">
        <label for="" class="control-label">Elementary</label>
        <input value="<?php echo $row['elementary'] ?>" style="width:250px;padding:5px; margin-left:3%" type="text" class="form-control" name="elementary"  >
         &nbsp; Year Graduated
        <input  value="<?php echo $row['elementary_year'] ?>"style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="elementary_year"  >
        &nbsp; Awards Received
        <input value="<?php echo $row['elementary_award'] ?>" style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="elementary_award"  >
     </div>
    <div class="col-md-4">
        <label for="" class="control-label">Highschool</label>
        <input value="<?php echo $row['highschool'] ?>" style="width:250px; padding:5px; margin-left:3%" type="text" class="form-control" name="highschool" >
         &nbsp; Year Graduated
        <input  value="<?php echo $row['highschool_year'] ?>"style="width:250px; padding:5px; margin-left:1.1%" type="text" class="form-control" name="highschool_year"  >
        &nbsp; Awards Received
        <input  value="<?php echo $row['highschool_award'] ?>" style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="highschool_award"  >
     </div>
    <div class="col-md-4">
        <label for="" class="control-label">College</label>
        <input value="<?php echo $row['college'] ?>" style="width:250px; padding:5px; margin-left:5%" type="text" class="form-control" name="college"  >
         &nbsp; Year Graduated
        <input  value="<?php echo $row['college_year'] ?>" style="width:250px; padding:5px; margin-left:1.1%" name="college_year"   >
        &nbsp; Awards Received
        <input  value="<?php echo $row['college_award'] ?>" style="width:250px; padding:5px; margin-left:1%" type="text" class="form-control" name="college_award" >
     </div>
     <div class="col-md-4">
        <label for="" class="control-label">Advance Studies</label>
        <input value="<?php echo $row['studies'] ?>" style="width:250px; padding:5px; margin-left: 3px" type="text" class="form-control" name="studies"   >
         &nbsp; Year Graduated
        <input value="<?php echo $row['studies_year'] ?>" style="width:250px; padding:5px; margin-left:1.2%" type="text" class="form-control" name="studies_year"  >
        &nbsp; Unit Earned
        <input value="<?php echo $row['studies_earned'] ?>" style="width:250px; padding:5px; margin-left:3.6%" type="text" class="form-control" name="studies_earned"  >
        <br>
        <input value="<?php echo $row['studies'] ?>" style="width:250px; padding:5px; margin-left: 115px" type="text" class="form-control" name="studies"   >
        <input value="<?php echo $row['studies_year'] ?>" style="width:250px; padding:5px; margin-left:10.4%"  type="text" class="form-control" name="studies_year"  >
        <input value="<?php echo $row['studies_earned'] ?>" style="width:250px; padding:5px; margin-left:11.2%"  type="text" class="form-control" name="studies_earned"  >
        <br>
        <input value="<?php echo $row['studies'] ?>" style="width:250px; padding:5px; margin-left: 115px" type="text" class="form-control" name="studies"   >
        <input value="<?php echo $row['studies_year'] ?>" style="width:250px; padding:5px; margin-left:10.4%" type="text" class="form-control" name="studies_year"  >
        <input  value="<?php echo $row['studies_earned'] ?>"style="width:250px; padding:5px; margin-left:11.2%" type="text" class="form-control" name="studies_earned"  >
     </div>
     </div>
     
     </div>
     <br>
     <hr>
     <div style="margin-left:10%;">
    <h4>Employment Data</h4>
    <div class="col-md-4">
        <!-- <label for="" class="control-label">Employment Status</label> -->
        <!-- <select name="employment_status"   id="" style="padding:5px; margin-left:70px;">
            <option value="">Choose</option>
            <option value="employed">Employed</option>
            <option value="unemployed">Unemployed</option>
        </select> -->

        <input type="button" onclick="Employment_Status()" id="employment_status" value="Employment Status">
        <div class="col-md-4 mb-4" id="employment_status_options" style="display: none;">
            <br />


            <div id="employed_checkbox">
               <label class="container"><p id="checkbox_text">Are you Employed?</p>
                  <input type="checkbox" id="employed_checkmark" onclick="employed_function()" class="radio" selected>
                  <input type="text" readonly value="unemployed" id="employment_status_id" style="display: none" name="employment_status">
                  <span class="checkmark"></span>
               </label>
            </div>
         </div>
         <div class="col-md-4 mb-4" id="employed_input" style="display: none;">
            <br />
               <div class="col-md-4">
                  <label for="" class="control-label">Present Occupation</label>
                     <input value="<?php echo $row['present_occupation'] ?>" id="present_occupation" style="width:250px; padding:5px; margin-left:3.5%" type="text" class="form-control" name="present_occupation"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Date Hired</label>
                     <input value="<?php echo $row['date_hired'] ?>" id="date_hired" style="width:250px; padding:5px; margin-left:8.1%;" type="date" class="form-control" name="date_hired"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Company Name</label>
                     <input value="<?php echo $row['present_company_name'] ?>" id="present_company_name"  style="width:250px; padding:5px; margin-left:5.5%" type="text" class="form-control" name="present_company_name"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Company Address</label>
                     <input value="<?php echo $row['present_company_address'] ?>" id="present_company_address" style="width:250px; padding:5px; margin-left:4.7%" type="text" class="form-control" name="present_company_address"  >
                  </div>
                  <br>
                  <div class="col-md-4">
                     <label for="" class="control-label">Proof of Employment</label><br /><br /> 
                     <div id="profilepic" style="border-radius: 50%; height: 100px; width: 100px; overflow: hidden; background-position: 50% 50%; background-size: cover;  text-align: center;">
                           <img src="./blank.png" id="add-item-img" alt="" style="height: 100%; width: 100%; object-fit: cover;">
                        </div>
                        <p><input type="file" value="upload" id="image_pathname" accept="image/*" name="image_pathname" onchange="loadFile(this)" style="display: block;"></p>
                        <!-- <input type="file" name="image_pathname"> -->
                     </div>
                  </div>
               </div>
         </div>
     <br>
   <hr>
   <div style="margin-left:10%;">
    <h4>Previous Job</h4>
    <!-- <label for="" class="control-label">Is this your first job!</label> -->
        <!-- <select name="employment_status"   id="" style="padding:5px; margin-left:70px;">
            <option value="">Choose</option>
            <option value="employed">Employed</option>
            <option value="unemployed">Unemployed</option>
        </select> -->

        <div class="col-md-4">
        <label for="" class="control-label">Job Title</label>
        <input value="<?php echo $row['job'] ?>" style="width:250px; padding:5px; margin-left:.6%"   type="text" class="form-control" name="job" >
         &nbsp; Date Hired
        <input value="<?php echo $row['job_year'] ?>" style="width:247px; padding:5px; margin-left:1%"   type="date" class="form-control" name="job_year" >
        &nbsp;Company Name
        <input  value="<?php echo $row['job_company_name'] ?>" style="width:250px; padding:5px; margin-left:1%"  type="text" class="form-control" name="job_company_name" >
        <br>
        <label for="" class="control-label">Job Title</label>
        <input value="<?php echo $row['job'] ?>" style="width:250px; padding:5px; margin-left:.6%"   type="text" class="form-control" name="job" >
        &nbsp; Date Hired
        <input  value="<?php echo $row['job_year'] ?>"style="width:247px; padding:5px; margin-left:1%"   type="date" class="form-control" name="job_year" >
        &nbsp;Company Name
        <input  value="<?php echo $row['job_company_name'] ?>"style="width:250px; padding:5px; margin-left:1%"  type="text" class="form-control" name="job_company_name" >
        <br>
        <label for="" class="control-label">Job Title</label>
        <input value="<?php echo $row['job'] ?>" style="width:250px; padding:5px; margin-left:.6%"   type="text" class="form-control" name="job" >
         &nbsp; Date Hired
        <input  value="<?php echo $row['job_year'] ?>"style="width:247px; padding:5px; margin-left:1%"   type="date" class="form-control" name="job_year" >
        &nbsp;Company Name
        <input value="<?php echo $row['job_company_name'] ?>" style="width:250px; padding:5px; margin-left:1%"  type="text" class="form-control" name="job_company_name" >
     </div>

     <button style="padding: 10px; width:20%; float:right; margin-bottom:9px; margin-top:13px;" type="update" name="update">Update</button>
     </form>

     <?php
endif;
    ?>

   
   <script>
         // $(function() {
         // $( "#date" ).datepicker({dateFormat: 'yy'});
         // });
         // function checkbox(){
        
         //    $(this).siblings('input[type="checkbox"]').prop('checked', false);
        
         // }

         function Employment_Status(){
             console.log("employed_status");
             var employment_status_options = document.getElementById("employment_status_options");

             if(employment_status_options.style.display === "none"){
               employment_status_options.style.display = "block";
             }
         }

         function employed_function(){
            console.log("employed_function");

            var employed_input = document.getElementById("employed_input");
            var employed_checkbox = document.getElementById("employed_checkbox");
            var checkbox_text = document.getElementById("checkbox_text");

            if(employed_input.style.display === "none"){
               employed_input.style.display = "block";
               document.getElementById("checkbox_text").innerHTML = "Uncheck if you are Unemployed?";
               document.getElementById("employment_status_id").value = "employed";
             }else{
               employed_input.style.display = "none";
               document.getElementById("checkbox_text").innerHTML = "Are you Employed";
               document.getElementById("employment_status_id").value = "unemployed";
               document.getElementById("present_occupation").value = "";
               document.getElementById("date_hired").value = "";
               document.getElementById("present_company_name").value = "";
               document.getElementById("present_company_address").value = "";

             }

         }

         // function unemployed_function(){
         //    console.log("unemployed_function");

         //    var employment_status_options = document.getElementById("employment_status_options");
         //    var employed_input = document.getElementById("employed_input");
         //    var unemployed_checkbox = document.getElementById("unemployed_checkbox");

         //    if(employed_input.style.display === "block"){
         //       employment_status_options.style.display = "none";
         //       employed_input.style.display = "none";
         //       unemployed_checkbox.style.display = "none";
         //     }
            

         // }

         function advance_study(){
            console.log("advance_study");
            var advance_study_options = document.getElementById("advance_study_options");
            var advance_study_btn = document.getElementById("advance_study_btn");
            var back_btn = document.getElementById("back_btn");

            if(advance_study_options.style.display === "none"){
               advance_study_options.style.display = "block";
               advance_study_btn.style.display = "none";
               back_btn.style.display = "block";
            }
         }

         function advance_study_back(){
            console.log("advance_study_back");
            var advance_study_options = document.getElementById("advance_study_options");
            var advance_study_btn = document.getElementById("advance_study_btn");
            var back_btn = document.getElementById("back_btn");
            var masteral_form = document.getElementById("masteral_form");
            var doctorate_form = document.getElementById("doctorate_form");

            if(advance_study_btn.style.display === "none"){
               back_btn.style.display = "none";
               advance_study_options.style.display = "none";
               advance_study_btn.style.display = "block";
               masteral_form.style.display = "none";
               doctorate_form.style.display = "none";
            }
           

         }

         function masteral_function(){
            var masteral_form = document.getElementById("masteral_form");
            var doctorate_form = document.getElementById("doctorate_form");
   
            if(masteral_form.style.display === "none"){
               masteral_form.style.display = "block";
            }else{
               masteral_form.style.display = "none";
               document.getElementById("masteral_input").value = "";
               document.getElementById("masteralyear_input").value = "";
               document.getElementById("masteralaward_input").value = "";
            }
         }

         function doctorate_function(){
            var masteral_form = document.getElementById("masteral_form");
            var doctorate_form = document.getElementById("doctorate_form");
   
            if(doctorate_form.style.display === "none"){
               doctorate_form.style.display = "block";
            }else{
               doctorate_form.style.display = "none";
               document.getElementById("doctorate_input").value = "";
               document.getElementById("doctorateyear_input").value = "";
               document.getElementById("doctorateaward_input").value = "";
            }
         }

         function loadFile(elem) {
            if (elem.files && elem.files[0]) {
                var img = document.querySelector('#add-item-img');
                img.onload = () => {
                URL.revokeObjectURL(img.src); 
                }
                img.src = URL.createObjectURL(elem.files[0]);
            }
        }

      

   </script>

</body>
</html>