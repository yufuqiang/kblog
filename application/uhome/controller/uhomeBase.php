<?php
namespace app\uhome\controller;

/**
 * uhome控制器基类
 * Class uhomeController
 * @package app\uhomeBase\controller
 */
class uhomeBase extends \think\Controller
{
    /* @var string $route 当前控制器名称 */
    protected $controller = '';
    
    /* @var string $route 当前方法名称 */
    protected $action = '';
    
    /* @var string $route 当前路由uri */
    protected $routeUri = '';
    
    /* @var string $route 当前路由：分组名称 */
    protected $group = '';
    
    /* @var array $allowAllAction 登录验证白名单 */
    protected $allowAllAction = [
        // 登录页面
        'auth/login',
        'auth/logind',
        'auth/regedit',
    ];
    
    /* @var string 用户session信息 */
    protected $usersession = '';
    /* @var string 用户baseurl信息 */
    protected $baseurl = '/public/cpts/';
    /**
     * 初始化
     */
    public function _initialize()
    {
        // 商家登录信息
        $this->usersession = Session('usersession');
        // 当前路由信息
        $this->getRouteinfo();
        // 验证登录
        $this->checkLogin();
        // 全局layout
        //$this->layout();
        $this->setViewvar($this);
    }
    /**
     * 解析当前路由参数 （分组名称、控制器名称、方法名）
     */
    protected function setViewvar()
    {
        // 输出到view
        $this->assign([
            'assets_url' => "/public/cpts/",//
            'usersession' => $this->usersession, 
        ]);
        
    }
    /**
     * 解析当前路由参数 （分组名称、控制器名称、方法名）
     */
    protected function getRouteinfo()
    {
        // 控制器名称
        $this->controller = strtolower($this->request->controller());
        // 方法名称
        $this->action = strtolower($this->request->action());
        // 控制器分组 (用于定义所属模块)
        $groupstr = strstr($this->controller, '.', true);
        $this->group = $groupstr !== false ? $groupstr : $this->controller;
        // 当前uri
        $this->routeUri = $this->controller . '/' . $this->action;
        
    }
    /**
     * 验证登录状态
     */
    private function checkLogin()
    {
        
        // 验证当前请求是否在白名单
        if (in_array($this->routeUri, $this->allowAllAction)) {
            return true;
        }
        // 验证登录状态
        if (empty($this->usersession)) {
                $this->error('您还没有登录', 'auth/login');
                return false;
            }
            return true;
    }
}
