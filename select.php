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
  table, th, tr, td {
  border: 2px solid black;
  border-collapse: collapse;
  text-align: center;
  margin: 40px;
  padding: 5px;
}

table {
  width: 100%;
}
 
</style>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$connection = new mysqli($servername,
	$username, $password, $dbname);
    echo "<header>";
    echo "<p>Enriching Minds, Empowering Readers</p>";
    echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
    echo "	<p>Empowering the World of Books</p>";
    echo "</header>"; 

$query = "SELECT * FROM userdetails";
$result = mysqli_query($connection, $query);



if ($result) {

    echo "<center><h1>Member Details</h1></center>";
    echo "<table style='border-collapse: collapse; width: 100%;>";
    echo "<tr style='background-color: #f2f2f2;>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;' >Member ID</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;' >Username</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;' >Age</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;' >Address</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Date of Birth</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Qualification</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Email</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>"; echo "<td style='border: 1px solid #ddd; padding: 8px; '>" . $row['member_id'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; '>" . $row['Username'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;' >" . $row['Age'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; ' >" . $row['Address'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;' >" . $row['Date_of_Birth'] . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; '>" . $row['Qualification'] . "</td>";
       
        echo "<td style='border: 1px solid #ddd; padding: 8px; '>" . $row['email'] . "</td>";
        echo "</tr>";
    }


    echo "</table>";
} else {
    
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
echo "</div>";echo "<header>";
echo " <h1>For other queries,Contact</h1>";
    
echo " <p>Nisha B - 9876545567</p>";
echo "  <p>Nithish kumar B - 9876546567</p>";
    
echo "</header>";
?>
