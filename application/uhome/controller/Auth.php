<?php 
namespace app\uhome\controller;
use app\uhome\controller\uhomeBase;
use app\common\model\User;
class Auth extends uhomeBase
{
   
    public function login()
    {
       
        return view("login");
    }
    public function regedit()
    {
        $view_var = [];
        if(input("get.button")){
            $data = [];
            $data["email"]=input('get.email');
            $data["password"]=input('get.password');
            
            $result = $this->validate($data,'UserValidate');//验证数据是否正确
            if(true !== $result){
                
                $view_var["tip"] = $result;
            }else{
                // 验证通过
                $password_confirmation = input('get.password_confirmation');
                if($password_confirmation!=$data["password"]){
                    $view_var["tip"] = "两次输入的密码不一致";
                }else{
                    $UserM = new User();
                    $UserM->addAll($data);
                }
                //dump($result);
                
            }
        }
        return view("regedit",$view_var);
    }
}
