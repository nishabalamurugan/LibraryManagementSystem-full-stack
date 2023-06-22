<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flag=0;
if (isset($_SESSION['member_id'])) {
    $memberId = $_SESSION['member_id'];

    // Use the member ID as needed
} else {
    // Member ID is not set, handle the case accordingly
    echo "Member ID not found.";
    $flag=1;
}
echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
echo "	<p>Empowering the World of Books</p>";
echo "</header>";

$bookId=$_POST['bookid'];
$bookQuery = "SELECT * FROM books WHERE bookid = '$bookId'";
$bookResult = mysqli_query($conn, $bookQuery);

if (mysqli_num_rows($bookResult) > 0) {
    $bookRow = mysqli_fetch_assoc($bookResult);
    $bookName = $bookRow['title'];
    
    if ($bookRow['no_of_copies'] > 0) {
        $updateQuery = "UPDATE books SET no_of_copies = no_of_copies - 1 WHERE bookid = '$bookId'";
        mysqli_query($conn, $updateQuery);
        $dueDate = date('Y-m-d', strtotime('+15 days'));
        $insertQuery = "INSERT INTO purchasedetails (member_id, bookid, due_date) VALUES ('$memberId', '$bookId', '$dueDate')";
        mysqli_query($conn, $insertQuery);

        echo "<center><h1>Book reserved successfully!</h1>";
        echo "<h2>Please return the book before the due date, which is $dueDate.</h2>";
        echo "<p>Happy reading</p></center>";
        $emailQuery = "SELECT email FROM userdetails WHERE member_id = '$memberId'";
        $emailResult = mysqli_query($conn, $emailQuery);

        if ($emailResult) {
            if (mysqli_num_rows($emailResult) > 0) {
                $emailRow = mysqli_fetch_assoc($emailResult);
                $email = $emailRow['email'];
                #echo "<p>Email address: $email</p>";

                $mail=new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='nishameenab@gmail.com';
                $mail->Password='bjjdlhbkogbvyzwr';
                $mail->SMTPSecure='ssl';
                $mail->Port=465;


                $mail->setFrom('nishameenab@gmail.com');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject="Book reservation";
                $mail->Body="You (Member Id: ".$memberId .") have reserved a book ".$bookName." Please return the book before the due date which is ".$dueDate.". Thank you for choosing our library.";
                $mail->send();


            }
            



            if($bookRow['no_of_copies']==1)
            {
                
                $mail=new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='nishameenab@gmail.com';
                $mail->Password='bjjdlhbkogbvyzwr';
                $mail->SMTPSecure='ssl';
                $mail->Port=465;


                $mail->setFrom('nishameenab@gmail.com');
                $mail->addAddress('nishameenab@gmail.com');
                $mail->isHTML(true);
                $mail->Subject="Book Out of Stock Notification";
                $mail->Body= "Dear Admin, We would like to formally inform you that the book named ".$bookName." is found out of stock!! Take necessary actions!!";
                $mail->send();
            }






        } else {
            echo "Error executing email query: " . mysqli_error($conn);
        }

    } else {
        echo "<h2>Sorry, the book '$bookName' is currently out of stock.</h2>";
        
    }
} else {
    echo "Book not found.";
}
echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the Home page within &nbsp;<p id='counter'> 10</p> &nbsp;second(s)...</div>";
echo "<center><button onclick='redirectToHomePage()' style='margin-bottom:200px;'>Redirect to Home page</button></center>";
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