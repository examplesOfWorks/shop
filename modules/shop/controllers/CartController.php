<?php

namespace app\modules\shop\controllers;

use Yii;
use yii\web\Controller;
use app\models\Cart;
use yii\data\ArrayDataProvider;


class CartController extends Controller
{
    public function actionView()
    {
        if (Yii::$app->request->isPost) {

            $btn = Yii::$app->request->get('btn');
            $id = Yii::$app->request->get('id');

            $url = '/shop/cart/view?';
            $res_js = null;
            $dataProvider = null;
            $btn_empty = true;

            if ($btn)
            {
                switch ($btn)
                {
                    case 'btn-add' : $res_js = Cart::addToCart($id); break;
                    case 'minus' : Cart::deleteFromCart($id); break;
                    case 'plus' : $res = Cart::addToCart($id); break;
                    case 'trash' : Cart::deleteFromCart($id, true); break;
                    case 'clear' : $res_js = Cart::clearCart(); break;
                }

                if (isset($res_js))
                {
                    return $this->asJson($res_js);
                }

            }

            $cart = Cart::getCart();

            if (!empty($cart['count']))
            {
                $dataProvider = new ArrayDataProvider(['allModels' => $cart['products']]);
            }


            return $this->renderAjax('view', compact('url', 'dataProvider', 'cart', 'btn_empty'));
        }
        
    }
    
}