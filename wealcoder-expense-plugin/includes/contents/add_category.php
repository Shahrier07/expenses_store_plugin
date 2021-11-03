<!---Custom_textbox creation----->
<?php 

  global $wpdb;
  $table_name = $wpdb->prefix . 'bp_new_category';
 
  //1st DB
  if (isset($_POST['newsubmit'])) {
    $cat_name = $_POST['cat_name'];
    
    
    $wpdb->query("INSERT INTO $table_name(cat_name) VALUES('$cat_name')");
    
    echo "<script>location.replace('admin.php?page=add_category');</script>";
  }
  
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>  Add Category </title>
   
      <!-- CSS Just for demo purpose, don't include it in your project -->
     
    
  </head>
  <body class="">
    <div class="wrapper ">
      <div class="main-panel">
      
            <div class="container-fluid ml-5">
                 
               <div class="card">
                      
                   <h2 class=" m-5"><b>Add Category</b></h2>
                    <div class="ml-5 mr-5">
                       <form action="" method="post">
                          <!-------1------>
                         
                           <!-------2------>
                          <div class="form-group row">
                            <div class="col-5">
                             <h4>Category</h4>
                            </div>
                            <div class="col-7">
                              <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="category" required>
                            </div>
                          </div>
                          
                           
                           
                          <!----Submit button----> 
                          <div class="form-group row ">
                            <div class="col-5">
                             
                            </div>
                            <div class="col-7">
                              <button class="btn btn-info " id="newsubmit" name="newsubmit" type="submit">Enlist Category</button>
                            </div>
                            
                          </div>
                          
                      </form>
                    </div>  
                </div>




            </div>
            </div>
            </div>
          
    <!--   Core JS Files   -->
    
    
    















  </body>
</html>