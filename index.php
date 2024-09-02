<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style2.css">

    <title>Welcome</title>
</head>

<body>
    <div class="welcome">
      
    </div>
    <BR></BR>
    
    <div class="x">
        
        <a href="javascript:void(0);" onclick="openSecretKeyDialog()" class="btn btn-success btn-large text-align-center">Log in as ADMIN</a>
    </div>
    <div class="x">
        <a href="login_student.php" class="btn btn-success btn-large text-align-center">Log in as Student</a>
    </div>

    <script>
        function openSecretKeyDialog() {
            var secretKey = prompt("Enter the secret key to log in as ADMIN:");
            if (secretKey !== null) {
                if (secretKey === "IIITG") {
                    window.location.href = "login_admin.php";
                } else {
                    alert("Incorrect secret key. Access denied.");
                }
            }
        }
    </script>
</body>

</html>


