<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Vehicledata;
use app\models\VehicledataSearch;

use app\models\SignupForm;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;

use app\models\User;           //For set Permission & Access Control
use yii\filters\AccessControl;  //For set Permission & Access Control
use app\component\AccessRule;   //For set Permission & Access Control
use yii\base\Security;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(){
       return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig'=>[
                  'class'=>AccessRule::className(),
                ],
                'only' => ['create', 'update', 'delete','index','view'],
                'rules' => [
                    [
                        //กำหนด User ที่สามารถทำการ Create,Update,Delete ได้
                        'actions' => ['create','update','delete','index','view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_MANAGER,
                            User::ROLE_ADMIN,
                            //User::ROLE_USER,
                        ],
                    ],
                    [
                        //กำหนดสิทธิ์ User ที่สามารถเข้าดูข้อมูลได้ในหน้า index,view ได้เท่านั้น
                        'actions' => ['view','update'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_USER,
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }//End***

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

     //USER CHEK PERMISSION********
    public function checkPermission(){
        //USER PROTECTED==========================================
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('error', 'You must login.');
            return $this->redirect(['site/login']);
        }
         //END USER PROTECTED=====================================
    }//end***

    //FUNCTION FOR CHECK PERMISSION BY SEGMENT=========
    public function checkSegmentAccess($segment,$role){
        /*if(!Yii::$app->user->can($system)){
            throw new ForbiddenHttpException("ขออภัย! คุณไม่มีสิทธิ์เข้าถึงระบบนี้");
        }*/

        //===========ตรวจสอบสิทธิ์การเข้าถึงระบบ==============
        //ถ้า role == 30 สามารถเข้าได้เพราะเป็น administrator
        //ถ้า role !=30 ให้ตรวจสอบก่อนว่า User มี Secment ตรงกับที่กำหนดรึเปล่าถ้าตรงให้รีไดเร็กไปหน้าที่กำหนด
        //=============================================

        if($role!=30){
            if($segment=='hr'){
                return $this->redirect(['jobs/index']);
            }
            if($segment=='product'){
                return $this->redirect(['product/index']);
            }
        }
    }//End**


    /**
     * Displays homepage.
     *
     * @return string
     */
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

    public function actionIndex()
    {
        $searchModel = new VehicledataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'name'=>'Chittipong',
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionFormSubmission()
        {
            $security = new Security();
            $string = Yii::$app->request->post('string');
            $stringHash = '';
            if (!is_null($string)) {
                $stringHash = $security->generatePasswordHash($string);
            }
            return $this->render('form-submission', [
                'stringHash' => $stringHash,
            ]);
        }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
