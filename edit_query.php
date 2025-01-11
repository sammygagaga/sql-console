<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование запроса</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
require_once __DIR__ . '/components/navbar.php';
require_once __DIR__ . '/app/edit_queries.php';

?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mt-5">Редактировать запрос</h2>
    <form id="createForm" method="post">
        <div class="form-group">
            <?php foreach ($queries as $query): ?>
            <label for="createText">Текст запроса</label>
            <input type='hidden' name='queryId' value='<?php echo $query['id'] ?>' />
            <textarea class="form-control form-control-sm" id="createText" name="queryText" rows="5" required><?php echo $query['query_text'] ?></textarea>

        </div>
        <button type="submit" class="btn btn-primary btn-sm">Обновить</button>
    </form>
            <form action="/app/delete_queries.php" method="post">
                <input type="hidden" name="queryId" value="<?php echo $query['id']; ?>" />
                <button type="submit" class="btn btn-danger btn-sm mt-2">Удалить</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>
</html>
