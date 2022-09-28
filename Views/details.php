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

<header><?php include_once 'layout/header.php'; ?></header>

<body>
<div class="cent-box">
    <?php foreach ($data as $el):?>
    <h1 class="h-home"><?= $el['title']; ?></h1>
    <hr>
    <div class="ml">
        <h4 class="f-inline"><em>Date: </h4></em>
        <p class="f-inline"><?=date('d/m/Y', strtotime($el['date'])); ?></p>
    </div>
    <div class="ml">
        <h4 class="f-inline"><em>Time: </h4></em>
        <p class="f-inline"><?=date('H:m', strtotime($el['date'])); ?></p>
    </div>
    <hr>
    <div class="ml">
        <h4 class="f-inline"><em>Address: </em></h4>
        <p class="f-inline"><?=$el['latitude']?>, <?= $el['longitude']?></p>
    </div>
    <input id="lat" type="hidden" value="<?=$el['latitude']?>">
    <input id="lng" type="hidden" value="<?=$el['longitude']?>">
    <div class="ml adr">
        <h4 class="f-inline"><em>Country: </em></h4>
        <p class="f-inline"><?=$el['country']?></p>
    </div>
    <div id="map">
    </div>
    <hr>
    <div class="center-btn">
        <form action="/change_page" method="get" class="f-inline">
            <input type="hidden" value="<?=$el['id']?>" name="id">
            <button class="btn btn-warning">Modify</button>
        </form>

        <form action="/delete" method="post" class="f-inline">
            <input type="hidden" value="<?=$el['id']?>" name="id">
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
<?php endforeach;?>

<script><?php require_once 'style/app.js'?></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-f9lZuh5R8fiXj5SRBETYEeWEdNwSUlE&callback=initMap"
        async defer>
</script>
</body>

<footer><?php include_once 'layout/footer.php'; ?></footer>
</html>
