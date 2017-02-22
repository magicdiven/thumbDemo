<?php

namespace Index\Model;

use Thumb\Model;

class TestModel extends Model
{
    /**
     * 新增数据
     * @param $data
     */
    public function addData($data)
    {
        $username = $_SESSION['username'];
        $time = time();
        $sql = "INSERT INTO 
            `test`(`username`, `data`, `data_type`,`add_time`)
            VALUES ('$username', '{$data['data']}', '{$data['data_type']}','$time');
            ";

        $table = $this->db('DB_TEST');
        $result = $table->execute($sql);
    }

    /**
     * 获取全部数据
     * @return mixed
     */
    public function showData()
    {
        $sql = "SELECT `id`, `data_type`
            FROM (
            SELECT `id`, `data_type`
            FROM `test`
            WHERE `username`='{$_SESSION['username']}'
            UNION ALL 
            SELECT `id`, `data_type`
            FROM `test`
            WHERE `data_type`='public'
            ) AS T
            GROUP BY `id`";

        return $this->db('DB_TEST')->query($sql);
    }

    /**
     * 根据id获取数据
     * @param $id
     * @return mixed
     */
    public function getDataById($id)
    {
        $sql = "SELECT `username`,`data`,`data_type`,`add_time`
            FROM `test`
            WHERE id=$id";

        return $this->db('DB_TEST')->query($sql);

    }

}