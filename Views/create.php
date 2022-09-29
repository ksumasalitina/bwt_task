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
<!--Подключение шапки страницы-->
<header><?php include_once 'layout/header.php'; ?></header>

<body>
<div class="cent-box">
    <h1 class="h-home">Create the meeting</h1><hr>
    <!--Форма для внесения данных-->
    <form action="/create" method="post">
        <!--Поле для title-->
            <div>
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter the title..." name="title"
                       value="" minlength="2" maxlength="255" required>
                <span id="title_error" class="alert alert-danger dspl-none">Title invalid</span>
            </div>
        <!--Поле для date-->
            <div class="mt-3">
                <label for="title">Date</label>
                <input type="text" id="input" class="form-control" name="date"
                       value="<?=date('d.m.Y H:m'); ?>" required>
                <span id="date_error" ></span>
            </div><hr>
        <!--Сектор address-->
        <div>
            <p><em><b>Address:</b></em></p>
            <!--Поле для country-->
            <label for="country">Country</label>
            <input type="text" value="" class="form-control" name="country" placeholder="Choose the country..." list="countries" required>
            <?php include_once 'layout/countries_dataset.html'?>
            <div class="row mt-3">
                <!--Поле для latitude-->
                <div class="col-md-6 mb-3">
                    <label for="lat">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="latitude"
                           value="0" required>
                </div>
                <!--Поле для longitude-->
                <div class="col-md-6 mb-3">
                    <label for="lng">Longitude</label>
                    <input type="text" class="form-control" id="lng" name="longitude" value="0" required>
                </div>
            </div>
            <!--Карта-->
            <div id="map"></div>
        </div>
        <hr>
        <div class="mt-3 center-btn">
            <!--Кнопка для возврата на главную страницу-->
            <a class="btn btn-info f-inline" href="/">Back</a>
            <!--Кнопка для отправки данных-->
            <button type="submit" id="save" class="btn btn-warning" disabled>Save</button>
        </div>
    </form>
</div>

<!--Подключеие js файла, карты и календаря-->
<script><?php require_once 'style/app.js'?></script>
<script><?php require_once 'style/datepicker/air-datepicker.js'?></script>
<script>
    new AirDatepicker('#input',{
        timepicker: true,
        position: 'bottom center',
        minDate: [new Date()]
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-f9lZuh5R8fiXj5SRBETYEeWEdNwSUlE&callback=initMapChange"
        async defer>
</script>
</body>

<footer><?php include_once 'layout/footer.php'; ?></footer>
</html>
