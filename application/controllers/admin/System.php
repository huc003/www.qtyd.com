<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/8
 * Time: 11:10
 * Description:
 */
class System extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/system_model');
        $this->load->library('pagination');
    }

    public function system_list(){




        $limit = 15;
        $offset = $this->input->get('per_page');
        if ($offset == '') $offset = 0;

        $data = array(
            "limit" => $limit,
            "offset" => $offset
        );

        $result = $this->system_model->system_list($data);

        $getparam = spell_get();
        $config['base_url'] = site_url('admin/system/system_list') . "?$getparam";
        $config['total_rows'] = $result['count'];
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);


        $this->mdata['system_list'] = $result['list'];
        $this->_view('admin/system/system_list');
    }

    public function add_system_page(){
        $this->_view('admin/system/add_system');
    }
}