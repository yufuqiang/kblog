<?php 
namespace app\common\validate;

use think\Validate;

class UserValidate extends Validate
{
    protected $rule = [
        'email'  =>  'require|email|max:30',
        'nickname' =>  'max:20',
        'password' =>  'require|min:6|max:20'
    ];
    
    protected $message = [
        'email.require'  =>  '邮箱不能为空',
        'email' => '邮箱格式错误',
        'password.require'  =>  '密码不能为空',
        'password.min'  =>  '密码不能小于6位',
        'password.max'  =>  '密码不能大于20位',
    ];
    
    protected $scene = [
        'add'  =>  ['email','password'],
    ];
    
}
?>