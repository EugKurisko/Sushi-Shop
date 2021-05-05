<?php

use yii\helpers\Url;
?>
<div class="container">
    <h2 style="text-align: center;">Результаты поиска по запросу: "<?= $search ?>"</h2>
    <?php if (!$goods) : ?>
        <h4 style="text-align: center;">По запросу "<?= $search ?>" ничего не найдено</h4>
    <?php else : ?>
        <div class="row justify-content-center">
            <?php foreach ($goods as $good) : ?>
                <div class="col-4">
                    <div class="product">
                        <div class="product-img">
                            <img src="<?php echo Yii::$app->request->baseUrl ?>/img/<?= $good['img'] ?>" alt="<?= $good['name']; ?>">
                        </div>
                        <div class="product-name"><?= $good['name'] ?></div>
                        <div class="product-descr">Состав: <?= $good['composition'] ?></div>
                        <div class="product-price">Цена: <?= $good['price'] ?> гривен</div>
                        <div class="product-buttons">
                            <a href="<?= URL::to(['cart/cart']) ?>" data-name="<?= $good['link_name'] ?>" data-name="<?= $good['link_name'] ?>" type="button" class="product-button__add btn btn-success">Заказать</a>
                            <!-- <button type="button" class="product-button__add btn btn-success">Заказать</button> -->
                            <a href="<?= URL::to(['good/index', 'name' => $good['link_name']]) ?>" type="button" class="product-button__more btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>