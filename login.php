

<?php
$username = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$dbUsername = "root";
$dbPassword = ""; 
$dbname = "userdetails"; 

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM userdetails WHERE Username = '$username'";


$result = mysqli_query($conn, $query);


if ($result) {
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['Password'];
        $memberId = $row['member_id'];
  
       
       if ($password == $hashedPassword) {
            readFile('pagination.html');
            session_start();
            $_SESSION['member_id'] = $memberId;
        }
        
        else 
        {
            echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo "<h1>LibraSys - Ultimate Library Management System </h1>";
echo "<p>Empowering the World of Books</p></header>";

            echo "<div style='text-align:center;margin-top:100px;font-size :25px;'><p style='color:red'> &#x2717;</p><h2>PASSWORD INVALID</h2><p>Try Logging in again by entering correct password</p>
            <button onclick='login()'>Redirect me to Login page</button>
            </div>";
            echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
            echo "You will be automatically redirected to the login page within &nbsp; <p id='counter'> 10</p> &nbsp;second(s)...</div>";
            echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p> <p>Nithish kumar B - 9876546567</p></header>";
        }
    } 
    else {
        echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo "<h1>LibraSys - Ultimate Library Management System </h1>";
echo "<p>Empowering the World of Books</p></header>";
        echo "<div style='text-align:center;margin-top:100px;font-size :45px;'><h2>No such user records found !! try again !!<h2><button onclick='login()'>Redirect me to Login page</button></div>";
   
echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the login page within &nbsp;  <p id='counter'> 10</p> &nbsp;second(s)...</div>";
echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p> <p>Nithish kumar B - 9876546567</p></header>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
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

    background-color:rgb(224, 224, 210);
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
        }
        button {
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
}
      
    </style>

<script>
         function redirectToHomePage() {
            window.location.href = "index.html";
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
        function login()
        {
            window.open('index.html');
        }
    </script>