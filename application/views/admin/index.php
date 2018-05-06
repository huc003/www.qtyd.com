<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/3
 * Time: 14:32
 */
$this->load->library('session');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/site.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/menu.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/form.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/input.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/message.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="../../dist/accordion/accordion.css">
    <link rel="stylesheet" type="text/css" href="../../dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/dropdown.css">

    <script src="../../dist/jquery.min.js"></script>
    <script src="../../dist/assets/library/iframe.js"></script>
    <script src="../../dist/components/form.js"></script>
    <script src="../../dist/components/transition.js"></script>
    <script src="../../dist/semantic.min.js"></script>
    <script>
        $('iframe').iFrameResize({
            autoResize: true,
            heightCalculationMethod: 'bodyScroll'
        });
        $(function () {
            $('#user').bind('click',function () {
                $('#user_d').slideToggle();
            })
        })
    </script>
    <style>
        iframe {
            border: none;
            width: calc(100% + 2em);
            margin: 0em -1em;
            height: 900px;
        }
        iframe html {
            overflow: hidden;
        }
        iframe body {
            padding: 0em;
        }
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>

<div class="ui top attached" style="width: 100%;height: 60px;">
    <div class="" style="float:left;padding: 5px;">
        sdsds
    </div>
    <div class="" style="float:right;padding: 5px;">
        <div class="ui buttons">
            <button class="ui button"><?php echo $_SESSION['username']?></button>
            <div class="ui floating dropdown icon button" tabindex="0" id="user">
                <i class="dropdown icon"></i>
                <div class="menu transition" id="user_d" tabindex="-1">
                    <div class="item">忘记密码</div>
                    <div class="item"><a href="/admin/user/out">注销</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui grid">
    <div class="two wide" style="width:13%;height: auto;padding-left:20px;border-top:1px solid #d8d8d8;border-right: 1px solid #d8d8d8 ">
        <iframe src="left" width="100%" scrolling="no"></iframe>
    </div>
    <div class="fourteen wide" style="width:87%;height: 900px;border-top:1px solid #d8d8d8;padding-right: 30px;">
        <iframe src="right?controller=<?php if($_SESSION['controller']!=''){echo $_SESSION['controller'];}else{echo '/welcome/defaultRight';}?>&tb1=<?php if($_SESSION['tb1']!=''){echo $_SESSION['tb1'];}?>&tb2=<?php if($_SESSION['tb2']!=''){echo $_SESSION['tb2'];}?>" name="iframe_a" width="100%" scrolling="no"></iframe>
    </div>
</div>
</body>
</html>

