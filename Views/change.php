<?php /* @var $data */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style><?php include 'style/datepicker/air-datepicker.css'?></style>
    <style><?php include 'style/app.css'?></style>
    <title>Главная</title>
</head>

<header><?php include_once 'layout/header.php'; ?></header>

<body>
<div class="cent-box">
    <h1 class="h-home">Modify the meeting</h1>
    <hr>
    <form action="change" method="post">
        <?php foreach ($data as $el): ?>
        <div>
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                   value="<?= $el['title']?>" minlength="2" maxlength="255" required>
        </div>
        <div class="mt-3">
            <label for="title">Date</label>
             <input type="text" id="input" class="form-control" name="date" value="<?=date('d.m.Y H:m', strtotime($el['date'])); ?>">
        </div>
        <?php endforeach; ?>
    </form>
</div>

<script><?php require_once 'style/app.js'?></script>
<script><?php require_once 'style/datepicker/air-datepicker.js'?></script>
<script>
    new AirDatepicker('#input',{
        timepicker: true,
        position: 'bottom center'
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-f9lZuh5R8fiXj5SRBETYEeWEdNwSUlE&callback=initMap"
        async defer>
</script>
</body>

<footer><?php include_once 'layout/footer.php'; ?></footer>
</html>

