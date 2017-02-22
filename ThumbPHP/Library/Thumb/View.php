<?php
namespace Thumb;

class View
{
    //后台数据集合
    private $_data = array();

    /**
     * 后台往前端传值
     */
    public function assign($name,$value)
    {
        $this->_data[$name] = $value;
    }

    /**
     * 渲染结果返回到前端展示，一般做模板引擎，解析html模板
     */
    public function display($action = '',$controller = '')
    {
        $jqPath     = __PUBLIC__.'statics/js/js-1.11.0/dist/jquery.min.js';
        $zuiCssPath = __PUBLIC__.'statics/zui-1.5.0-dist/dist/css/zui.min.css';
        $zuiJsPath  = __PUBLIC__.'statics/zui-1.5.0-dist/dist/js/zui.min.js';
        echo "<link rel='stylesheet' type='text/css' href='{$zuiCssPath}' />";
        echo "<script src='{$jqPath}'></script>";
        echo "<script src='{$zuiJsPath}'></script>";

        if(!empty($this->_data) and $data = $this->_data){
            foreach($data as $key => $_data){
                $$key = $_data;
            }
        }
        $action     = !empty($action)?$action:__ACTION__;
        $controller = !empty($controller)?$controller:__CONTROLLER__;

        if(file_exists(APP_PATH. __MODULE__ . '/View/' . $controller . '/' . $action . HTML_EXT)){
            include APP_PATH. __MODULE__ . '/View/' . $controller . '/' . $action . HTML_EXT;
        } elseif(file_exists(APP_PATH. __MODULE__ . '/View/' . $controller . '/' . $action . EXT)){
            include APP_PATH. __MODULE__ . '/View/' . $controller . '/' . $action . EXT;
        }
    }

}

?>
