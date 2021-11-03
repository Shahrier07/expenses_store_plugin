<!---Custom_textbox creation----->
<?php 

  global $wpdb;
  $table_name = $wpdb->prefix . 'bp_new_expense';

  //option value 
 

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>  Total Expense Filter </title>
   
     
    
  </head>
  <body class="">
    <div class="wrapper ">
      
      <div class="main-panel">
      
            <div class="container-fluid ml-5">
                 
               <div class="card " style="width: 100%;">
                      
                   <h2 class=" m-5"><b>Total Expenses Filter</b></h2>
                    <div class="ml-5 mr-5">
                       <form action="" method="post">
                          <!-------1------>
                          <div class="form-group row">
                            <div class="col-6">
                             <h5>Total Expenses: </h5>
                            </div>
                            <div class="col-6">
                              <?php 
                                  global $wpdb;
                                  $table_name = $wpdb->prefix . 'bp_new_expense';
                                  $salary = $wpdb->get_var("SELECT SUM(amount) 
                                    FROM $table_name");

                                  //$tot_salary = array_sum($salary);
                                  $tot_salary = $salary;
                                  echo $tot_salary;
                               ?>
                            </div>
                          </div>
                          <br>
                           <!-------2------>
                          <div class="form-group row">
                            <div class="col-4">
                             <h6>Search By category</h6>
                            </div>
                            <div class="col-5">
                             <!-------
                              <select name="purpose"  id="purpose" class="form-select form-select-lg mb-lg-3" required>>
                                <option value="office_exp">Office expense</option>
                                <option value="h&o_rent">House/Office Rent</option>
                                <option value="employee_sal">Employee Salary</option>
                              </select>
                              ---->
                               <select name="purpose" id="purpose" class="form-select form-select-lg mb-lg-3" aria-label="Default select example" required>

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
                            <div class="col-3">
                              <button class="btn btn-info " id="submit" name="submit" type="submit">Filter</button>
                            </div>
                          </div>
                        
                        <?php
                          if (isset($_POST['submit'])) {

                          $search_value=$_POST["purpose"];

                         // echo "hello";  
                         //echo $search_value;
                          
                          global $wpdb;
                          $table_name = $wpdb->prefix . 'bp_new_expense';
                          

                          $salary = $wpdb->get_var("SELECT SUM(amount) 
                                    FROM $table_name WHERE purpose LIKE '%$search_value%'");
                          
                          $tot_salary = $salary;
                          echo "<br>";
                          echo "Total ".$search_value." expenses"."=". $tot_salary;
                         }   
                        ?>
 
                          
                          
                      </form>
                    </div>  
                </div>












            </div>
            </div>
            </div>
          
    <!--   Core JS Files   -->
    
    
    















  </body>
</html>