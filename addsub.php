<?php
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	error_reporting(0);
	$obDBRel->redirect();
	
	//Connecting to DB
	$conn = $obDBRel->DBconn();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		//Obtaining values from Form
		$sub=$_POST['subject'];

		//Inserting values to Subject Table
		if($sub=="")
			echo "<script> alert('Enter a subject.'); </script>";
		else{
			$sql="INSERT INTO Subject VALUES (NULL,'$sub')";
			if ($conn->query($sql) === TRUE)
				echo "<script> alert('Subject Added!'); </script>";
			else
				echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	//Saving Resource
	$conn->close();
?>
<!DOCTYPE html>
	<head>
		<title>Add Subject - Admin</title>
		<link rel="stylesheet" type="text/css" href="addsub.css">
	</head>
	<body>
		<header>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Add a Subject:</h1>
			<form action=addsub.php method=post>
				<div class=input>
					<input type=text  name=subject placeholder="Subject Name" required>
					<button type=submit>Append</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$sql="Select * from feedback order by Sub_No asc";
						$result = $conn->query($sql);

						echo "<table class=slist>";
						echo "<tr>";
						echo 	"<th>Subject ID</td>";
						echo 	"<th>Subject Name</td>";
						echo "</tr>";

						if($result->num_rows > 0)
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $row["Sub_No"] . "</td>";
								echo 	"<td>" . $row["Sub_Name"] . "</td>";
								echo "</tr>";
						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>