<?php
/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/3
 * Time: 18:11
 * Description:
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
    <link rel="stylesheet" type="text/css" href="../dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/site.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/menu.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/form.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/input.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/message.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="../dist/accordion/accordion.css">
    <link rel="stylesheet" type="text/css" href="../dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/components/dropdown.css">

    <script src="../dist/jquery.min.js"></script>
    <script src="../dist/components/form.js"></script>
    <script src="../dist/components/transition.js"></script>
    <script src="../dist/semantic.min.js"></script>
    <script>
        $(function () {
            $('#cd1').bind('click',function () {
                $('#content1').slideToggle();
            })
            $('#cd2').bind('click',function () {
                $('#content2').slideToggle();
            })
            $('#cd3').bind('click',function () {
                $('#content3').slideToggle();
            })
        })

        function a(id) {
            $('#'+id).addClass('active');
        }

    </script>
</head>
<body>
<div class="ui styled accordion">
    <div class="title" id="cd1"><i class="dropdown icon"></i>客户服务</div>
    <div class="content <?php if($_SESSION['tb1']=='content1'){echo 'active';}?>" id="content1">
        <p class="transition">
            <div class="ui vertical pointing menu">
                <a class="item <?php if($_SESSION['tb2']=='content1-a1'){echo 'active';}?>" onclick="a('content1-a1')" id="content1-a1" href="right?controller=/admin/user/client_list&tb1=content1&tb2=content1-a1" target="iframe_a">客户列表 </a>
                <a class="item">Messages </a>
                <a class="item">好友 </a>
            </div>
        </p>
    </div>
    <div class="title"  id="cd2"><i class="dropdown icon"></i>菜单2</div>
    <div class="content" id="content2">
        <p class="transition">
            <div class="ui vertical pointing menu">
                <a class="item">Home </a>
                <a class="item">Messages </a>
                <a class="item">好友 </a>
            </div>
        </p>
    </div>
    <div class="title"  id="cd3"><i class="dropdown icon"></i>菜单3</div>
    <div class="content" id="content3">
        <p class="transition">
            <div class="ui vertical pointing menu">
                <a class="item">Home </a>
                <a class="item">Messages </a>
                <a class="item">好友 </a>
            </div>
        </p>
    </div>
</div>
</body>
</html>
