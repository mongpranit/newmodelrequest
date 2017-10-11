<?php
namespace app\models;
use yii\base\Model;
use Yii;

class PasswordResetRequestForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => Users::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    
    
    public function sendEmail2(){
        /* @var $user User */
        $user = Users::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!Users::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($this->email)
                    ->setSubject('Password reset for ' . \Yii::$app->name)
                    ->send();
            }

        return false;
    }//end***
    }
    
    public function sendEmail(){
        /* @var $user User */
        $user = Users::findOne([
            'status' => Users::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user){
                        //Prepare Send mail---------------
                            //$newPassword='999999';                          //Reset Password
                            $newPassword=date("dhis");                        //Create Temporary password 
                            $user->password=$newPassword;
                            
                    if($user->save(false)){
                            //$to='jittipong.m@gmail.com';
                            $adminMail=\Yii::$app->params['adminEmail'];      //Get admin mail in config/params.php
                            $to=$user->email;
                            $subject='YSS Reset Password';
                            $textBody='';
                            $htmlBody='รหัสผ่านชั่วคราวคือ '.$newPassword.'  Your email is:'.$user->email;
                            $htmlBody.='<br/>เพื่อความปลอดภัย กรุณาเปลี่ยนรหัสผ่านหลังจากทำการ Login เข้าใช้งานแล้ว';
                            $htmlBody.="<br/><a href='http://www.yss.co.th/backend/web/index.php' target='bank'>Login</a>";
                            //$user->sendMail($to, $subject, $textBody, $htmlBody);       //Call function Sendmail***
                            
                            return Yii::$app->mailer->compose()
                            ->setFrom($adminMail)
                            ->setTo($to)
                            ->setSubject($subject)
                            ->setTextBody($textBody)
                            ->setHtmlBody($htmlBody)
                            ->send();
                        //End-----------------------------
                    }
                
                return false;
        }
    }
}