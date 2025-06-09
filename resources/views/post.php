<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $post['title'] ?></title>
</head>
<body>
<a href="/">Главная</a>
<a href="/posts">Посты</a><br>
<b><?= $post['title'] ?></b>
<div>
    <?= $post['content'] ?>
</div>
</body>
</html>
