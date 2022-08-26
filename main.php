<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="datatables" href="https//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https////cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
   
    <body>
        
    
    <style>
        .employpage{
          display: flex;
          /* width: 1000px; */
          flex-wrap: wrap;
          /* margin: auto; */
          font-family: verdana;
          font-size: 16px;
          border: solid 2px #f1f1f1;
      }
      .employpage .formdata{
        width:40%;
        padding:15px;
      }
      .employpage .display_table {
        padding:15px;
        width:50%;
      }
      .employpage .display_table table{
        border:solid 1px #ccc;
      }
      .employpage .display_table td, 
      .employpage .display_table th{
        border-left:solid 1px #ccc;
        border-bottom:solid 1px #ccc;
        padding:10px 5px;
        text-align:left;
        font-size:13px;
      }
      .employpage .display_table td:first-child, 
      .employpage .display_table th:first-child{
        border-left:none;
      }
    
      .employpage .display_table tr{
        border-bottom:solid 1px #ccc;
      }
      .employpage .display_table tr:last-child td{
        border-bottom:none;
      }
      
      .formdata form{
        display:flex;
        flex-wrap:wrap;
        width:100%;
        background:#f1f1f1;
        padding:15px;
      }
      .formdata form label{
        width:100px;
      }
      .formdata form input, .formdata label{
        margin:10px 0;
        padding:5px;
      } 
      .formdata form input{
        width:200px;
        padding:7px;
      }
      .formdata th{
        background:#f1f1f1; 
        font-size:14px; 
        font-weight:bold;
        text-align:left;
      }
      .formdata .button{
        background:#000;
        padding:5px 10px;
        font-size:20px;
        margin:25px auto;
        display:table;
        color:#fff;
      }
      table{
        background-color: bisque;
      }
        .hidden{
            display: none;
        }
        .btn-btn{
            cursor: pointer;
        
    width: 100px;
    padding: 15px 20px;

    border: none;
    background: #a29bfe;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
        }
    </style>
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
            <input type="text" class="password" value="" placeholder="Password">
      
            <label>Location</label>
            <input type="text" class="location" value="" placeholder="Location">

           
            
            <label>Status</label>
            <input type="text" class="status" value="" placeholder="Status">
      
            <div style="width:100%">
            <input type="submit"  value="CREATE NEW"  class="button">
            
            </div>
          </form>
          <a href="logout.php" class="btn-btn">Logout</a>
        </div>
        <button id="open-modal" class="btn-btn">Create employee</button>
      
        <div class="display_table">
                    <table class="list" id="employeeList">
                          
                          
                            <thead class="row-position">
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
                          
                      </table>
        </div>
      </div>

      <script>
        document.getElementById('open-modal').addEventListener('click', function(){
            document.querySelector('.hidden').classList.remove('hidden');
            document.querySelector('#open-modal').classList.add('hidden');
        });
        var active = false;
        var selectedRow = null;
        var btn = document.querySelector(".button");
        btn.addEventListener("click", employdata);
        
        
        function employdata(){
          var ax = read_Input_Value();
          if (selectedRow == null){
            create_Tr_Td(ax);
            remove_input_value();
          }
          else{   
            updatefunc(ax); 
            remove_input_value(); 
            selectedRow = null;
          }

        }

            
        
        function read_Input_Value(){
          var redemp={} 
          redemp["ename"] = document.querySelector(".empname").value;
          redemp["email"] = document.querySelector(".email").value;
          redemp["mob"] = document.querySelector(".mobile").value;
          redemp["location"] = document.querySelector(".location").value;
            redemp["status"] = document.querySelector(".status").value;
            redemp["password"] = document.querySelector(".password").value;
          return redemp
        }
        function create_Tr_Td(x){
            
            if(emp_td7 == active){
              active = "Active";
            }else{
              active = "Inactive";
            }
          var empTable = document.querySelector(".list");
          var emp_tr = empTable.insertRow(empTable.length);
          var emp_td1 = emp_tr.insertCell(0);
          var emp_td2 = emp_tr.insertCell(1);
          var emp_td3 = emp_tr.insertCell(2);
          var emp_td4 = emp_tr.insertCell(3);
          var emp_td8 = emp_tr.insertCell(4);
          var emp_td5 = emp_tr.insertCell(5);
            var emp_td7 = emp_tr.insertCell(6);
           var emp_td6 = emp_tr.insertCell(7);

          var totalRowCount = document.querySelector(".list tr").length;
          emp_td1.innerHTML = empTable.rows.length-1;
          //Note:- .rows.length = return no of row 
        
          emp_td2.innerHTML = x.ename;   
            emp_td3.innerHTML = x.email;
            emp_td4.innerHTML = x.mob;
          emp_td5.innerHTML = x.location;
          
          emp_td6.innerHTML = '<a class="edt" onClick="onEdit(this)">Edit</a>  / <a class="dlt" onClick="onDelete(this)">Delete</a> / <a onClick="onRead(this)">Read</a> ';
            emp_td7.innerHTML = active;
            emp_td8.innerHTML = x.password;
            
            var arr = [x.ename, x.email, x.mob, x.location, x.password,emp_td7.innerHTML];
            console.log(arr);
            // let src2 = "index.php?arr=" + arr[0] + "," + arr[1]  + "," + arr[2] + "," + arr[3] + "," + arr[4] + "," + arr[5];
            //     window.location.href = src2;
            //     console.log(arruy2);
            // being able to drag and drop the rows
            

            
            
            
        }
        
        function remove_input_value(){
          document.querySelector(".empname").value= " ";
          document.querySelector(".email").value= " ";
          document.querySelector(".mobile").value= " ";
          document.querySelector(".location").value= " ";
            document.querySelector(".status").value= " ";
            document.querySelector(".password").value= " ";

        }
        
        function onEdit(y){
          console.log(y);
        
          //var selecteventbtn = document.querySelector("a.edt");
            selectedRow = y.parentElement.parentElement;
            //document.querySelector(".empid").value = selectedRow.cells[0].innerHTML;
            document.querySelector(".empname").value = selectedRow.cells[1].innerHTML;
            document.querySelector(".email").value = selectedRow.cells[2].innerHTML;
             document.querySelector(".mobile").value = selectedRow.cells[3].innerHTML;
            document.querySelector(".location").value = selectedRow.cells[5].innerHTML;            
            document.querySelector(".status").value = selectedRow.cells[6].innerHTML;
            document.querySelector(".password").value = selectedRow.cells[4].innerHTML;

        }
        function onRead(y){
          console.log(y);
        
          //var selecteventbtn = document.querySelector("a.edt");
            selectedRow = y.parentElement.parentElement;
            //document.querySelector(".empid").value = selectedRow.cells[0].innerHTML;
            document.querySelector(".empname").value = selectedRow.cells[1].innerHTML;
            document.querySelector(".email").value = selectedRow.cells[2].innerHTML;
             document.querySelector(".mobile").value = selectedRow.cells[3].innerHTML;
            document.querySelector(".location").value = selectedRow.cells[5].innerHTML;
            document.querySelector(".status").value = selectedRow.cells[6].innerHTML;
            document.querySelector(".password").value = selectedRow.cells[4].innerHTML;
            // alert with all information
            alert("Name: " + selectedRow.cells[1].innerHTML + "\n" + "Email: " + selectedRow.cells[2].innerHTML + "\n" + "Mobile: " + selectedRow.cells[3].innerHTML + "\n" + "Location: " + selectedRow.cells[5].innerHTML + "\n" + "Status: " + selectedRow.cells[6].innerHTML + "\n" + "Password: " + selectedRow.cells[4].innerHTML);
            

        }
        
        function updatefunc(redemp){
          selectedRow.cells[1].innerHTML = redemp.ename;
          selectedRow.cells[2].innerHTML = redemp.email;
          selectedRow.cells[3].innerHTML = redemp.mob;
          selectedRow.cells[5].innerHTML = redemp.location;
            selectedRow.cells[6].innerHTML = redemp.status;
            selectedRow.cells[4].innerHTML = redemp.password;
          
        }
        
        
        function onDelete() {
            if (confirm('Are you sure to delete this record ?')) {
                var selectdelete = document.querySelector("a.dlt");
                selectdelete = selectdelete.parentElement.parentElement.remove(0);
            }
        }
        
        //    // getting rows that can be dragged
        // var rows = document.querySelectorAll('.row-position');
        // // console.log(rows);
        // //drag start
        // function handleDragStart(e) {
        //     console.log('drag start');
        //     // this / e.target is the source node.
        //     this.style.opacity = '0.4';
        //     dragSrcEl = this;
        //     e.dataTransfer.effectAllowed = 'move';
        //     e.dataTransfer.setData('text/html', this.innerHTML);
        // }
        
        // //drag over
        // function handleDragOver(e) {
        //     if (e.preventDefault) {
        //         e.preventDefault(); // Necessary. Allows us to drop.
        //     }
        //     e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.
        //     return false;
        // }
        // //drag enter
        // function handleDragEnter(e) {
        //     this.classList.add('over');
        // }
        // //drag leave
        // function handleDragLeave(e) {
        //     this.classList.remove('over');  // this / e.target is previous target element.
        // }
        // //drop
        // function handleDrop(e) {
        //     // this/e.target is current target element.
        //     if (e.stopPropagation) {
        //         e.stopPropagation(); // Stops some browsers from redirecting.
        //     }
        //     // Don't do anything if dropping the same column we're dragging.
        //     if (dragSrcEl != this) {
        //         // Set the source column's HTML to the HTML of the column we dropped on.
        //         dragSrcEl.innerHTML = this.innerHTML;
        //         this.innerHTML = e.dataTransfer.getData('text/html');
        //     }
        //     return false;
        // }
        // //drag end
        // function handleDragEnd(e) {
        //     // this/e.target is the source node.
        //     this.style.opacity = '1';
        //     [].forEach.call(rows, function (row) {
        //         row.classList.remove('over');
        //     });
        // }
        // [].forEach.call(rows, function (row) {
        //     row.addEventListener('dragstart', handleDragStart, false);
        //     row.addEventListener('dragenter', handleDragEnter, false)
        //     row.addEventListener('dragover', handleDragOver, false);
        //     row.addEventListener('dragleave', handleDragLeave, false);
        //     row.addEventListener('drop', handleDrop, false);
        //     row.addEventListener('dragend', handleDragEnd, false);
        // });



        </script>
</body>
</html>
