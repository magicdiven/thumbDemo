<?php
/**
 * 团队模式Demo服务层
 */
namespace Index\Service;

use Index\Model\TeamtestModel;

class TeamDemoService
{
    public $model = NULL;

    public function __construct()
    {
        $this->model = new TeamtestModel();
    }

    /**
     * 保存数据(加密)
     * @param $data
     */
    public function addData($data)
    {
        $checkTeam = $this->model->checkteam($_SESSION['teamname']);
        if ($checkTeam){//修改项目数据
            $data['data'] = $this->coder($data['data'], $checkTeam['teamkey'], 'encode');
            $this->model->updateData($data);
        }else{//新增项目数据
            //数据加密
            if('private' == $data['data_type']){
                $data['teamkey'] = $_SESSION['teamname'] . time() . rand(99,999);
                $data['data'] = $this->coder($data['data'], $data['teamkey'], 'encode');
            }
            $this->model->addData($data);
        }
    }

    /**
     * 查询所有数据
     * @return mixed
     */
    public function showData()
    {
        return $this->model->showData();
    }

    /**
     * 根据项目id获取对应数据(解密)
     * @param $id
     * @return mixed
     */
    public function decData($id)
    {
        $data = $this->model->getDataById($id);
        //解密
        if('private' == $data[0]['data_type']){
            $data[0]['data'] = $this->coder($data[0]['data'], $data[0]['teamkey'], 'decode');
        }
        return $data;
    }

    /**
     * 加密机:加密解密
     * @param $data
     * @param $key
     * @param $type
     * @return mixed
     */
    private function coder($data, $key, $type)
    {
        exec("java Coder {$data} {$key} {$type}", $output);
        return $output[0];
    }

}