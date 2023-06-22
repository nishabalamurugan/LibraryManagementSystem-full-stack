<?php
// Connect to the database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
echo "	<p>Empowering the World of Books</p>";
echo "</header>";
$memberId = $_POST['memberid'];
$bookId = $_POST['bookid'];

$sql = "DELETE FROM purchasedetails WHERE member_id = $memberId AND bookid = $bookId LIMIT 1";
$conn->query($sql);
$noOfCopies = 1; 
updateNoOfCopies($conn, $bookId, $noOfCopies);

function updateNoOfCopies($conn, $bookId, $noOfCopies) {
    $sql = "UPDATE books SET no_of_copies = no_of_copies + $noOfCopies WHERE id = $bookId";
    echo " <center><h2>Record has been successfully updated..</h2>";
    echo " <p>The necessary changes have been made, ensuring accurate and up-to-date information in the database </p></center>";
    echo "<center><button onclick='home()'>REDIRECT TO HOME PAGE</button></center>";
    
    echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the Home page within &nbsp;<p id='counter'> 10</p>&nbsp;second(s)...</div>";

echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p> <p>Nithish kumar B - 9876546567</p></header>";

}

$conn->close();
?>


<style>
*
{
    font-size:25px;
   
}
    header {
    background-color: #333;
    color: #fff;
    padding: 5px;
    text-align: center;
   
    
}

.message {
      text-align: center;
      font-family: Arial, sans-serif;
      font-size: 18px;
      line-height: 1.5;
     
    }
td
{
    background-color:rgb(225, 225, 208);
   border-style:2px solid black;
} 
body {
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
         function home() {
            window.location.href = "admin.html";
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
                home();
            }
        }

        // Start the countdown when the page is loaded
        window.onload = function() {
            setTimeout(countdown, 1000);
        };
    </script>