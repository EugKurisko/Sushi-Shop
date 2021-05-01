<?php

use yii\helpers\Url;
?>

<div class="container">
    <nav class="nav nav-menu">
        <a class="nav-link active" href="<?php echo Yii::$app->request->baseUrl ?>" . "../category/index.php">Всё меню</a>
        <?php foreach ($data as $cat) : ?>
            <a class="nav-link" href="<?= URL::to(['category/view', 'category' => $cat['cat_name']]) ?>"><?= $cat['browser_name'] ?></a>
        <?php endforeach; ?>
    </nav>
</div>