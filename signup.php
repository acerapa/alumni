<?php 
include 'admin/db_connect.php'; 
?>
<style>
    .masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }
    img#cimg{
        max-height: 10vh;
        max-width: 6vw;
    }
</style>
        <header class="masthead">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Create Account</h3>
                        <hr class="divider my-4" />

                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header>
            <div class="container mt-3 pt-2" style="width: 40%;">
               <div class="col-lg-12">
                   <div class="card mb-4">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="col-md-12">
                                    <form action="" method="POST" id="create_account">
                                    <div class="col-md-4">
                                                <label for="" class="control-label">ID Number</label>
                                                <input  style="width:250px" type="text" class="form-control" name="id" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="" class="control-label">Last Name</label>
                                                <input  style="width:250px" type="text" class="form-control" name="lastname" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">First Name</label>
                                                <input  style="width:250px" type="text" class="form-control" name="firstname" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">M.I</label>
                                                <input  style="width:250px" type="text" class="form-control" name="middlename" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Batch</label>
                                                    <select name="course" id="" class="form-control" style="width:250px">
                                                    <option selected value="">Choose</option>
                                                    <option value="2015">Batch 2015</option>
                                                    <option value="2016">Batch 2016</option>
                                                    <option value="2017">Batch 2017</option>
                                                    <option value="2018">Batch 2018</option>
                                                    <option value="2019">Batch 2019</option>
                                                    <option value="2020">Batch 2020</option>
                                                    <option value="2021">Batch 2021</option>
                                                    <option value="2022">Batch 2022</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <!----<div class="col-md-5">
                                                <label for="" class="control-label">Image</label>
                                                <input type="file" class="form-control" name="img"  onchange="displayImg(this,$(this))">
                                                <img src="" alt="" id="cimg">
                                            </div> -->
                                            
                                        <div class="col-md-5" style="margin-left:30px;">
                                                <label for="" class="control-label">Contact Number</label>
                                                <input type="text" style="width:250px;" placeholder="+63" class="form-control" name="contact">
                                            </div>

                                        </div>
                                           <div style="margin-left: 3.5%;">
                                             <div class="col-md-4">
                                                <label for="" class="control-label">Email</label>
                                                <input  style="width:250px" type="email" class="form-control" name="email" required>
                                             </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Password</label>
                                                <input  style="width:250px" type="password" class="form-control" name="password" required>
                                            </div>
                                            </div>

                                        <div id="msg">
                                            
                                        </div>
                                        <hr class="divider">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-primary">Create Account</button>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>
                
            </div>


<script>
   $('.datepickerY').datepicker({
        format: " yyyy", 
        viewMode: "years", 
        minViewMode: "years"
   })
   $('.select2').select2({
    placeholder:"Please Select Here",
    width:"100%"
   })
   function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#create_account').submit(function(e){
    e.preventDefault()
    start_load()
    $.ajax({
        url:'admin/ajax.php?action=signup',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(resp){
            if(resp == 1){
                location.replace('index.php')
            }else{
                $('#msg').html('<div class="alert alert-success"> Successfully Created! </div>')
                end_load()
            }
        }
    })
})
</script>