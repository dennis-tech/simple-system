<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['username'])) {
  header("Location: index.php");

}
// if(isset($_GET['arr'])){
    
//   $data = explode (",", $_GET['arr']); 

//    $name = $data[0];
//    $email = $data[1];
//    $phone = $data[2];
//    $location = $data[3];
//    $password = $data[4];
//    $status = $data[5];
// // insert the data into the database
// $sql = "INSERT INTO `employees`(`name`, `email`, `password`, `phone_number`, `location`, `status`) VALUES ('$name', '$email', '$password', '$phone', '$location', '$status')";
// mysqli_query($conn, $sql);
// //  get all employees data from the database to data.json file
// $sql = "SELECT * FROM employees";
// $result = mysqli_query($conn, $sql);
// $data = array();
// while($row = mysqli_fetch_assoc($result)){
//    $data[] = $row;
// }
// $fp = fopen('data.json', 'w');
// fwrite($fp, json_encode($data));
// fclose($fp);

// echo $name;
//    // close connection
//    mysqli_close($conn);
//    header("Location: main.php");
// }



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <script src="node_modules/datatables.net/js/jquery.dataTables.min.js"></script> -->
    <link
      href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
   
    <body>
    <div class="employpage"> 
        <div class="formdata">
          
        <form onsubmit="event.preventDefault();" autocomplete="off" class="hidden">
            
            
            <label>Full Name</label>
            <input type="text" class="empname" value=""  placeholder="Full Name">
      
            <label>Email</label>
            <input type="text" class="email" value=""  placeholder="Email">
      
            <label>Mobile</label>
            <input type="text" class="mobile" value=""  placeholder=" Mobile phone">

            <label>Password</label>
            <input type="password" class="password" value="" placeholder="Password">
      
            <label>Location</label>
            <input type="text" class="location" value="" placeholder="Location">

           
            
            <label>Status</label>
            <input type="text" class="status" value="" placeholder="Status">
      
            <div style="width:100%">
            <input type="submit"  value="CREATE NEW"  class="button">
            
            </div>
          </form>

          <div class="links">
                <div>
                  <a href="logout.php"  id="logout" class="btn-btn">Logout</a>
                </div>
              <div>
                <a id="open-modal" class="btn-btn">Create</a>
              </div>
          </div>
          
        </div>
        
      
        <div class="display_table">
                    <table class="list" id="myTable">
                            <thead >
                              <tr>
                           <th>Id</th>         
                           <th>Full Name</th>
                           <th>Email</th>
                           <th>Mobile</th>
                           <th>Password</th>
                           <th>Location</th>
                           <th>Status</th>
                           <th>Action</th>                         
                       </tr>
                         </thead>
                          <tbody class="row-position">
                            
                          </tbody>
                      </table>
        </div>
      </div>
      <table class="table1">
        <thead>  </thead>
        <tbody> </tbody>
      </table>
<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- src="app.js" -->
      <script src="app.js" ></script>
</body>
</html>
