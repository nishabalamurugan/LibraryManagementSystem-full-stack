
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
function home()
{
    window.open('pagination.html');
}

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
                setTimeout(countdown, 1000); 
            } else {
                redirectToHomePage();
            }
        }

        window.onload = function() {
            setTimeout(countdown, 1000);
        };
</script>

<?php
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

$title = isset($_POST['title']) ? $_POST['title'] : '';
$author = isset($_POST['author']) ? $_POST['author'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$dateOfPublication = isset($_POST['date_of_publication']) ? $_POST['date_of_publication'] : '';


$sql = "SELECT * FROM books WHERE 1=1";

if (!empty($title)) {
    $sql .= " AND title LIKE '%$title%'";
}

if (!empty($author)) {
    $sql .= " AND author LIKE '%$author%'";
}

if (!empty($subject)) {
    $sql .= " AND subject LIKE '%$subject%'";
}

if (!empty($dateOfPublication)) {
    $sql .= " AND date_of_publication = '$dateOfPublication'";
}

$result = $conn->query($sql);





if ($result->num_rows > 0) {
    echo "<center><h2>SEARCH RESULTS</h2></center>";
    echo "<table style='border-collapse: collapse; width: 100%; border-color:solid black 2px;>";
    echo "<tr style='background-color: #f2f2f2;>";
    
    
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        $bookId = $row['bookid'];
        $title = $row['title'];
        $author = $row['author'];
        $subject = $row['subject'];
        $dateOfPublication = $row['date_of_publication'];
        $image = $row['image'];
        $noOfCopies = $row['no_of_copies'];

        echo "<tr>";
        echo "<td style='border: 1px solid #ddd; padding: 8px'><img src='uploads/" . $image . "'></div>";
        echo "<td style='border: 1px solid #ddd; padding: 8px'><strong>Book ID:</strong> " . $bookId . "</p>";
        echo "<p><strong>Title:</strong> " . $title . "</p>";
        echo "<p><strong>Author:</strong> " . $author . "</p>";
        echo "<p><strong>Subject:</strong> " . $subject . "</p>";
        echo "<p><strong>Date of Publication:</strong> " . $dateOfPublication . "</p>";
        echo "<p><strong>Number of Copies:</strong> " . $noOfCopies . "</p>";
        echo "<p>------------------------------------------------------------------------------------------------------------</p>";
        echo "</tr>";

       
    }
} else {
    echo "<body><div class='message'><h2>Oops! We couldn't find the book you're looking for.</h2><p>Don't worry, though! Our team is working hard to expand our collection.</p><p>In the meantime, feel free to explore other books available in our library.</p></div><center><button onclick='home()'>Redirect to Home Page</button></center>";
echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the Home page within &nbsp; <p id='counter'> 10</p>&nbsp; second(s)...</div>";
    echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p><p>Nithish kumar B - 9876546567</p></header><br><br><br></body></html>";
    return;
}

echo "</div></html></table>";

echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p><p>Nithish kumar B - 9876546567</p></header><br><br><br></body></html>";
$conn->close();

?>
