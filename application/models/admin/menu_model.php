<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/7
 * Time: 10:11
 * Description:
 */
class menu_model extends MY_Model
{
    public function menu_list(){
        $father_sql = 'select * from dw_menu where father_id = 0 order by sort asc';
        $child_sql = 'select * from dw_menu where father_id <> 0 order by sort asc';
        return array('father_list'=>$this->query_sql($father_sql),'child_list'=>$this->query_sql($child_sql));
    }
}