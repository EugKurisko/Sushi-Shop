<?php

use yii\helpers\Url;
?>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-8 justify-self-center">
            <h2>
                <div class="product-title"><?= $good['name'] ?></div>
            </h2>
            <div class="product">
                <div class="product-img">
                    <img src="<?php echo Yii::$app->request->baseUrl ?>/img/<?= $good['img'] ?>" alt="<?= $good['name'] ?>">
                </div>
                <div class="product-name"><?= $good['name'] ?></div>
                <div class="product-descr"><?= $good['composition'] ?></div>
                <div class="product-descr"><?= $good['descr'] ?></div>
                <div class="product-price">Цена: <?= $good['price'] ?> гривен</div>
                <div class="product-buttons">
                    <!-- <button type="button" class="product-button__add btn btn-success">Заказать</button> -->
                    <a href="<?= URL::to(['cart/cart', 'category' => $good['category']]) ?>" data-name="<?= $good['link_name'] ?>" type="button" class="product-button__add btn btn-success">Заказать</a>
                </div>
            </div>
        </div>
    </div>
</div>