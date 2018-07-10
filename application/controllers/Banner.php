<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/7/10
 * Time: 10:06
 * Description:
 */
class Banner extends Admin_Controller{

    public function page($id){
        log_message('info',$id);
        $this->_view('banner/banner00'.$id.'.html');
    }

    public function ppt($id){
        log_message('info',$id);
        $this->_view('ppt/ppt00'.$id.'.html');
    }

}