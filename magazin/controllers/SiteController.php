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

class SiteController  extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionHello()
    {

        $array=MyList::getAll();
     return $this->render('hello',['arrayInView'=>$array]);
    }
public function  actionView($id)
{
    $one = MyList::getOne($id);
    return $this->render('view', ['one' => $one]);

}
    public function actionSignup(){
        $model= new Signup();

        if(isset($_POST['Signup']))
        {
          $model->attributes= Yii::$app->request->post('Signup');

          if($model-> validate() && $model-> signup())
          {
              return $this->goHome();
          }
        }
        return $this->render('signup',['model'=>$model]);
    }

    public function actionLogin()
    {
        $login_model = new Login();
        if (Yii::$app->request->post('Login'))
        {
          $login_model->attributes=Yii::$app->request->post('Login');

          if ($login_model->validate())
          {
              Yii::$app->user->login($login_model->getUser());
              return $this->goHome();
          }
        }
        return $this->render('login',['login_model'=>$login_model]);
    }

}
