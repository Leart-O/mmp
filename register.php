<?php  include 'includes/db.php'; session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-contetnt-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center">Register</h2>

                        <?php 
                        if ($_SERVER['REQUEST_METHOD']=='POST') {
                            $name = $_POST['name'];
                            $email =$_POST['email'];
                            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                             $sql = "INSERT INTO users(username, email, password) VALUE(?, ?, ?)";
                             $stmt = $pdo->prepare($sql);
                             $stmt->bindParam('sss', $name, $email, $password);
                             if($stmt->execute){
                                echo "<div>Registration Succesful <a href='login.php'>Log In Here</a></div>";
                             }else{
                                echo"<div class='alert alert-danger'>Error" .$stmt->error."</div>";
                             }
                        }
                        ?>
                        
                    <form method="post">
                        <div class="mb-3">
                             <label for="name" class="form-label">Name</label>
                             <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="mb-3">
                             <label for="email" class="form-label">Email</label>
                             <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="mb-3">
                             <label for="password" class="form-label">password</label>
                             <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>