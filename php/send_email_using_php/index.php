<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">About</a></li>
            <li><a href="index.php">Contact</a></li>
        </ul>
    </nav>

    <section>
        <div>
            <form action="upload.php" method="POST">
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" placeholder="message"></textarea>
                <button type="submit" name="submit">SUBMIT</button>
            </form>
        </div>
    </section>
</body>
</html>