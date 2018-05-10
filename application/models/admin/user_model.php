<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/4
 * Time: 11:15
 * Description: 用户操作类
 */
class user_model extends MY_Model
{
    public function get_client_list($data){
        $sql = 'select user_id,username,card_id,realname,nick_name,sex,addtime from dw_user where 1=1 '.$data['where'].' limit '.$data['offset'].','.$data['limit'];
        $numsql = 'select count(1) as rows from dw_user where 1=1 '.$data['where'];
        return array('list'=>$this->query_sql($sql),'count'=>$this->query_sql_row($numsql)->rows);
    }

    public function get_user_menu_list(){
        $sql = "select * from dw_user where username='admin'";
        return $this->query_sql_row($sql);
    }
}