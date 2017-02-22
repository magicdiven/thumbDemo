<?php

namespace Index\Model;

use Thumb\Model;

class TeamtestModel extends Model
{
    /**
     * 新增数据
     * @param $data
     */
    public function addData($data)
    {
        $username = $_SESSION['username'];
        $teamname = $_SESSION['teamname'];
        $time = time();
        $sql = "INSERT INTO 
            `teamtest`(`username`, `data`, `teamname`,`teamkey`,`data_type`,`add_time`)
            VALUES ('$username', '{$data['data']}', '{$teamname}', '{$data['teamkey']}', '{$data['data_type']}','$time');
            ";

        $table = $this->db('DB_TEST',1);
        $result = $table->execute($sql);
    }

    /**
     * 获取团队项目数据和公开数据
     * @return mixed
     */
    public function showData()
    {
        $sql = "SELECT `id`, `username`, `data_type`
            FROM (
            SELECT `id`, `username`, `data_type`
            FROM `teamtest`
            WHERE `teamname`='{$_SESSION['teamname']}'
            UNION ALL 
            SELECT `id`, `username`, `data_type`
            FROM `teamtest`
            WHERE `data_type`='public'
            ) AS T
            GROUP BY `id`";

        return $this->db('DB_TEST',1)->query($sql);
    }

    /**
     * 根据id获取数据
     * @param $id
     * @return mixed
     */
    public function getDataById($id)
    {
        $sql = "SELECT `teamname`,`username`,`teamkey`,`data`,`data_type`,`add_time`
            FROM `teamtest`
            WHERE id=$id";

        return $this->db('DB_TEST',1)->query($sql);

    }

    /**
     * 判断当前团队项目是否存在
     * @param $teamname
     * @return bool|string
     */
    public function checkteam($teamname)
    {
        $sql = "SELECT `id`,`teamkey`
            FROM `teamtest`
            WHERE `teamname`='$teamname'";
        $result = $this->db('DB_TEST',1)->query($sql);

        return $result;
    }

    /**
     * 更新项目数据
     * @param $data
     */
    public function updateData($data){
        $sql = "UPDATE `teamtest`
            SET `data`='{$data['data']}'
            WHERE `teamname`='{$_SESSION['teamname']}'";
            $result = $this->db('DB_TEST',1)->execute($sql);
    }

}