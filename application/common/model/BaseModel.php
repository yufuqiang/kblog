<?php 
namespace app\common\model;

use think\Model;

class BaseModel extends Model
{
    protected $field = true;
    //自定义初始化
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        
        //TODO:自定义的初始化
    }
    public function addOne($data){
        
        $this->allowField($this->field)->save($data);
        if($this->id){
            return $this->id;
        }else{
            return false;
        }
    }
    public function addAll($data){
        return $this->allowField($this->field)->saveAll($data);
    }
}
?>