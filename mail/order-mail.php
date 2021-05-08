<h1>Ваш заказ под номером <?= $order->id ?> принят</h1>
Ваш телефон: <?= $order->phone ?>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <th> Наименование
            </th>
            <th> Количество
            </th>
            <th> Цена
            </th>
            <th> Сумма
            </th>
        </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id => $item) : ?>
                <tr>
                    <td>
                        <?= $item['name'] ?>
                    </td>
                    <td>
                        <?= $item['quantity'] ?>
                    </td>
                    <td>
                        <?= $item['price'] ?>
                    </td>
                    <td>
                        <?= $item['price'] * $item['quantity'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Итого</td>
                <td><?= $session['cart.totalQuantity'] ?></td>
            </tr>
            <tr>
                <td colspan="3">На сумму</td>
                <td><?= $session['cart.totalSum'] ?> гривен</td>
            </tr>
        </tbody>
    </table>
</div>