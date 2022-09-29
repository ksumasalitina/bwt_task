<?php /* @var $data */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style><?php include 'style/app.css'?></style>
    <title>Главная</title>
</head>
<!--Подключение шапки страницы-->
<header><?php include_once 'layout/header.php'; ?></header>

<body>
<!--Заголовок-->
<div>
    <h1 class="h-home">List of meetings</h1>
</div>
<!--Таблица со всеми конференциями-->
<table class="table table-width table-striped"">
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="color">#</th>
        <th scope="col">Title</th>
        <th scope="col">Date</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $el): ?>
    <tr>
        <th scope="row" width="15%"><?= $el['id'] ?></th>
        <td><?= $el['title']; ?></td>
        <td><?= date('d/m/Y', strtotime($el['date'])); ?>,
            <b><?= date('H:m', strtotime($el['date'])); ?></b></td>
        <td width="20%">
            <!--Кнопка для просмотра информации -->
            <form action="/details" method="get" class="f-inline">
                <input type="hidden" value="<?= $el['id']?>" name="id">
                <button class="btn btn-info">Details</button>
            </form>

            <!--Кнопка для изменения конференции-->
            <form action="/change_page" method="get" class="f-inline">
                <input type="hidden" value="<?= $el['id']?>" name="id">
                <button class="btn btn-warning" href="#">Modify</button>
            </form>

            <!--Кнопка для удаления конференции-->
            <form action="/delete" method="post" class="f-inline">
                <input type="hidden" value="<?= $el['id']?>" name="id">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
<!--Подключение футера страницы-->
<footer><?php include_once 'layout/footer.php'; ?></footer>
</html>


