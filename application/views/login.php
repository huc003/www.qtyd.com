<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helpers('url');
?><!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Site Properties -->
    <title>祺天优贷后台系统</title>
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
    <script src="../dist/jquery.min.js"></script>
    <script src="../dist/components/form.js"></script>
    <script src="../dist/components/transition.js"></script>
    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }
    </style>

</head>
<body>
<div class="ui success message hidden" id="message" style="position: fixed;margin-top:10px;line-height: 30px;width: 100%;">
    <i class="close icon"></i>
    <div class="header"><?php if($message){echo $message;}?>。 </div>
    <input type="hidden" value="<?php if($is_show){echo $is_show;}?>" id="is_show">
<!--<p>现在你可以用你选择的用户名登录了</p>-->
</div>
<div class="ui middle aligned center aligned grid" >
    <div class="column">
        <h2 class="ui teal image header">
            <img src="../images/logo.png" class="image">
            <div class="content">
                祺天优贷后台系统
            </div>
        </h2>
        <form class="ui large form" action="<?php echo site_url("admin/user/login"); ?>" method="post">
<!--        <form class="ui large form" action="/admin/user/login" method="post">-->
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="username" placeholder="Username" value="<?php if($username){echo $username;}?>">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password" value="">
                    </div>
                </div>
                <input type="submit" value="Login" class="ui fluid large teal submit button">
            </div>
            <div class="ui error message"></div>
        </form>
        <div class="ui message">
            Copyright ©2018 Tiger95
        </div>
    </div>
</div>
<script>
$(function () {

    var is_show = $('#is_show').val();
    if(is_show=="1"){
        $("#message").slideDown();
    }

    $('.message .close').bind('click', function() {
        $("#message").hide();
    });

    console.log($('#message').width());
    console.log($(window).width());
    console.log($(window).height()); //浏览器时下窗口可视区域高度
    console.log($(document).height()); //浏览器时下窗口文档的高度
})
</script>
</body>
</html>
