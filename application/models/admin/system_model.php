<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/8
 * Time: 14:15
 * Description:
 */
class system_model extends MY_Model
{
    public function system_list($data){
        $sql = 'select * from dw_system limit '.$data['offset'].','.$data['limit'];
        $numsql = 'select count(1) as rows from dw_system';
        return array('list'=>$this->query_sql($sql),'count'=>$this->query_sql_row($numsql)->rows);
    }
}