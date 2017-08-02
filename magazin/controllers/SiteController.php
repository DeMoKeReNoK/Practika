<?php

namespace app\controllers;

use app\models\Signup;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\MyList;
use app\models\Login;
use app\models\Orders;
use app\models\UploadForm;
use yii\web\UploadedFile;
session_start();

class SiteController  extends Controller

{

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionHello()
    {
        //ссылки на полное описание товаров
        $array = MyList::getAll();
        return $this->render('hello', ['arrayInView' => $array,]);
    }


    public function actionView($id)
    {
        //полное описание товара
        $one = MyList::getOne($id);
        return $this->render('view', ['one' => $one]);
    }

    public function actionSignup()
    {
        $model = new Signup();

        if (isset($_POST['Signup'])) {
            $model->attributes = Yii::$app->request->post('Signup');

            if ($model->validate() && $model->signup()) {
                return $this->goHome();
            }
        }
        return $this->render('signup', ['model' => $model]);
    }

    public function actionLogin()
    {
        $login_model = new Login();
        if (Yii::$app->request->post('Login')) {
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate()) {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();

            }
        }
        return $this->render('login', ['login_model' => $login_model]);

    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }


    public function actionCart()
    {


        //добавление в корзину
        if (isset($_GET['product_id'])) {
            if (!is_array($_SESSION['cart'])) $_SESSION['cart'] = array();
            $_SESSION['cart'][(int)$_GET['product_id']] = $_GET['product_id'];

        }



        //удаление из корзины
        if (isset($_GET['remove_id'])) {
            unset($_SESSION['cart'][(int)$_GET['remove_id']]);
        }


        //корзина
        $cart = array();
        foreach ($_SESSION['cart'] as $id) {
            $cart[$id] = MyList::getOne($id);
        }

        return $this->render('cart', ['cart' => $cart]);
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                return $this->goHome();
            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionOrders()
    {
        //форма заказов товаров
        $order_model = new Orders;


            return $this->render('orders', ['order_model' => $order_model]);

        }


}