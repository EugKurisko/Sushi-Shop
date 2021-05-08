<?php

namespace app\controllers;

use app\models\Good;
use app\models\Cart;
use app\models\Order;
use app\models\OrderGood;
use yii;
use yii\helpers\Url;
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

    public function actionClear()
    {
        $session = Yii::$app->session; //get session
        $session->open();
        $session->remove('cart');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');
        return $this->renderPartial('cart', compact('session'));
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session; //get session
        $session->open();
        $cart = new Cart();
        $cart->recalcCart($id);
        return $this->renderPartial('cart', compact('session'));
    }

    public function actionOrder()
    {
        $session = Yii::$app->session; //get session
        $session->open();
        if (!$session['cart.totalSum']) {
            $url = "http://localhost/Shop/web/";
            return Yii::$app->response->redirect(Url::to($url));
        }
        $order = new Order();
        if ($order->load(Yii::$app->request->post())) //if order loaded with post
        {
            $order->date = date('Y-m-d H:i:s'); //write date and total sum
            $order->sum = $session['cart.totalSum'];
            if ($order->save()) { //if saved then clear session(cart) for user
                $currentId = $order->id;
                $this->saveOrderInfo($session['cart'], $currentId); //func will write data to db tables
                Yii::$app->mailer->compose('order-mail', ['session' => $session, 'order' => $order]);
                Yii::$app->mailer->compose()->setFrom(['a@a' => 'test'])->setTo($order->email)->setSubject('Ваш заказ принят')->send();
                $session->remove('cart');
                $session->remove('cart.totalQuantity');
                $session->remove('cart.totalSum');
                return $this->render('success', compact('currentId', 'session'));
            }
        }
        $this->layout = 'empty-layout';
        return $this->render('order', compact('session', 'order'));
    }

    protected function saveOrderInfo($goods, $orderId)
    {
        foreach ($goods as $id => $good) {
            $orderInfo = new OrderGood();
            $orderInfo->order_id = $orderId;
            $orderInfo->product_id = $id;
            $orderInfo->name = $good['name'];
            $orderInfo->price = $good['price'];
            $orderInfo->quantity = $good['quantity'];
            $orderInfo->sum = $good['quantity'] * $good['price'];
            $orderInfo->save();
        }
    }
}
