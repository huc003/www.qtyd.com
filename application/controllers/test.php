<?php

/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/7/10
 * Time: 9:20
 * Description:
 */
class test extends Admin_Controller{




    //开放平台地址
    protected static $url = array(
        'test' => 'http://10.19.105.105/monitor_new/interface.php/',
        'work' => 'http://open.yundasys.com/interface.php/',
    );

    // 订单系统地址
    protected static $url_dingdan = array(
        'data' => 'order_data',         // 下单及修改订单接口
        'info' => 'order_info',		    // 订单状态通知接口
        'query' => 'order_query',       // 订单查询接口
        'order_list' => 'order_list',   // 订单列表查询接口
        'order_edit' => 'order_edit',   // 对外提供订单修改接口
    );

    // 物流查询地址
    protected static $url_wuliu = array(
        // 'csv' => 'order_query_csv',
        'json' => 'order_query_json',
        'xml' => 'order_query_xml'
    );

    /*测试xml数据
        protected static $test_xml_data_dingdan=array(
            'data'=>'
                <orders>
                    <order>
                        <orderid>E00000000001</orderid>
                        <callback>D_00001</callback>
                        <order_type>pt</order_type>
                        <customerid>761342</customerid>
                        <mailno>1200000000001</mailno>
                        <sender>
                            <name>刘XX</name>
                            <company>韵达快运</company>
                            <city>上海市,青浦区</city>
                            <address>盈港东路6679号</address>
                            <postcode>201703</postcode>
                            <phone>021-12345678</phone>
                            <mobile>13812345678,13587654321</mobile>
                        </sender>
                        <receiver>
                            <name>张YY</name>
                            <company>缘港商务</company>
                            <city>广东省,广州市,天河区</city>
                            <address>帝王大厦5-12号</address>
                            <postcode>510520</postcode>
                            <phone>021-12345678</phone>
                            <mobile>13587654321</mobile>
                        </receiver>
                        <sendstarttime>2010-06-19 08:00:00</sendstarttime>
                        <sendendtime>2010-06-19 12:00:00</sendendtime>
                        <weight>0.753</weight>
                       <courierinfo_ywy_name>业务员姓名</courierinfo_ywy_name>
                        <courierinfo_ywy_courierno>业务员编码</courierinfo_ywy_courierno>
                        <courierinfo_ywy_courierphone>业务员手机号码</courierinfo_ywy_courierphone>
                          <wdbm>业务员编码</wdbm>
                        <size>0.12,0.23,0.11</size>
                        <value>126.50</value>
                        <freight>8.00</freight>
                        <premium>1.00</premium>
                        <other_charges>0.00</other_charges>
                        <collection_currency>CNY</collection_currency>
                        <collection_value>155.50</collection_value>
                        <special>0</special>
                        <items>
                            <item>
                                <name>芭比闹钟</name>
                                <number>1</number>
                                <remark></remark>
                            </item>
                        </items>
                        <remark>包已打好</remark>
                    </order>
                    <order>
                        <orderid>E00000000002</orderid>
                        <callback>D_00002</callback>
                        <mailno>1200000000002</mailno>
                    </order>
                    <order>
                        <orderid>E00000000003</orderid>
                        <callback>D_00003</callback>
                        <sender>
                            <name>刘星</name>
                            <phone></phone>
                            <mobile>13812345678</mobile>
                        </sender>
                        <sendstarttime>2010-06-19 09:00:00</sendstarttime>
                    </order>
                </orders>',
            'info'=>'
                <orders>
                    <order>
                        <orderid>E00000000001</orderid>
                        <callback>D_00001</callback>
                        <command>status</command>
                        <parameter>withdraw</parameter>
                        <remark></remark>
                    </order>
                    <order>
                        <orderid>E00000000002</orderid>
                        <callback>D_00002</callback>
                        <command>status</command>
                        <parameter>withdraw</parameter>
                        <remark></remark>
                    </order>
                </orders>',
            'query'=>'
                <orders>
                    <order>
                        <orderid>E00000000002</orderid>
                        <callback>D_00001</callback>
                    </order>

                    <order>
                        <mailno>1200000000001</mailno>
                        <callback>D_00002</callback>
                    </order>
                </orders>',
            'order_list'=>'
                <orders>
                    <order>
                        <empid>999169110</empid>
                        <code>999169</code>
                        <modified_time>2015-6-1 12:00:00</modified_time>
                    </order>
                </orders>',
            'order_edit'=>'
                <orders>
                    <order>
                        <orderid>6373232037299035096</orderid>
                        <empid>999169110</empid>
                        <code>999169</code>
                        <receiver>
                            <name>张YY</name>
                            <city>广东省,广州市,天河区</city>
                            <address>帝王大厦5-12号</address>
                            <mobile>13587654321</mobile>
                            <weight>1.000</weight>
                            <items>
                                <item>
                                    <name>芭比闹钟</name>
                                </item>
                            </items>
                        </receiver>
                    </order>
                </orders>',
        );
    */

    public function index(){
//        order_query_wuliu();


        echo "ok";
    }

    /**
     * 在线订单接口
     * @USERID           XXX        开放平台USERID
     * @APPKEY           XXX        开放平台APPKEY
     * @partnerid        XXX        用户名
     * @pass             XXX        密码
     * @request          请求的接口  如
     *                   下订单及订单修改接口(request=data)
     *                   信息通知接口(request=info)
     *                   订单查询接口(request=query)
     *                   订单列表查询接口(request=order_list)
     *                   对外提供订单修改接口(request=order_edit)
     * @xml_data_ori     xml格式的数据
     * @url_type         test测试    work正式
     */
    public static function order_post($USERID,$APPKEY,$partnerid,$pass,$request='data',$xml_data_ori,$url_type='test'){
            $xml_data_base64=base64_encode($xml_data_ori);
        $validation=md5($xml_data_base64.$partnerid.$pass);
        $data = 'request=' . rawurlencode ($request);
        $data .= '&version=1.0';
        $data .= '&partnerid=' . rawurlencode ($partnerid);
        $data .= '&validation=' . rawurlencode ($validation );
        $data .= '&xmldata=' . rawurlencode ($xml_data_base64 );
        $result=self::post($USERID,$APPKEY,self::$url_dingdan[$request],$data,$url_type,'post');
        var_dump($result);
        // echo $result;
    }

    /**
     * 物流查询接口
     * @USERID          XXX         开放平台USERID
     * @APPKEY           XXX         开放平台APPKEY
     * @partnerid        XXX         用户名
     * @mailno           XXX         运单号
     * @data_type        返回数据格式  如
     *                   csv         csv格式返回
     *                   json        json格式返回
     *                   xml         xml格式返回
     * @url_type         test测试     work正式
     */
    public static function order_query_wuliu($USERID,$APPKEY,$partnerid,$mailno,$data_type='json',$url_type='test'){
        $data = 'partnerid=' . rawurlencode ($partnerid);
        $data .= '&mailno=' . rawurlencode ($mailno );
        $data .= '&charset=' . rawurlencode ('utf8' );
        $result=self::post($USERID,$APPKEY,self::$url_wuliu[strtolower($data_type)],$data,$url_type,'post');
        var_dump($result);
        // echo $result;
    }

    /**
     * 接口接入层
     * @USERID           XXX          开放平台USERID
     * @APPKEY           XXX          开放平台APPKEY
     * @type             调用的接口
     * @interface_data        	 传输的数据
     * @url_type         test测试     work正式
     * @http_type        传输格式     get 或 post
     */
    public static function post($USERID,$APPKEY,$type,$interface_data,$url_type='test',$http_type='post'){
        $time=time();
        $token=md5($USERID.$time.$APPKEY);
        $data=array(
            'user_id' => $USERID,
            'token' => $token,
            'timestamp' => $time,
            'data' => $interface_data
        );
        if ($http_type=='post') {
            $result=self::routeAdaptation(self::$url[$url_type].$type,$data);
        }else{
            $result=self::routeAdaptationGET(self::$url[$url_type].$type,$data);
        }
        return $result;
    }

    private static  function json_encode_ex($value)
    {
        if (version_compare(PHP_VERSION,'5.4.0','<'))
        {
            $str = json_encode($value);
            $str = preg_replace_callback(
                "#\\\u([0-9a-f]{4})#i",
                function($matchs)
                {
                    return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
                },
                $str
            );
            return $str;
        }
        else
        {
            return json_encode($value, JSON_UNESCAPED_UNICODE);
        }
    }

    private static function routeAdaptationGET($url,$data){
        $result = self::curlGET($url,$data);
        return $result;
    }

    private static function routeAdaptation($url,$data){
        $result = self::curlPost($url,$data);
        return $result;
    }

    private static function curlGET($url,$data){
        $url=trim($url.'?'.http_build_query($data));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0 );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_TIMEOUT,5);
        $res = curl_exec($ch);
        if (false === $res) {
            die(curl_error);
        }
        curl_close($ch);
        return $res;
    }

    private static function curlPost($url,$data){
        $url = trim($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_HEADER, 0 );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_TIMEOUT,5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "timestamp:time()",
            "Content-Type:application/json; charset='utf-8'",
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, self::json_encode_ex($data));
        $res = curl_exec($ch);
        if (false === $res) {
            die(curl_error);
        }
        curl_close($ch);
        return $res;
    }

    /**
     * 韵达向各平台推送物流信息  此方法只是示范 得到推送信息
     * 得到的参数      示例                            注释
     * $time           2016-05-03 12:00:00             扫描时间
     * $city           上海市                          扫描地点
     * $mailNo         1200000000001                   运单号
     * $facilityName   黑龙江双鸭子山                  公司名称
     * $action         GOT                             状态
     * $desc           即将发往：黑龙江哈尔滨分拨中心  描述
     * action状态：
     *                 GOT ->揽件扫描
     *                 ARRIVAL -> 到达某地
     *                 SENT_CITY -> 到达目的地网点
     *                 DEPARTURE -> 扫描，即将发往下一个地点
     *                 SENT_SCAN -> 派件扫描
     *                 SIGNED -> 签收
     *                 OTHER -> 在快件扫描
     *                 FAILED->客户退回
     */
    public function post_data_wuliu($partnerid,$pass,$xml_data_ori,$url_type='test'){
        $post = file_get_contents('php://input');
        if (!$post) {
            $post=$_REQUEST;
        }
        $data = '扫描时间：' . $post['time'] . '<br />';
        $data .= '扫描地点：' . $post['city'] . '<br />';
        $data .= '运单号：' . $post['mailNo'] . '<br />';
        $data .= '公司名称：' . $post['facilityName'] . '<br />';
        $data .= '状态：'  . $post['action'] . '<br />';
        $data .= '描述：' . $post['desc'] . '<br />';
        echo $data;
    }
}