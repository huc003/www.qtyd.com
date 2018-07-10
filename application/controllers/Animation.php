<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/7/10
 * Time: 10:06
 * Description:
 */
class Animation extends Admin_Controller{



    public function index(){
        $this->_view('animation/animation001.html');
    }


    public function page($id){
        log_message('info',$id);
        $this->_view('animation/animation00'.$id.'.html');
    }


}