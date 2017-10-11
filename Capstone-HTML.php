<?php include "Database.php";?>
<?php
            $connection = mysqli_connect('localhost','root','','Capstone');
            $studentName = "";
            if(isset($_POST['submit'])){
               if($_POST['name']){
                    $studentName = mysqli_real_escape_string($connection, $_POST['name']);
            }
   
                $studentID = $_POST['StudentID'];
               if($_POST['major'] == "Other"){
                   $studentMajor = $_POST['OtherOP'];
               }else{
                   $studentMajor = $_POST['major'];
               }
               $studentSemester = $_POST['Semester'];
               $studentYear = $_POST['year'];
 
            if(!$connection){
                die("DB connection failed. Something wrong in connection.");
            }else {
                $query = "INSERT INTO student (StudentID, StudentName, Major, Semester, Year) VALUES ('$studentID', '$studentName', '$studentMajor', '$studentYear','$studentSemester')";
            
                $result = mysqli_query ($connection, $query);
                    if(!$result){
                        die("result Failed. Something wrong in query.");
                    }
                }   
           }  
?>



<!DOCTYPE html>

<script type="text/javascript">
function showfield(name){
  if(name =='Other')
      document.getElementById('div1').innerHTML='<input type="text" name="OtherOP" required>';
  else 
      document.getElementById('div1').innerHTML='';
}
</script>


<script type="text/javascript">
function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
</script>

<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
  <div class="w3-content w3-margin-top" style = "text-align:center; color: grey;"  > <h3> ILR </h3></div>

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <form action="Capstone-HTML.php" method="post">
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
       <!-- imageFile upload Container -->

        <div class="w3-display-container">
        <input type = "file" onchange = "previewFile()"><br>
        <img src = "" heigh = "400" width="400" alt = "Student Image">
        
          
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2></h2>
          </div>
        </div>
        <div class="w3-container">
         
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i> 
          <input type="text" name="name" placeholder="Name"></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><input type="text" name="StudentID" placeholder="StudentID"><br></p>
          
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
          		<select name="major" id="major" onchange="showfield(this.options[this.selectedIndex].value)">>
                	<option selected="major">Major</option>
  					<option value="Bio">Biology</option>
					<option value="Chem">Chemistry</option>
  					<option value="Other">Other</option>
				</select>
                <div id="div1"></div>
             </p>
             <p id="date"> </p>
            	<script>
				var d = new Date();
				document.getElementById("date").innerHTML = "Date: " + d.getFullYear() + "/" + d.getDate() + "/" + (d.getMonth() + 1);
				</script>
          <input type = "radio" name = "Semester" value = "fall"> Fall
          <input type = "radio" name = "Semester" value = "spring"> Spring
          <input type = "radio" name = "Semester" value="summer"> Summer 
          <select name="year" id="year" onchange="showfield(this.options[this.selectedIndex].value)">
                	<option selected="Year">Year</option>
  		 <?php 
                for($i = 2000 ; $i <= date('Y'); $i++){
                    echo "<option>$i</option>";
                }
            ?>   
                    
				</select>
          <hr>
          <input class = "btn btn-primary"type="submit" name = "submit" value="Submit">

          
          <br>
        </form>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Admission, Placement Information</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>All other info </b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
          <p>Things we want to say about our dear student good or bad.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Web Developer / something.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
          <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Graphic Designer / designsomething.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
        </div>
      </div>

      <div class="w3-container w3-card-2 w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p>Web Development! All I need to know in one place</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>London Business School</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
          <p>Master Degree</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>School of Coding</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
          <p>Bachelor Degree</p><br>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>



</body>
</html>


