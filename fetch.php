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

<?php

$flag=0;
  
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


$bookid = $_POST['bookid']; 
function getMemberIDsByBookID($bookID) {

    $sql = "SELECT member_id FROM purchasedetails WHERE bookid = $bookID";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";
    
$conn = new mysqli($servername, $username, $password, $dbname);

    $result = mysqli_query($conn, $sql);

    
    if (mysqli_num_rows($result) > 0) {
      
        $memberIDs = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $memberIDs[] = $row['member_id'];
        }
        return $memberIDs;
    } else {
        return array(); 
    }
}

  
$memberIDs = getMemberIDsByBookID($bookid);

function getUserDetailsByMemberIDs($memberIDs) {
    
    $memberIDsString = "'" . implode("','", $memberIDs) . "'";
    $sql = "SELECT * FROM userdetails WHERE member_id IN ($memberIDsString)";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdetails";
        
    $conn = new mysqli($servername, $username, $password, $dbname);
   
    $result = mysqli_query($conn, $sql);

    
    if (mysqli_num_rows($result) > 0) {
       
        $userDetails = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $userDetails[] = $row;
        }
        return $userDetails;
    } else {
        return array(); 
    }
}

$userDetails = getUserDetailsByMemberIDs($memberIDs);
if (!empty($userDetails)) {
   
    foreach ($userDetails as $user) {
        echo "<h2 style='margin-left:700px'>";
        echo "Username: " . $user['Username'] . "<br>";
        echo "Age: " . $user['Age'] . "<br>";
        echo "Address: " . $user['Address'] . "<br>";
        echo "Date of Birth: " . $user['Date_of_Birth'] . "<br>";
        echo "Qualification: " . $user['Qualification'] . "<br>";
        echo "Email: " . $user['email'] . "<br>";
        echo "<br>";
        echo "----------------------------------------------------";
        echo "</h2>";
    }
} else {
    echo "<center><h2>No user details found for the given member IDs</h2>";
    echo "<center><button onclick='redirectToHomePage()'>REDIRECT TO HOME PAGE</button></center>";
  echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the Home page within <p id='counter'> 10 </p>second(s)...</div>";
}

// Close the database connection
mysqli_close($conn);
echo "</div>";echo "<header>";
echo " <h1>For other queries,Contact</h1>";
    
echo " <p>Nisha B - 9876545567</p>";
echo "  <p>Nithish kumar B - 9876546567</p>";
    
echo "</header>";
?>

<script>
function home()
{
    window.open('pagination.html');
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