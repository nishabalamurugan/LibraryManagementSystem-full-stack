<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$recordsPerPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$startFrom = ($page - 1) * $recordsPerPage;
$subject="Novels";



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

        echo "<div class='book-item'>";
        echo "<div class='book-image'><img src='uploads/" . $image . "'></div>";
        echo "<div class='book-details'>";
        echo "<p><strong>Book ID:</strong> " . $bookId . "</p>";
        echo "<p><strong>Title:</strong> " . $title . "</p>";
        echo "<p><strong>Author:</strong> " . $author . "</p>";
        echo "<p><strong>Subject:</strong> " . $subject . "</p>";
        echo "<p><strong>Date of Publication:</strong> " . $dateOfPublication . "</p>";
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
echo "<div class='centered-link'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
}
echo "</div>";

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
        margin-left:700px;
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
</style>