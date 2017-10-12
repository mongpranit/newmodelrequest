<?php

namespace app\controllers;

use Yii;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\ForbiddenHttpException;         //RBAC ROLE

use app\models\User;                        //For set permission
use yii\filters\AccessControl;              //For set permission
use \app\component\AccessRule;              //For set permission


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                             Users::ROLE_MANAGER,
                             Users::ROLE_ADMIN,
                             //User::ROLE_USER,
                         ],
                     ],
                     [
                         //กำหนดสิทธิ์ User ที่สามารถเข้าดูข้อมูลได้ในหน้า index,view ได้เท่านั้น
                         'actions' => ['view','update'],
                         'allow' => true,
                         'roles' => [
                             Users::ROLE_USER,
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProfile($id){
      return $this->render('profile',[
        'model'=>$this->findModel($id),
      ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User(['scenario' => 'signup']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionChange_password(){
        $user=Yii::$app->user->identity;

        //Validate for normal request-------------
        if($user->load(Yii::$app->request->post()) && $user->validate()){
            $user->password=$user->newPassword;

            //Save, Set Message, and Refresh page---------------
            $user->save(false);

            Yii::$app->getSession()->setFlash('success',['body'=>'You have successfully change your password','options'=>['class'=>'alert-success']]);
            return $this->refresh();
            //return $this->redirect(['index']);
        }

        return $this->render("change_password",[
            'user'=>$user,
        ]);
    }//End***

    //FOR RESET PASSWORD============================
    public function actionReset_password(){
        $user=Yii::$app->user->identity;

        if($user->load(Yii::$app->request->post())){
            //$user->password='999999';                   //Reset Password
            $newPassword=date("dhis");                    //Create Temporary password
            $user->password=$newPassword;

            if($user->save(false)){
                //Prepare Send mail---------------
                    $to='jittipong.m@gmail.com';
                    $subject='YSS Reset Password';
                    $textBody='';
                    $htmlBody='รหัสผ่านชั่วคราวคือ '.$newPassword.'  Your email is:'.$user->email;
                    $htmlBody.='<br/>เพื่อความปลอดภัย กรุณาเปลี่ยนรหัสผ่านหลังจากทำการ Login เข้าใช้งานแล้ว';
                    $htmlBody.="<br/><a href='http://www.yss.co.th/modelrequest/web/index.php' target='bank'>Login</a>";
                    $this->sendMail($to, $subject, $textBody, $htmlBody);       //Call function Sendmail***
                //End-----------------------------

                Yii::$app->getSession()->setFlash('success',['body'=>'You have successfully reset your password','options'=>['class'=>'alert-success']]);
                return $this->refresh();
            }
        }

        return $this->render("reset_password",[
            'user'=>$user,
        ]);
    }//End***

    //Function For Send mail---------------------
    public function sendMail($to,$subject,$textBody,$htmlBody){
        Yii::$app->mailer->compose()
        ->setFrom('info@yss.co.th')
        ->setTo($to)
        ->setSubject($subject)
        ->setTextBody($textBody)
        ->setHtmlBody($htmlBody)
        ->send();
    }


    //Test send mail-----------------------
    public function actionTest_mail(){
        Yii::$app->mailer->compose()
        ->setFrom('info@yss.co.th')
        ->setTo('jittipong.m@gmail.com')
        ->setSubject('Test mail by Yii2')
        ->setTextBody('Plain text content')
        ->setHtmlBody('<b>HTML content</b>')
        ->send();
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
