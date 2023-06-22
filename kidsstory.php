<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";
$flag=0;
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$recordsPerPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$startFrom = ($page - 1) * $recordsPerPage;
$subject="kids stories";

echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
echo "	<p>Empowering the World of Books</p>";
echo "</header>";

$sql = "SELECT * FROM books WHERE subject = '$subject' LIMIT $startFrom, $recordsPerPage";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookId = $row['bookid'];
        $title = $row['title'];
        $author = $row['author'];
        $subject = $row['subject'];
        $dateOfPublication = $row['date_of_publication'];
        $image = $row['image'];

        $query="select no_of_copies from books where bookid='$bookId'";
        $result1 = $conn->query($query);
        
        
        echo "<div class='book-item'>";
        echo "<div class='book-image'><img src='uploads/" . $image . "'></div>";
        echo "<div class='book-details'>";
        echo "<p><strong>Book ID:</strong> " . $bookId . "</p>";
        echo "<p><strong>Title:</strong> " . $title . "</p>";
        echo "<p><strong>Author:</strong> " . $author . "</p>";
        echo "<p><strong>Subject:</strong> " . $subject . "</p>";
        echo "<p><strong>Date of Publication:</strong> " . $dateOfPublication . "</p>";
        
       
        $row1 = $result1->fetch_assoc();
        $copies_available= $row1['no_of_copies'];
        if($copies_available>0)
        {
            echo "<button style =' background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' onclick='reservebook()'>Reserve Book</button>";
            
        }
       
        else{
            echo "<button style =' background-color: rgb(230, 0, 0);border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' '>OUT OF STOCK</button>";
        }

  

        echo "</div>";
        echo "</div>";

        echo "</div>";
        echo "</div>";

    }
} else {
    echo "No books found.";
    
}
$countSql = "SELECT COUNT(*) AS total FROM books WHERE subject = '$subject'";
$countResult = $conn->query($countSql);
$rowCount = $countResult->fetch_assoc()['total'];

$totalPages = ceil($rowCount / $recordsPerPage);
echo "<div class='pagination'>";
  for ($i = 1; $i <= $totalPages; $i++) {
      if ($i == $page) {
          echo "<a href='?page=" . $i . "' class='active'>" . $i . "</a> ";
      } else {
          echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
      }
  }
  echo "</div><br><br>";
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
    .book-item {
        display: flex;
        margin-bottom: 20px;
    }

    .book-image img {
        width: 150px;
        height: auto;
        margin-right: 100px;
        margin-left:100px;
        margin-top:20px;
    }

    .book-details {
        flex: 1;
        margin-left:100px;
        
    }
    .centered-link {
            text-align: center;
            font-size:50px;
        }
     
header {
    background-color: #333;
    color: #fff;
    padding: 5px;
    text-align: center;
   
    
}
.pagination {
    margin-top: 20px;
    text-align: center;
}

.pagination a {
    display: inline-block;
    padding: 8px 16px;
    text-decoration: none;
    background-color: #f2f2f2;
    color: #333;
    border-radius: 4px;
    margin: 0 4px;
}

.pagination a:hover {
    background-color: #ddd;
}

.pagination .active {
    background-color: #333;
    color: #fff;
}
body 
{
    background-color:rgb(225, 225, 208);
}

     
     
</style>

<script>
function reservebook()
{
    window.open('reservebook.html');
}
    </script>