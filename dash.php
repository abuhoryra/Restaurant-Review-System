<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
   <link rel="stylesheet" href="nav.css">
    <title>Document</title>
    <style>
        .a1{
            text-decoration: none !important;
        }
        .a1:hover{
         color: limegreen;
        }
        .m1{
            box-shadow: none !important;
         
         
        }
        .m1:hover{
            color:deepskyblue !important;
        }
    </style>
</head>
<body>
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
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
          
    </ul>
    
    
  </div>  
</nav>
  


    <div class="container-fluid">
        
<div class="card-deck">
  

               
     <?php
   
    include_once("connection.php");
    
    
 

  
    $sql = "select  S.image, S.resname, S.resdes, S.id FROM addres S";
      $rim = mysqli_query($conn,$sql);

    
   
    
    while ($res = mysqli_fetch_array($rim)) {
       
        
        
        $tql = "select s.id, cast(AVG(rating )as decimal(10,1)) FROM rating,addres s  WHERE s.id=resid AND s.id='{$res['id']}' " ;
    $tim = mysqli_query($conn,$tql);
             while ($tes = mysqli_fetch_array($tim)) {

       
             
        ?>
        <div class="col-md-3">
       <div class="card" style="margin-top:3%;">
       <div class="r1">
          <div class="rati">
            
              
              
              
          </div>
           <h3 style="color:#ff6680; margin-left:3%;"> <?php echo $res['resname'];?>  <a style="float:right; font-size:17px; color: salmon;"><?php echo $tes['cast(AVG(rating )as decimal(10,1))']; ?> <i style="color:#00cc66;" class='fas fa-star'></i></a></h3>
         
        
          
          
          
          
          
          
          
          
          
         
       </div>
        <?php echo'
               <img style="height:250px; width:auto;"  src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="100" width="150" class="img-responsive" />  
     ';
    ?>
     <div class="card-body">
      <h5 class="card-title">Moto</h5>
      <p class="card-text"><?php echo $res['resdes'];?></p>

      
     
 
    <div class="row">
    <div class="col-md-6">
    <a class="a1" href="rating.php?ratingo=1&id=<?php echo $res['id']; ?>">
     <i class='far fa-star'></i>
     </a> 
 
   <br>

  <a class="a1" href="rating.php?ratingt=1&id=<?php echo $res['id']; ?>">
   <i class='far fa-star'></i>
     <i class='far fa-star'></i>  
     </a>
      <br>

  <a class="a1" href="rating.php?ratingh=1&id=<?php echo $res['id']; ?>">
   <i class='far fa-star'></i>
   <i class='far fa-star'></i>
   <i class='far fa-star'></i>                           
    </a>                            

  <br>

  <a class="a1" href="rating.php?ratingf=1&id=<?php echo $res['id']; ?>">
  <i class='far fa-star'></i>
  <i class='far fa-star'></i>
  <i class='far fa-star'></i>
  <i class='far fa-star'></i>
  </a>
  <br>

   <a class="a1" href="rating.php?ratingfi=1&id=<?php echo $res['id']; ?>">
    <i class='far fa-star'></i>
    <i class='far fa-star'></i>
    <i class='far fa-star'></i>
    <i class='far fa-star'></i>
      <i class='far fa-star'></i>
      </a>
</div>
<div class="col-md-6">
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1" style="float:right;">
 Enter Coments
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle1">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
         <div class="form-group">
    
    <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" placeholder="Enter Your Comments here......"></textarea>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div> 
<br>
<br>
<a style="float:right;" href="details.php?details=1&id=<?php echo $res['id']; ?>">Details</a>
      
      <!-- Button trigger modal -->
<button type="button" class="m1 btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" style="float:right; background-color: white; color:green; border:none;">
  See comments
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</div>
</div>
    
     

    
    </div>
</div>
                   </div>

   				
         
        <?php
         
            
            
        
             }
           
      }
    

      
?>

   
        </div>
     </div>  
 
</body>
</html>