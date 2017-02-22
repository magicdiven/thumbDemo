<?php

namespace Index\Service;

use Index\Model\TestModel;

class DemoService
{
    public $model = NULL;

    public function __construct()
    {
        $this->model = new TestModel();
    }

    public function addData($data)
    {
        //数据加密
        if('private' == $data['data_type']){
            $data['data'] = $this->encrypt($data['data'], $_SESSION['username'] . $_SESSION['password']);
        }

        $this->model->addData($data);
    }

    public function showData()
    {
        return $this->model->showData();
    }

    public function decData($id)
    {
        $data = $this->model->getDataById($id);
        //解密
        if('private' == $data[0]['data_type']){
            $data[0]['data'] = $this->decrypt($data[0]['data'], $_SESSION['username'] . $_SESSION['password']);
        }
        return $data;
    }

    /**
     * 数据加密算法
     * @param $data 需加密数据
     * @param $key 密钥
     * @return string 机密数据
     */
    private function encrypt($data, $key)
    {
        $key    =    md5($key);
        $x        =    0;
        $len    =    strlen($data);
        $l        =    strlen($key);
        $char = '';

        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l)
            {
                $x = 0;
            }
            $char .= $key{$x};
            $x++;
        }
        $str = '';
        for ($i = 0; $i < $len; $i++)
        {
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
        }
        return base64_encode($str);
    }

    /**
     * 数据解密算法
     * @param $data
     * @param $key
     * @return string
     */
    private function decrypt($data, $key)
    {
        $key = md5($key);
        $x = 0;
        $data = base64_decode($data);
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l)
            {
                $x = 0;
            }
            $char .= substr($key, $x, 1);
            $x++;
        }
        $str = '';
        for ($i = 0; $i < $len; $i++)
        {
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
            {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            }
            else
            {
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return $str;
    }

}