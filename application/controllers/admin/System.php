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

    public function system_list()
    {

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

    public function add_system_page()
    {
        $this->_view('admin/system/add_system');
    }

    public function add_system()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="warning">', '</span>');
        $this->form_validation->set_rules('name', '* 名称', 'trim|required');
        $this->form_validation->set_message('required', '{field} 必须填写');

        $this->form_validation->set_rules('nid', '* nid', 'trim|required');
        $this->form_validation->set_message('required', '{field} 必须填写');

        $this->form_validation->set_rules('value', '* value', 'trim|required');
        $this->form_validation->set_message('required', '{field} 必须填写');

        $this->form_validation->set_rules('type', '* type', 'trim|required');
        $this->form_validation->set_message('required', '{field} 必须填写');

        $this->form_validation->set_rules('style', '* style', 'trim|required');
        $this->form_validation->set_message('required', '{field} 必须填写');

        $this->form_validation->set_rules('status', '* status', 'trim|required');
        $this->form_validation->set_message('required', '{field} 必须填写');

        if ($this->form_validation->run() == TRUE) {
            $name = $this->input->post('name');
            $nid = $this->input->post('nid');
            $value = $this->input->post('value');
            $type = $this->input->post('type');
            $style = $this->input->post('style');
            $status = $this->input->post('status');


            //新增参数


            log_message('info', "参数验证成功!");
            exit;
        }
        $this->_view('admin/system/add_system');
    }


    public function user_list()
    {

        $limit = 15;
        $offset = $this->input->get('per_page');
        if ($offset == '') $offset = 0;

        $data = array(
            "limit" => $limit,
            "offset" => $offset
        );

        $result = $this->system_model->user_list($data);

        $getparam = spell_get();
        $config['base_url'] = site_url('admin/system/user_list') . "?$getparam";
        $config['total_rows'] = $result['count'];
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);


        $this->mdata['user_list'] = $result['list'];

        $this->_view('admin/system/user_list');
    }


    public function update_authority_page()
    {
        $this->load->model('admin/menu_model');

        $r = $this->menu_model->menu_list();

        $father_list = $r['father_list'];
        $child_list = $r['child_list'];

        $this->mdata['father_list'] = $father_list;
        $this->mdata['child_list'] = $child_list;
        $this->_view('admin/system/update_authority');
    }

    public function add_authority_page()
    {
        $this->load->model('admin/menu_model');

        $r = $this->menu_model->menu_list();

        $father_list = $r['father_list'];
        $child_list = $r['child_list'];

        $this->mdata['father_list'] = $father_list;
        $this->mdata['child_list'] = $child_list;
        $this->_view('admin/system/add_authority');
    }

    public function add_authority()
    {
        $father = $this->input->post('father');
        $child = $this->input->post('child');


        log_message('info', '============' . json_encode($father));
        log_message('info', '============' . json_encode($child));
    }

    public function character_list()
    {


        $limit = 15;
        $offset = $this->input->get('per_page');
        if ($offset == '') $offset = 0;

        $data = array(
            "limit" => $limit,
            "offset" => $offset
        );

        $result = $this->system_model->character_list($data);

        $getparam = spell_get();
        $config['base_url'] = site_url('admin/system/character_list') . "?$getparam";
        $config['total_rows'] = $result['count'];
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);


        $this->mdata['character_list'] = $result['list'];

        $this->_view('admin/system/character_list');
    }


    public function add_character_page()
    {

        $this->load->model('admin/menu_model');

        $r = $this->menu_model->menu_list();

        $father_list = $r['father_list'];
        $child_list = $r['child_list'];

        $this->mdata['father_list'] = $father_list;
        $this->mdata['child_list'] = $child_list;


        $this->_view("admin/system/add_character");
    }


    public function add_character()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="warning">', '</span>');
        $this->form_validation->set_rules('name', '* 角色名称', 'trim|required');
        $this->form_validation->set_message('required', '{field} 必须填写');

        $this->load->model('admin/menu_model');

        $r = $this->menu_model->menu_list();

        $father_list = $r['father_list'];
        $child_list = $r['child_list'];

        $this->mdata['father_list'] = $father_list;
        $this->mdata['child_list'] = $child_list;

        if ($this->form_validation->run() == TRUE) {

            $name = $this->input->post('name');

            $father = $this->input->post('father');
            $child = $this->input->post('child');

            log_message('info', '============' . $name);
            log_message('info', '============' . json_encode($father));
            log_message('info', '============' . json_encode($child));

            $str_father = '';
            foreach ($father as $item) {
                $str_father .= $item . ',';
            }

            $str_child = '';
            foreach ($child as $item) {
                $str_child .= $item . ',';
            }

            $data = array();
            $data['name'] = $name;
            $data['purview'] = $str_father.$str_child;
            $data['order'] = 1;
            $data['status'] = 1;
            $data['addtime'] = time();

            $this->system_model->add_character($data);

            $this->mdata['message'] = '添加成功';
            $this->mdata['is_show'] = 1;
            $this->_view("admin/system/add_character");
            return;
        }

        $this->_view("admin/system/add_character");
    }

    public function update_character_page($type_id){

        //根据type_ip查询角色信息



        $this->_view("admin/system/update_character");
    }


}