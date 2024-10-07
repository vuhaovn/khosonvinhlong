<!-- views/auth/login.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container py-5">
        <h1>Login</h1>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form method="POST" action="index.php?controller=auth&action=handleLogin">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <!-- <a class="btn btn-danger mt-3" href="index.php?controller=auth&action=register">Nếu chưa có tài khoản thì đăng ký</a> -->
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">&copy; 2024 khosonvinhlong. All rights reserved.</span>
        </div>
    </footer>

    <!-- Optionally include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>