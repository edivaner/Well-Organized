<?php
    include_once 'Tarefa.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // echo "<pre>";
        //     $model = new Tarefa(1, "descrevendo", "#000");
        //     print_r($model);
        // echo "</pre>";

        echo "<div>";
            $model = new Tarefa(100, "descrevendo", "#000");
            echo $model;
        echo "</div>";
    ?>
    
</body>
</html>