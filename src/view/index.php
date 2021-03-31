<?php

namespace greenbook\view;

require_once __DIR__ . '\..\controller\MainController.php';
require_once __DIR__ . '\..\..\vendor\autoload.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?= $title ?>
    </title>
</head>

<body>
<h1>
    <?= $message ?>
</h1>

</body>

</html>