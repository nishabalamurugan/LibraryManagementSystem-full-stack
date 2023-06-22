<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flag=0;
if (isset($_SESSION['member_id'])) {
    $memberId = $_SESSION['member_id'];

    // Use the member ID as needed
} else {
 
    echo "Member ID not found.";
    $flag=1;
}
echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
echo "	<p>Empowering the World of Books</p>";
echo "</header>";


$sql = "SELECT * FROM purchasedetails WHERE member_id = '$memberId' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<center><h2> Borrowed Books and their due dates..</h2></center>";
    echo "<table>
            <tr>
                
                <th>Title of the book</th>
                <th>Purchase Date</th>
                <th>Due Date</th>
            </tr>";

    // Output rows of purchase details
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        $bookid=$row['bookid'];
        

        $sql1 = "SELECT * FROM books WHERE bookid = '$bookid' ";
        $result1 = $conn->query($sql1);
        if($result1->num_rows>0)
        {
            while($row1=$result1->fetch_assoc())
            {
               
                echo "<td>" . $row1['title'] . "</td>";
            }
        }
        echo "<td>" . $row['purchase_date'] . "</td>";
        echo "<td>" . $row['due_date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<center><p>We apologize, but no purchase details were found for the provided member ID.</p>";
    echo "<p>If you believe this is an error or have any questions, please feel free to contact our support team.</p>";
    echo "<p>We are committed to providing the best assistance and will gladly assist you with any concerns.</p>";
    echo "<p>Have a great day!</p></center>";
    echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the Home page within <p id='counter'> 10</p>second(s)...</div>";

}
echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p> <p>Nithish kumar B - 9876546567</p></header>";
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

table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    
</style>

<script>
         function redirectToHomePage() {
            window.location.href = "pagination.html";
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