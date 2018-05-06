<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/3
 * Time: 13:57
 * 用户Controller
 */
class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/user_model');
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 16:17
     * Description:登录方法
     */
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(empty($username)){
            redirect('welcome/index?'.$this->encrypt_url('is_show=1&message=用户名不能为空&username='.$username,$this->key_url_md_5));
            exit;
        }

        if(empty($password)){
            redirect('welcome/index?'.$this->encrypt_url('is_show=1&message=密码不能为空&username='.$username,$this->key_url_md_5));
            exit;
        }

        if($username!='admin'||$password!='admin'){
            redirect('welcome/index?'.$this->encrypt_url('is_show=1&message=用户名或密码错误&username='.$username,$this->key_url_md_5));
            exit;
        }

        $_SESSION['tb1'] = '';
        $_SESSION['tb2'] = '';
        $_SESSION['controller'] = '';

        //用户登录信息
        $_SESSION['username']=$username;
        redirect('welcome/main');
        exit;

    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/4
     * Time: 9:53
     * Description:客户列表
     */
    public function client_list(){


//        $url_info = $this->geturl($_SERVER['QUERY_STRING'],$this->key_url_md_5);//接收所有参数
//
//        $tb1=$url_info['tb1'];//解密对应参数
//        $tb2 = $url_info['tb2'];
//
//        log_message('info',$tb1);
//        log_message('info',$tb2);

        $this->load->library('pagination');

        $limit = 15;
        $offset = $this->input->get('per_page');
        if ($offset == '') $offset = 0;

        $data = array(
            "limit" => $limit,
            "offset" => $offset
        );

        $r = $this->user_model->get_client_list($data);

        $this->mdata['client_list'] = $r['list'];

        log_message('info','count--'.$r['count']);

        $getparam = spell_get();
        $config['base_url'] = site_url('admin/user/client_list') . "?$getparam";
        $config['total_rows'] = $r['count'];
        $config['per_page'] = $limit;
        $config['cur_page'] = $offset;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);

        $this->_view('admin/client_list');
    }


    public function out(){
        session_destroy();
        redirect('welcome/index');
        exit;
    }

}