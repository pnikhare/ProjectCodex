<!doctype html>
<html ng-app="CodexApp">
    <head>
        <title>Profile</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/codexApp.css"/>
        <style>
        input.username{
          border: 0px;
          background: white;
          width: 100px;
        }

        </style>
    </head>
    <body ng-controller="bzCtrl">
       <nav class="navbar navbar-default navbar-fixed-top" style="background-color:white;border:color:#428BCA;">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" style="color:#428BCA; font-size:25px; font-family:Times New Roman;border-color:#428BCA" href="Dashboard.php?user=<?php echo $_GET['user']?>">CODEX</a>
      </div>

        </nav>
        <br/>
        <br/>
        <br/>
        <div class="container">
<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<fieldset>

<!-- Form Name -->
<legend>My Profile -> Account setting</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Change Email ID</label>
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="your current email " class="form-control input-md">
  <span class="help-block">your new email ID</span>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">new password</label>
  <div class="col-md-4">
    <input id="passwordinput" name="passwordinput" type="password" placeholder="new password" class="form-control input-md">
    <?php
                  if(isset( $_GET['user']))
                  {$_SESSION['userid'] = $_GET['user'];
                                   }
                  ?>
  </div>
</div>

<!-- Password input-->


<!-- Select Basic -->


<!-- Button -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Remove my account</label>
  <div class="col-md-4">
    <button style="float:left" id="singlebutton" name="singlebutton" class="btn btn-danger">remove</button>


      <button style="float:right" id="submit" name="submit" class="btn btn-success center-block">Submit</button>

  </div>
</div>


<!-- Multiple Checkboxes -->

</fieldset>
</form>
            <?php
            session_start();
        echo $_SESSION['userid'];
        $con=mysqli_connect("localhost","root","root123","Codex");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
            if(isset($_POST['submit']))
               {
                $email=$_POST['textinput'];
                $pwd=$_POST['passwordinput'];
                //$result=mysqli_query($con,)
                   $result="UPDATE user
     SET email='".$email."' and password='".$pwd."'
     WHERE id='".$_SESSION['userid']."'";
                   if($con->query($result)==TRUE)
                   {
                       echo '<script language="javascript">';
echo 'alert("record successfully updated")';
echo '</script>';
                   }
                   else
                   {
                       echo '<script language="javascript">';
echo 'alert("updation unsuccessful")';
echo '</script>';
                   }

            }
            if(isset($_POST['singlebutton']))
            {
                $sql="DELETE FROM user WHERE id='".$_SESSION['userid']."'";
                if ($con->query($sql) === TRUE) {
    echo '<script language="javascript">';
echo 'alert("record deleted successfully")';
echo '</script>';
} else {
    echo '<script language="javascript">';
echo 'alert("record didnt get deleted")';
echo '</script>';
}
            }
            ?>

</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script>
        <script src="js/bzapp.js"></script>
    </body>
</html>
