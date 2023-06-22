<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$selectQuery = "SELECT bookid, title, author, subject, date_of_publication, image, no_of_copies FROM books";

echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
echo "	<p>Empowering the World of Books</p>";
echo "</header>";
$selectQuery="select * from books";
$result = $conn->query($selectQuery);

if ($result && $result->num_rows > 0) {

    
   
    echo "<table style='border-collapse: collapse; width: 100%; border-color:solid black 2px;>";
    echo "<tr style='background-color: #f2f2f2;>";
    
    echo "<th style='border: 1px solid #ddd; padding: 8px;' > Book ID</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;' > Book </th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;' >Title of the Book</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;' >Name of the Author</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Subject</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Date of publication</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>No.of.copies available</th>";
   
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
        
        echo "<td style='border: 1px solid #ddd; padding: 8px'>" . $row['bookid'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px'><img  height=100 width=100 src='uploads/" . $image . "'><br>";
        echo "<td style='border: 1px solid #ddd; padding: 8px' >" . $row['title'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px' >" . $row['author'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px' >" . $row['subject'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px'>" . $row['date_of_publication'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px'>" . $row['no_of_copies'] . "</td>";
        echo "<th style='border: 1px solid #ddd; padding: 8px;'><form method='post' action='fetch.php'><input type='hidden' name='bookid' value=$bookId><button>BUYERS INFORMATION</button></form></th>";
        echo "</tr>";
    }
} else {
    echo "No records found.";
}

echo "</table>";

$conn->close();
echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p> <p>Nithish kumar B - 9876546567</p></header>";

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

body {
    background-color:rgb(225, 225, 208);
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