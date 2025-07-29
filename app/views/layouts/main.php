<!DOCTYPE html>
<html>
<head>
    <title>My Mini Project</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

    <header>
        <h1>Welcome to My Project</h1>
        <nav>
            <a href="/">Home</a> |
            <a href="/register">Register</a> |
            <a href="/login">Login</a>
        </nav>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Mini Project</p>
    </footer>

</body>
</html>

