<?php 
namespace app\uhome\controller;
use app\uhome\controller\uhomeBase;
use app\common\model\UserModel;
class Index extends uhomeBase
{
    public function index()
    {
        echo 2;
        Dump(1);
        $data = [["username"=>"11","password"=>"dads"],["username"=>"22","password"=>"dads"],["username"=>"33","password"=>"dads"]];
        $UserM = new User();
        $UserM->addAll($data);
        return "uhome";
    }
    
}
