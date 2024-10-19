<!-- views/layouts/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/6j9qkk1oxn45icybpvz5ocbsnffpbi6839pwkjq06eveinek/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea#tiny',
        plugins: [
        'a11ychecker','advlist','advcode','advtable','autolink','checklist','markdown',
        'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
        'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify |' +
            'bullist numlist checklist outdent indent | removeformat | code table help'
      });
      tinymce.init({
        selector: 'textarea#tiny_introduce',
        plugins: [
        'a11ychecker','advlist','advcode','advtable','autolink','checklist','markdown',
        'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
        'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify |' +
            'bullist numlist checklist outdent indent | removeformat | code table help'
      })
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">khosonvinhlong</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=product&action=index">Sản phẫm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=category&action=index">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=contact&action=index">Danh sách liên hệ</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['username'])): ?>
                <span class="navbar-text">
                    Welcome, <?= $_SESSION['username']; ?>
                </span>
                <a class="nav-link" href="index.php?controller=auth&action=logout">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="index.php?controller=auth&action=login">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container py-5">
