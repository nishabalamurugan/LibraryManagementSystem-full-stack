<style>
header {
    background-color: #333;
    color: #fff;
    padding: 5px;
    text-align: center;
   
    
}
body{
 
 background-color:rgb(225, 225, 208);
}
h2{
   text-align:center;
   font-size: 40px;
   font-weight: bolder;
   font-style: italic;
}
.message {
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
    
  }</style>

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

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$conn = new mysqli($servername,
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
};

echo "<header>";
echo "<p>Enriching Minds, Empowering Readers</p>";
echo " <h1>LibraSys - Ultimate Library Management System </h1></p>";
echo "	<p>Empowering the World of Books</p>";
echo "</header>";

echo isset($_POST['submit']);
if( isset($_FILES['my_image']))
{
	 #print_r($_FILES['my_image']); 
	 $img_name=$_FILES['my_image']['name'];
	 $img_size=$_FILES['my_image']['size'];
	 $tmp_name=$_FILES['my_image']['tmp_name'];
	 $error=$_FILES['my_image']['error'];
	 if($error===0)
	 {
			
				$image_ex=pathinfo($img_name,PATHINFO_EXTENSION);
				$image_ex_lc=strtolower($image_ex);
				$allowed=array("jpg","jpeg","png");
				if(in_array($image_ex_lc,$allowed))
				{
					$new_img=uniqid("IMG_",true).'.'.$image_ex;
					$img_upload_path='uploads/'.$new_img;
					move_uploaded_file($tmp_name,$img_upload_path);
				}
				else
				{
					echo "<h2>You cannot upload files of this type</h2>";
					echo "<h2>Failed to upload Image ...</h2>";
					echo "<center><button onclick=home()>REDIRECT TO HOME PAGE</button></center>";
					echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
					echo "You will be automatically redirected to the Home page within &nbsp; <p id='counter'> 10</p>&nbsp;second(s)...</div>";
					
				}
			
	 }
	 else
	 {
			echo "<script>alert('error occurred')</script>";
			
	 }
}
else 
{
	echo "<h2>Failed to upload Image ...</h2>";
	
}



$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$subject = $_POST['subject'];
$dop = $_POST['dop'];





$copies = $_POST['copies'];

$sql = "INSERT INTO books   VALUES ('$id','$title','$author','$subject','$dop','$new_img','$copies')";

if (mysqli_query($conn, $sql)) {
  echo "<h2>Book details added successfully!!</h2>";
  echo "<center><button onclick=home()>REDIRECT TO HOME PAGE</button></center>";
  echo "<div id='content-container'><img id='redirect-image' src='loadinggif.gif' >";
echo "You will be automatically redirected to the Home page within &nbsp; <p id='counter'> 10</p>&nbsp;second(s)...</div>";
} 

else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



echo "<header><h1>For other queries,Contact</h1><p>Nisha B - 9876545567</p><p>Nithish kumar B - 9876546567</p></header><br><br><br></body></html>";

mysqli_close($conn);

?>
