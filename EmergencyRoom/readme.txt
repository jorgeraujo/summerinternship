Emergency Room page, with information about patient names and health.
The frontend of the site was made with bootstrap and the backend with php.
I used the Apache server with MySql and manage the database with phpMyAdmin.
To run the page need do have the documents EmergencyRoom.php and myStyle.css 
in the Apache server htdocs directory and have the MySql server with 
the following configuration:
      
      servername = "localhost";
      username = "root";
      password = "root";
      dbname = "EmergencyRoom";

I made a table called Patients with two rows: onde called Name and other called
state, to store the name and health situation of the patient.
