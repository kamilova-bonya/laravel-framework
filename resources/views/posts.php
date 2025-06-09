<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Посты</title>
</head>
<body>
<a href="/">Главная</a>
<a href="/posts">Посты</a><br>
<b>Все посты</b>
<?php foreach ($posts as $post): ?>
    <div>
        <a href="/posts/<?= $post['id'] ?>"><?= $post['title'] ?></a>
    </div>
<?php endforeach; ?>
</body>
</html>
