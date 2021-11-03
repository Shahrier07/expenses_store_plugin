<!---Custom_textbox creation----->
<?php 

  global $wpdb;
  //$table_name = 'wp_bp_new_expense';
  $table_name = $wpdb->prefix . 'bp_new_expense';
 
  //1st DB
  if (isset($_POST['newsubmit'])) {
    
    $exp_date = $_POST['exp_date'];
    $paid_to = $_POST['paid_to'];
    $amount = $_POST['amount'];
    $purpose = $_POST['purpose']; //array value
    $purpose = implode(",",$purpose);
    //echo $purpose;
    //echo  $exp_date,$paid_to,$amount,$purpose;
    /*
    foreach ( $purpose as $temp){
        $wpdb->query("INSERT INTO $table_name(exp_date,paid_to,amount, purpose) VALUES('$exp_date','$paid_to','$amount', '$temp')");
    
    }*/
    
    $wpdb->query("INSERT INTO $table_name(exp_date,paid_to,amount, purpose) VALUES('$exp_date','$paid_to','$amount', '$purpose')");
    
    echo "<script>location.replace('admin.php?page=add_expense');</script>";
  }
  
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>  Add Expense </title>
   
      <!-- CSS Just for demo purpose, don't include it in your project -->
     
    
  </head>
  <body class="">
    <div class="wrapper ">
      <div class="main-panel">
      
            <div class="container-fluid ml-5">
                 
               <div class="card">
                      
                   <h2 class=" m-5"><b>Add Expenses</b></h2>
                    <div class="ml-5 mr-5">
                       <form action="" method="post">
                          <!-------1------>
                          <div class="form-group row">
                            <div class="col-5">
                             <h4>Date</h4>
                            </div>
                            <div class="col-7">
                              <?php $today = date('Y-m-d'); 
                                //echo $today;
                                //last input =$today's date
                              ?>

                              <input type="date" class="form-control" id="exp_date" name="exp_date"
                              value="" min="<?php  echo $today;?>" max="" required>
                            </div>
                          </div>
                           <!-------2------>
                          <div class="form-group row">
                            <div class="col-5">
                             <h4>Paid to</h4>
                            </div>
                            <div class="col-7">
                              <input type="text" class="form-control" id="paid_to" name="paid_to" placeholder="paid to" required>
                            </div>
                          </div>
                           <!-------3------>
                          <div class="form-group row">
                            <div class="col-5">
                             <h4>Amount</h4>
                            </div>
                            <div class="col-7">
                              <input type="int" class="form-control" id="amount" name="amount" placeholder="amount" required>
                            </div>
                          </div>
                           <!-------4------>
                           <!-------Purposes------>
                           <?php ?>
                            

                          <div class="form-group row">
                            <div class="col-5">
                             <h4>Purposes</h4>
                            </div>
                            <div class="col-7">
                              <!----------
                              <select name="purpose[]" multiple size =2 id="purpose" class="form-select form-select-lg mb-lg-3" required>>
                                <option value="office_exp">Office expense</option>
                                <option value="h&o_rent">House/Office Rent</option>
                                <option value="employee_sal">Employee Salary</option>
                              </select>
                              ----->
                               <select name="purpose[]" id="purpose" multiple size =3 class="form-select form-select-lg mb-lg-3" aria-label="Default select example" required>

                               <?php 
                                global $wpdb;
                                $table_name = $wpdb->prefix . 'bp_new_category';
                                $result = $wpdb->get_results ( "SELECT * FROM  $table_name" );
                                
                                  echo "<option value=''>"

                                        .'Select Purpose'.

                                        "</option>";
                                foreach ( $result as $print ) {
                                     
                                       
                                        echo "<option 
                                        value='".$print->cat_name."'>"

                                         .$print->cat_name.

                                        "</option>";
                                    
                                }
                               ?>          
                               </select>
                            </div>
                          </div>
                           
                          <!----Submit button----> 
                          <div class="form-group row ">
                            <div class="col-5">
                             
                            </div>
                            <div class="col-7">
                              <button class="btn btn-info " id="newsubmit" name="newsubmit" type="submit">Enlist Expenses</button>
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