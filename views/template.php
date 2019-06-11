<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> <?= $title ?></title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" rel="stylesheet">
    </head>
    
    <body class="bg-dark text-light">
        <header class="navbar navbar-dark bg-primary">
            <h1 class="text-light">Devinettes API</h1>
        </header>
        <div class="container">
            <?= $content ?>
        </div>
    </body>
</html>