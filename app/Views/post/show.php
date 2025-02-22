<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" description="width=device-width, initial-scale=1.0">
    <title>Post show</title>
</head>

<body>
    <h1> <?php echo $post['title'] ?></h1>
    <p> <?php echo $post['description'] ?> </p>
    <br>
    <a href="/post/index">Back to Post List</a>
</body>

</html>