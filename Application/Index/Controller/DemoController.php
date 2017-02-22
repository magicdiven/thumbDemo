<?php
/**
 * 单用户数据安全解决方案Demo
 * 作者:丁小旺
 */
namespace Index\Controller;

use Index\Service\DemoService;
use Thumb\Controller;

class DemoController extends Controller
{
    public $service = NULL;

    public function _init()
    {
        if(empty($_POST['username']) and !isset($_SESSION['username']) and __ACTION__!='login'){
            $this->display('login');
            exit;
        }
        $this->service = new DemoService();
    }

    public function login()
    {
        $this->display();
    }

    /**
     * 登录后,新增数据
     */
    public function index()
    {
        if(!empty($_POST) and !isset($_POST['username'])){
            $this->display('login');
        } elseif(!empty($_POST)){
            $condition = $_POST;
            !empty($condition['username']) and !isset($_SESSION['username']) and $_SESSION['username'] = $condition['username'];
            !empty($condition['password']) and !isset($_SESSION['password']) and $_SESSION['password'] = $condition['password'];
        }
        $this->display();
    }

    /**
     * 数据加密
     */
    public function encdata()
    {
        $data = $_POST;

        if(!empty($data)){
            $this->service->addData($data);
        }

        $this->display('index');
    }

    /**
     * 展示所有的数据
     */
    public function showdata()
    {
        $result = $this->service->showdata();
        $this->assign('data',$result);

        $this->display();
    }

    /**
     * 数据解密展示
     */
    public function decdata()
    {
        $id = $_GET['id'];

        if(!empty($id)){
            $result = $this->service->decData($id);
            $this->assign('data',$result);
        }
        $this->display();
    }

    public function quit()
    {
        if($_SESSION){
            session_destroy();
        }
        $this->display('login');
    }
}