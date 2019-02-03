<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="nav.css">
    <title>Document</title>
</head>
<body>
   <?php

ini_set( "display_errors", 0); 
        ?>
    <?php
    session_start();
   
    
    
    $use = $_SESSION['user_name'];

 
    
    if($use == true){
        
    }
    
  
    else{
        header("location: ulogin.php");
    }
    
    
   
    

      
?>


   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand"  href="index.html">Restaurent</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
     
   
     <li class="nav-item">
        <a class="nav-link" href="dash.php">Restaurants</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
          
    </ul>
    
    
  </div>  
</nav>
  
<div class="container">
  <div class="col-md-6">

<?php
include_once("connection.php");
                
          



    if(isset($_GET['details'])){
     $sql= "SELECT S.id,S.image,S.resname FROM addres S WHERE id='{$_GET['id']}'"; 
        $rim= mysqli_query($conn,$sql);
        
 
    while ($res = mysqli_fetch_array($rim)) {

 echo '  
                           
                                 
                                    <img height:150px;" class="im45 img-responsive" src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="400" width="450" class="img-thumnail" />  
                                
                            
                     '; 
        
        ?>
        <br>
     <h3><?php echo $res['resname'];  ?></h3>
        
        <form method="post">
             <div class="form-group">
      
      <input type="text" class="form-control" name="comments">
      <button type="submit" name="sub" class="btn btn-success">Send</button>
      
      <?php
                 
           include_once("connection.php");      
                 
         $use = $_SESSION['user_name']; 
        
                 if(isset($_POST['sub'])){
                    $comments = $_POST['comments'];
                     $cql = "INSERT INTO comments(username,resid,comments)
                                     VALUES('$use','{$res['id']}','$comments')";
                     $tql = mysqli_query($conn,$cql);
                     
                     if($tql){
                          header('Refresh:0; comm.php');
                     }
                 }
                 
                 
                 
                 ?>
    </div>
        </form>
        <div class="div1">
            <?php
            
            include_once("connection.php");
             
           $pql = "SELECT username,comments FROM comments WHERE resid='{$res['id']}'";
           $klm = mysqli_query($conn,$pql);
                
            
            while ($nes = mysqli_fetch_array($klm)) {
            
            ?>
            <p><label><?php echo $nes['username']; ?> </label> <?php echo $nes['comments']; ?></p>
            <?php
                
                
            }
        
        
            ?>
            
            
        </div>
        
            
        <?php
         
            
            
        
   
           
      }
    

    }
?>

</div>  
</div>
</body>
</html>