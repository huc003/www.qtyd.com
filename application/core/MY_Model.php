<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/4
 * Time: 11:10
 * Description: 数据库查询类
 */
class MY_Model extends CI_Model
{
    public function __construct($db_name = '')
    {
        parent::__construct();
//        if (!empty($db_name)) {
//            $this->db = $this->load->database($db_name, true);
//        } else {
            $this->load->database();
//        }
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 11:24
     * Description: 查询语句
     */
    public function query_sql($sql)
    {
        $query = $this->db->query($sql);
        $result = $query->result();
        $query->free_result();
        return $result;
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 11:30
     * Description:查询一条语句
     */
    public function query_sql_row($sql)
    {
        $query = $this->db->query($sql);
        $result = $query->row();
        $query->free_result();
        return $result;
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 11:27
     * Description:更新语句或新增语句
     */
    public function update_sql($sql)
    {
        return $this->db->query($sql);
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 11:28
     * Description:更新语句并返回受影响条数
     */
    public function update_sql_num($sql)
    {
        $this->db->query($sql);
        return $this->db->affected_rows();
    }


    public function query_sql_count($sql)
    {
        $query = $this->db->query($sql);
        return $query->row()->numrows;
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 11:30
     * Description:新增数据 $table_name 表名 $data 语句
     */
    public function query_insert_table($table_name = "", $data = array())
    {
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 11:33
     * Description: 新增语句
     */
    public function insert_sql($data = array())
    {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }


    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 11:36
     * Description:
     */
    public function update_where_data($where = array(), $data = array())
    {
        $query = $this->db
            ->where($where)
            ->update($this->table_name, $data);
        return $query;
    }
}