<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

// Create connection
$conn = new mysqli($servername,
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}

$name = $_POST['username'];
$age = $_POST['age'];
$email=$_POST['email'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$qualification = $_POST['qualification'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];


if ($password !== $confirmPassword || !is_strong_password($password)) {
  echo "<header>";
  echo "<p>Enriching Minds, Empowering Readers</p>";
  echo "<h1>LibraSys - Ultimate Library Management System </h1>";
  echo "<p>Empowering the World of Books</p></header>";
  
    echo "<div style='text-align:center;margin-top:100px;font-size :35px;'><p style='color:red'> &#x2717;</p><h2>Ensure that the password meets the required strength criteria and validate whether the entered password in both the 'Set Password' and 'Confirm Password' fields are identical.<h2><button onclick='redirectToRegistrationPage()'>Register again</button></div>";
    echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
            echo "You will be automatically redirected to the login page within &nbsp; <p id='counter'> 10</p> &nbsp;second(s)...</div>";
            echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p> <p>Nithish kumar B - 9876546567</p></header>";
} 
else{

$sql = "INSERT INTO userdetails (Username, Age, Address, Date_Of_Birth, Qualification, Password,email)  VALUES ('$name','$age','$address','$dob','$qualification','$password','$email')";

if (mysqli_query($conn, $sql)) {

  echo "<header>";
  echo "<p>Enriching Minds, Empowering Readers</p>";
  echo "<h1>LibraSys - Ultimate Library Management System </h1>";
  echo "<p>Empowering the World of Books</p></header>";
  echo "<div style='text-align:center;margin-top:100px;font-size :45px;'><p style='color:green'> &#x2713;</p><h2>User Registration Success!!</h2><p> Happy Reading!!</p><button onclick='redirectToHomePage()'>Redirect me to login page</button></div>";

  echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
  echo "You will be automatically redirected to the login page within &nbsp; <p id='counter'> 10</p>&nbsp;second(s)...</div>";
  echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p> <p>Nithish kumar B - 9876546567</p></header>";
} 

else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

function is_strong_password($password) {
    return (strlen($password) >= 8 && preg_match("/[A-Z]/", $password) && preg_match("/[a-z]/", $password) && preg_match("/[0-9]/", $password));
}

mysqli_close($conn);

?>

<style>
    header {
    background-color: #333;
    color: #fff;
    padding: 5px;
    text-align: center;
   
    
}
body{

    background-color:rgb(225, 225, 208);
}


       
        h1 {
            margin-top: 50px;
        }

        
        #content-container {
            display: flex;
            align-items: center;
            justify-content: center;
          
        }
        #redirect-image 
        {
            width:100px;
            height:100px;
        }button{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 2px;
    
  }
      
    </style>

<script>
         function redirectToHomePage() {
            window.location.href = "index.html";
        }
        function redirectToRegistrationPage()
        {
            window.location.href="new user.html";
        }

        // Countdown function
        function countdown() {
            var counterElement = document.getElementById("counter");
            var counter = parseInt(counterElement.innerText);

            if (counter > 1) {
                counter--;
                counterElement.innerText = counter.toString();
                setTimeout(countdown, 1000); // Update counter every second
            } else {
                redirectToHomePage();
            }
        }

        // Start the countdown when the page is loaded
        window.onload = function() {
            setTimeout(countdown, 1000);
        };
    </script>