<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$bookid = $_POST['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
echo "	<p>Empowering the World of Books</p>";
echo "</header>"; 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM books WHERE bookid = '$bookid'";

if ($conn->query($sql) === TRUE) {
    echo "<center><h2>Record deleted successfully<h2></center>";
} else {
    echo "Error deleting record: " . $conn->error;
}
echo "<center><button onclick=home()>REDIRECT TO HOME PAGE</button></center>";
  echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the Home page within &nbsp; <p id='counter'> 10 </p> &nbsp;second(s)...</div>";
$conn->close();
echo "</div>";echo "<header>";
echo " <h1>For other queries,Contact</h1>";
    
echo " <p>Nisha B - 9876545567</p>";
echo "  <p>Nithish kumar B - 9876546567</p>";
    
echo "</header>";
?>
<style>
    *
    {
        align-items:center;
        
        
    }
    
     
header {
    background-color: #333;
    color: #fff;
    padding: 5px;
    text-align: center;
   
    
}.message {
      text-align: center;
      font-family: Arial, sans-serif;
      font-size: 18px;
      line-height: 1.5;
     
    }


body 
{
    background-color:rgb(225, 225, 208);
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

        button{
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
function home()
{
    window.open('admin.html');
}

function redirectToHomePage() {
            window.location.href = "admin.html";
        }

        // Countdown function
        function countdown() {
            var counterElement = document.getElementById("counter");
            var counter = parseInt(counterElement.innerText);

            if (counter > 1) {
                counter--;
                counterElement.innerText = counter.toString();
                setTimeout(countdown, 1000); 
            } else {
                redirectToHomePage();
            }
        }

        window.onload = function() {
            setTimeout(countdown, 1000);
        };
</script>