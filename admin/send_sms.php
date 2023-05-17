<?php include('db_connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- /.modal compose message -->
    <div class="modal show" id="modalCompose">
    <br>
      <div class="modal-dialog" style="margin-left:280px; width:200%;">
        <div class="modal-content">
          <div class="modal-header modal-header-info">
            <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span> Compose Message</h4>
          </div>
          <div class="modal-body">
          <form action="send.php" method="POST" role="form" class="form-horizontal">
            <label for="">Select Batch: </label>
            <select name="batch" id="batch-filter">
              <option value="">All</option>
              <?php
                $index = 1;
                $batches = $conn->query("SELECT DISTINCT(users.course) FROM `graduate_survey_form` JOIN users ON graduate_survey_form.user_id = users.id");
                while ($batch=$batches->fetch_assoc()):
              ?>
                <option value="<?php echo $batch['course']; ?>"><?php echo $batch['course']; ?></option>
              <?php 
                $index++;
                endwhile;
              ?>
            </select>
            
            <div class="form-group">
              <label class="col-sm-12" for="inputBody"><span class="glyphicon glyphicon-list"></span>Message</label>
              <div class="col-sm-12"><textarea class="form-control" name="message" id="inputBody" rows="8"></textarea></div>
            </div>
        
            <?php
                if (isset($_GET['sent'])) {
                    echo "<script>alert('Message Sent')</script>";
                }
            ?>

          </div>
          <div class="modal-footer">
            <a href="index.php?page=../admin/home"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button></a>
            <button type="submit" name= "submit" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal compose message -->

<style type="text/css">
@import url('http://fonts.googleapis.com/css?family=Open+Sans:200,300');
body {
  	background-color:#fff;
  	font-family: 'Open Sans',Arial,Helvetica,Sans-Serif;
}

.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}


</style>

<script type="text/javascript">

</script>
</body>
</html>