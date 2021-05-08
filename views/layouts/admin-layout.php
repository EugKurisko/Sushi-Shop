<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAppAsset;
use yii\helpers\Url;

AdminAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <section class="body">
        <header>
            <div class="container">
                <div class="header">
                    <a href="<?php echo Yii::$app->request->baseUrl ?>" . "../category/index.php">На главную</a>
                    <a href="<?= Url::to(['admin/logout']) ?>">Выход из админки</a>
                    <!-- <a href="#" class="cart" onclick="openCart(event)">Корзина <span class="menu-quantity">(<?php if (isset($_SESSION['cart.totalQuantity'])) echo $_SESSION['cart.totalQuantity'];
                                                                                                                    else echo '0'; ?>)</span></a> -->
                    <form action="<?= URL::to(['category/search']) ?>" method="get">
                        <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
                    </form>
                </div>
            </div>
        </header>
        <div class="container">
            <?= $content ?>
        </div>
        <footer>
            <div class="container">
                <div class="footer">
                    &copy; Все права защищены или типа того
                </div>
            </div>
        </footer>
    </section>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>