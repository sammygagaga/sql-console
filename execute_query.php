<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма запроса</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
require_once __DIR__ . '/components/navbar.php';
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form style="margin: 20px" method="post">
                <div class="form-group">
                    <label for="querySelect">Выбор запроса</label>
                    <select class="form-control" id="querySelect">
                        <option value="">Выберите запрос</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="queryText">Текст запроса (только чтение)</label>
                    <textarea class="form-control" id="queryText" rows="3" readonly></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="executeButton">Выполнить</button>
                <div class="form-group mt-3">
                    <label for="resultText">Результат запроса</label>
                    <textarea class="form-control" id="resultText" rows="5" readonly></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: 'app/name_queries.php',
            type: 'GET',
            dataType: 'json',
            success: function (queries) {
                let options = '';
                queries.forEach(function (query) {
                    options += `<option value="${query.query_name}">${query.query_name}</option>`;
                });
                $('#querySelect').html(options);

                $('#querySelect').trigger('change');
            },
            error: function(error) {
                console.error("Ошибка AJAX запроса:", error);
                $('#resultText').val('Ошибка при получении SQL-операций.');
            }
        });
        $('#querySelect').change(function () {
            const selectedQuery = $(this).val();
            if (selectedQuery) {
                $.ajax({
                    url: 'app/get_query.php',
                    type: 'POST',
                    data: { query: selectedQuery },
                    success: function(response) {
                        $('#queryText').val(response);
                    },
                    error: function(error) {
                        console.error("Ошибка AJAX запроса:", error);
                        $('#resultText').val('Ошибка при получении запроса.');
                    }
                });
            }
        });
        $('#executeButton').click(function () {
            const query = $('#queryText').val();
            if (query) {
                $('#resultText').val(query);
            } else {
                $('#resultText').val('Нет текста запроса для выполнения.');
            }
        });
    });
</script>
</body>
</html>
