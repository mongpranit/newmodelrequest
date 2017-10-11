<?php
namespace app\component;
use models\Users;

class AccessRule extends \yii\filters\AccessRule{
    protected function matchRole($users){
        if(empty($this->roles)){
            return true;
        }
        
        foreach($this->roles as $role){
             if($role==='?'){
                if($users->getIsGuest()){
                    return true;
                }
            }elseif($role==='@'){
               if(!$users->getIsGuest()){
                   return true;
               }
            }elseif(!$users->getIsGuest() && $role===$users->identity->roles){
                return true;
            }
        }
        
        return false;
    }
}

