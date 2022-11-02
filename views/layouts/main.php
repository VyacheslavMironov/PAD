<?php

/* @var $this \yii\\web\View */
/* @var $content string */

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    $this->registerCsrfMetaTags() ?>
    <title>Электронный журнал - PAD</title>
    <?php
    $this->head() ?>
</head>
<body>
<?php
$this->beginBody() ?>
<div id="app"></div>
<?php
$this->endBody() ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
<?php
$this->endPage() ?>