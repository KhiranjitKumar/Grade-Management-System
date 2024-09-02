<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['rollno'])) {
    header("Location: student_dashboard.php");
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$password = md5($_POST['password']);
	$year = $_POST['year'];
	$semester = $_POST['semester'];

	$sql = "SELECT * FROM student_info WHERE name='$name' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['rollno'] = $row['rollno'];
		$_SESSION['year'] = $row['year'];
		$_SESSION['semester'] = $row['semester'];
		header("Location: student_dashboard.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="name" placeholder="name" name="name" value="<?php echo $name; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="year" placeholder="year" name="year" value="<?php echo $_POST['year']; ?>" required>
			</div>
			<div class="input-group">
				<input type="semester" placeholder="semester" name="semester" value="<?php echo $_POST['semester']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			
		</form>
	</div>
</body>
</html>