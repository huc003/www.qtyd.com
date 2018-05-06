<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Admin_Controller {
    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        if(isset($_SESSION['username'])){
            redirect('welcome/main');
            exit;
        }

        $url_info = $this->geturl($_SERVER['QUERY_STRING'],$this->key_url_md_5);//接收所有参数

        $is_show=$url_info['is_show'];//解密对应参数
        $message = $url_info['message'];
        $username = $url_info['username'];

        $this->mdata['message'] = $message;
        $this->mdata['username'] = $username;
        $this->mdata['is_show'] = $is_show;
        $this->_view('login');
	}

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 17:15
     * Description: 跳转首页
     */
	public function main(){
        if($_SESSION['username']==null){
            redirect('welcome/index');
            exit;
        }
        $this->_view('admin/index');
    }

    public function left(){
        $this->_view('left');
    }

    public function right(){
        $this->load->library('session');

        $controller = $this->input->get('controller');
        $tb1 = $this->input->get('tb1');
        $tb2 = $this->input->get('tb2');

        $_SESSION['tb1'] = $tb1;
        $_SESSION['tb2'] = $tb2;
        $_SESSION['controller'] = $controller;

        log_message('info',$controller);


        log_message('info','session----'.$_SESSION['tb1']);
        log_message('info','tb2----'.$_SESSION['tb2']);
        log_message('info','controller----'.$_SESSION['controller']);

        redirect($controller);
        exit;
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 19:04
     * Description:加载默认的提示页面
     */
    public function defaultRight(){
        $this->_view('right');
    }
}
