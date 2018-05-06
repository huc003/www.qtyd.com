<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/3
 * Time: 14:14
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!session_id()) session_start();
    }
}

class Admin_Controller extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helpers('url');
        $this->load->helpers('common');
    }

    var $mdata = array();

    var $key_url_md_5 = 'mdaima.com-123-scc';

    function _view($template)
    {
        $this->mdata['tpl'] = $template;
        $this->load->view($template, $this->mdata);
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 16:49
     * Description:加密key
     */
    function keyED($txt,$encrypt_key){
        $encrypt_key =    md5($encrypt_key);
        $ctr=0;
        $tmp = "";
        for($i=0;$i<strlen($txt);$i++)
        {
            if ($ctr==strlen($encrypt_key))
                $ctr=0;
            $tmp.= substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1);
            $ctr++;
        }
        return $tmp;
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 16:49
     * Description:加密参数
     */
    function encrypt($txt,$key)   {
        $encrypt_key = md5(mt_rand(0,100));
        $ctr=0;
        $tmp = "";
        for ($i=0;$i<strlen($txt);$i++)
        {
            if ($ctr==strlen($encrypt_key))
                $ctr=0;
            $tmp.=substr($encrypt_key,$ctr,1) . (substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1));
            $ctr++;
        }
        return $this->keyED($tmp,$key);
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 16:49
     * Description:解密参数
     */
    function decrypt($txt,$key){
        $txt = $this->keyED($txt,$key);
        $tmp = "";
        for($i=0;$i<strlen($txt);$i++)
        {
            $md5 = substr($txt,$i,1);
            $i++;
            $tmp.= (substr($txt,$i,1) ^ $md5);
        }
        return $tmp;
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 16:47
     * Description:生成加密参数的url
     */
    function encrypt_url($url,$key){
        return rawurlencode(base64_encode($this->encrypt($url,$key)));
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 16:48
     * Description:解密url
     */
    function decrypt_url($url,$key){
        return $this->decrypt(base64_decode(rawurldecode($url)),$key);
    }

    /**
     * Created by PhpStorm.
     * User: huc
     * Date: 2018/5/3
     * Time: 16:48
     * Description:获取解密之后的参数
     */
    function geturl($str,$key){
        $str = $this->decrypt_url($str,$key);
        $url_array = explode('&',$str);
        if (is_array($url_array)&&count($url_array)>1)
        {
            foreach ($url_array as $var)
            {
                $var_array = explode("=",$var);
                $vars[$var_array[0]]=$var_array[1];
            }
            return $vars;
        }
        return null;
    }

}