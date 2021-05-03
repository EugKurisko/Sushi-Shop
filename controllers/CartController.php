<?php

namespace app\controllers;

use app\models\Good;
use app\models\Cart;
use yii;
use yii\web\Controller;

class CartController extends Controller
{

    public function actionOpen()
    {
        $session = Yii::$app->session; //get session
        $session->open();
        //$session->remove('cart');
        return $this->renderPartial('cart', compact('session'));
    }

    public function actionAdd($name)
    {
        $good = new Good();
        $good = $good->getOneGood($name);
        $session = Yii::$app->session; //get session
        $session->open();
        //$session->remove('cart');
        $cart = new Cart();
        $cart->addToCart($good);
        return $this->renderPartial('cart', compact('good', 'session')); //renders without menu template
    }
}
