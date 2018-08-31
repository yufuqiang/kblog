<?php 
namespace app\uhome\controller;
use app\common\model\User;
class Index
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
