<!---Custom_textbox creation----->
<?php 

  global $wpdb;
  $table_name = $wpdb->prefix . 'bp_new_expense';

  
 ?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>  Search Expenses </title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      
      input[type=submit] {
        background-color: #33cccc;
        color: white;
        padding: 5px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        }

        input[type=submit]:hover {
          background-color: #03fcf4;
        }
        .table{

        }
        .table thead tr th, .table tbody tr td {
            border: none;

        }
        .button{
          border: none;
        }

    </style>  
    
  </head>
  <body class="">
    <div class="wrapper ">
      <div class="main-panel">
      
            <div class="container-fluid ml-5">
                 
               <div class="card " style="width: 100%;">
                      
                   <h2 class=" m-5"><b>Search Expenses </b></h2>
                   <h4>(Search By category/date)</h4>
                    <div class="ml-4 mr-5">
                       <form action="" method="post">
                          
                          <div class="form-group row">
                            <div class="col-5 ">
                             
                             <input type="text" class="form-control" id="search" name="search" placeholder="Search by Category" required>
                            </div>
                            <div class="col-6">
                            
                              <input type="submit" name="submit" value="Search by Category">
                          
                            </div>
                          </div>
                       </form>
                       <br>
                        <form action="" method="post">
                          
                          <div class="form-group row">
                            <div class="col-5 ">
                             <h5>Start Date </h5>
                             <input type="date" class="form-control" id="date1" name="date1" placeholder="Search by Date" required>
                            </div>

                            <div class="col-5">
                              <h5>End Date </h5>
                              <input type="date" class="form-control" id="date2" name="date2" placeholder="Search by Date" required>
                            </div>
                          </div>
                          <br>
                          <div class="col-6">
                              <input type="submit" name="submit2" value="Search by Date">
                            </div>
                       </form>
                       <!------Show result---------->
                   <table  class="table table-responsive borderless mt-3">
                        
                        
                        <!----Search result Category---->
                        <?php
                        if (isset($_POST['submit'])) {


                          $search_value=$_POST["search"];

                          //echo $search_value;
                          
                          global $wpdb;
                          $table_name = $wpdb->prefix . 'bp_new_expense';
                          $result = $wpdb->get_results ( "SELECT * FROM  $table_name WHERE purpose like '%$search_value%'" );
                         
                          $no_src_res =$wpdb->get_var ( "SELECT count(*) FROM  $table_name WHERE purpose like '%$search_value%'" );
                        ?>

                          <!-------Search key value and total result-------->
                          <tr>
                              <td><?php echo "Search Value: ".$search_value; ?></td>
                              <td><?php echo "Search Result: ".$no_src_res; ?></td>
                            </tr>  
                         
                          <?php 
                          foreach ( $result as $print ) {

                          ?>
                            
                            <!---------------->
                            <tr> 
                              <td>Expenses Date</td>
                              <td></td><td></td><td></td><td></td>
                              <td><b><?php echo $print->exp_date;?></b></td>
                            </tr>
                            <tr> 
                              <td>Paid To</td>
                              <td></td><td></td><td></td><td></td>
                              <td><?php echo $print->paid_to;?></td>
                            </tr>
                            <tr > 
                              <td>Amount</td>
                              <td></td><td></td><td></td><td></td>
                              <td><?php echo $print->amount;?></td>
                            </tr>
                            <tr> 
                              <td>Purpose</td>
                              <td></td><td></td><td></td><td></td>
                              <td><?php echo $print->purpose;?></td>
                            </tr>
        
                          <?php
                          } //----foreach loop end
                        ?>
                  
                 <?php } ?> 


                   <!----Search result Category---->
                        <?php
                        if (isset($_POST['submit2'])) {


                          $date1 = $_POST["date1"];
                          $date2 = $_POST["date2"];

                          //echo  $date;
                          
                          global $wpdb;
                          $table_name = $wpdb->prefix . 'bp_new_expense';
                          $result = $wpdb->get_results ( "SELECT * FROM $table_name WHERE exp_date BETWEEN '$date1' AND '$date2' " );
                         
                          $no_src_res =$wpdb->get_var ( "SELECT * FROM $table_name WHERE exp_date BETWEEN '$date1' AND '$date2' " );
                        ?>

                          <!-------Search key value and total result-------->
                          <tr>
                              <td><?php echo "Search Value: ". $date; ?></td>
                              <td><?php echo "Search Result: ".$no_src_res; ?></td>
                            </tr>  
                         
                          <?php 
                          foreach ( $result as $print ) {

                          ?>
                            <!---------------->
                            <tr> 
                              <td>Expenses Date</td>
                              <td></td><td></td><td></td><td></td>
                              <td><b><?php echo $print->exp_date;?></b></td>
                            </tr>
                            <tr> 
                              <td>Paid To</td>
                              <td></td><td></td><td></td><td></td>
                              <td><?php echo $print->paid_to;?></td>
                            </tr>
                            <tr > 
                              <td>Amount</td>
                              <td></td><td></td><td></td><td></td>
                              <td><?php echo $print->amount;?></td>
                            </tr>
                            <tr> 
                              <td>Purpose</td>
                              <td></td><td></td><td></td><td></td>
                              <td><?php echo $print->purpose;?></td>
                            </tr>
        
                          <?php
                          } //----foreach loop end
                        ?>
                  
                 <?php } ?> <!--------Update ends----->



                  </table>
                </div>  
                </div>   

               

            </div>
            </div>
            </div>
          
    <!--   Core JS Files   -->
    
  </body>
</html>