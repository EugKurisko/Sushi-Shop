<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($good)
    {
        if (isset($_SESSION['cart'][$good->id])) {
            $_SESSION['cart'][$good->id]['quantity'] += 1;
        } else
        //$_SESSION['cart'] += 1;
        {
            $_SESSION['cart'][$good->id] = [
                'name' => $good['name'],
                'quantity' => 1,
                'price' => $good['price'],
                'img' => $good['img']
            ];
        }
    }
}
