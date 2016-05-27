

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Emergency Room</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="	sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">	
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="	sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">	
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="	sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="mystyle.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
   
   //function to swap cell colors
   function swapCellColor(cell){  
    if (cell.className == "stable")
        cell.className = "critical";
    else if(cell.className == "critical")
        cell.className = "carefull"
    else
        cell.className = "stable";
    }
    </script>
    
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "EmergencyRoom";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
        //get post variable for patient
        $patient_name = $_POST['AddPacientForm'];
        //Add form patient
        
        if(isset($_POST[AddPacientForm]))
        {
          if (strcmp($patient_name,"")!=0) {
          $sql = "INSERT INTO Patients (Name,State) VALUES ('$patient_name','stable')";
          $result = $conn->query($sql1);
          }
        }
    $conn->close();
    
    ?>

  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    
    <h1>Emergency Room</h1>

    <!-- Form and button -->
    <div class="input-group center_div">
    	<span class="input-group-btn">
        <form action="" method="post">
    		<input type="text" class="form-control" style="width: 850px;"" name="AddPacientForm">
    	</span>
    	<span class="input-group-btn">
  			<input type="submit" class="btn btn-primary" value="ADD"></button>
        
        </form>
  		</span>
  	</div>
  <!-- Table of pacients-->
	   <div class="container text-center" style="width: 1000px;">            
	  	<table class="table table-striped" >
	    	<thead>
	     		<tr>
	        	<th>Name</th>
	        	<th>State</th>
	      		</tr>
	    	</thead>
	    	<tbody>
        <?php

      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection again
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
    
          $sql = "SELECT Name, State FROM Patients";
          $result = $conn->query($sql);

           if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              if(strcmp($row["State"],"stable")==0)
                {
                  $color = 'stable';
                }
              else if(strcmp($row["State"],"critical")==0)
                {
                  $color = 'critical';
                }
              else
                {
                  $color = 'carefull';
                }
              echo "<td>" . $row["Name"]."</td>";
              echo "<td class=$color onclick='swapCellColor(this)'> " . $row["State"]."</td>";
              echo "</tr>";
              }
            } 
            else 
            {
              echo "0 results";
            }
         ?>
	    	</tbody>
	  	</table>
		</div>

  </body>
</html>

