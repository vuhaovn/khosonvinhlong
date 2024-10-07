<!-- views/auth/register.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container py-5">
        <h1>Register</h1>
        <?php if (isset($error) && !empty($error)): ?>
            <div class="alert alert-danger">
                <?= $error; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="index.php?controller=auth&action=handleRegister">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <!-- Select role (user/admin) -->
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
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