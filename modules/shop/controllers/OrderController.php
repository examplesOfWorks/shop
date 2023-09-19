<?php

namespace app\modules\shop\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use app\models\Cart;
use app\models\Status;
use yii\web\Controller;
use app\models\OrderItem;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;
use app\models\LoginForm;
use yii\filters\AccessControl;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [   
                
                    'access' => [
                        'class' => AccessControl::class,
                        'rules' => [
                            [
                                'allow' => true,
                                'roles' => ['@'],
                                'matchCallback' => function ($rule, $action) {
                                    return !(Yii::$app->user->isGuest || Yii::$app->user->identity->isAdmin);
                                }
                            ],
                            [
                                'denyCallback' => function ($rule, $action) {
                                    $this->goHome();
                                }
                            ],
                        ],
                    ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $statuses = Status::getStatusName();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'statuses' => $statuses
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $orderItems = OrderItem::getItemsList($id);
        $dataProvider = new ArrayDataProvider(['allModels' => $orderItems]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'orderItems' => $orderItems,
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionCreate()
    {
        if ($cart = Cart::getCart()) {

            // $login = new LoginForm();

            // $login->login = Yii::$app->user->identity->login;

            $dataProvider = new ArrayDataProvider([
                'allModels' => $cart['products'],
                'pagination' => ['pageSize' => 4]]);

        }

        return $this->render('create', compact('dataProvider', 'cart'));
    }

    public function actionOrder()
    {

        if ($cart = Cart::getCart()) {

            $dataProvider = new ArrayDataProvider([
                'allModels' => $cart['products'],
                'pagination' => ['pageSize' => 4]]);

                $order = new Order();

                if ($order->orderCreate($cart)) {
                    if (OrderItem::orderItemCreate($cart, $order->id)) {
                        Yii::$app->session->remove('cart');
                        // Yii::$app->session->setFlash('success', 'Заказ успешно оформлен.');

                        return $this->redirect(['/shop/order/index']);  
                    }
                }
        }

    }
    

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
