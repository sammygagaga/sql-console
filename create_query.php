<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание запроса</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
require_once __DIR__ . '/components/navbar.php'
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mt-5">Добавить запрос</h2>
    <form id="createForm" method="post" action="app/create_queries.php">
        <div class="form-group">
            <label for="createName">Название запроса</label>
            <input type='hidden' name='userId' value='1' />
            <input type="text" class="form-control form-control-sm" id="createName" name="queryName" required>
        </div>
        <div class="form-group">
            <label for="createText">Текст запроса</label>
            <textarea class="form-control form-control-sm" id="createText" name="queryText" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Создать</button>
    </form>
        </div>
    </div>
</div>
</body>
</html>
