<?php
/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/8
 * Time: 11:37
 * Description:
 */
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
        $(function () {
            $('.message .close').bind('click', function() {
                $("#message").hide();
            });
        })
    </script>
</head>
<body>
<div style="padding: 5px;">
    <div class="ui breadcrumb">
        <a class="section">系统设置</a>
        <i class="right angle icon divider"></i>
        <a class="section">添加系统参数</a>
    </div>
</div>
<div class="ui negative message" id="message" style="margin-top:10px;line-height: 30px;width: 100%;">
    <i class="close icon"></i>
    <div class="header">NAME不能为空。 </div>
    <input type="hidden" value="" id="is_show">
</div>
<div style="padding: 5px;margin-top:20px;">
    <form class="ui form">
        <h4 class="ui dividing header">添加参数</h4>
        <div class="fields">
            <div class="three wide field">
                <label>NAME</label>
                <input type="text" name="name" maxlength="3" placeholder="汉字或英文">
            </div>
            <div class="three wide field" >
                <label>VALUE</label>
                <div class="field" id="system_id">
                    <input type="text" name="value" placeholder="整数或字符串" >
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="three wide field" >
                <label>TYPE</label>
                <div class="field" id="system_id">
                    <input type="text" name="type" placeholder="字符串" >
                </div>
            </div>
            <div class="three wide field">
                <label>STYLE</label>
                <div class="field">
                    <input type="text" name="style" placeholder="样式">
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="three wide field">
                <label>状态</label>
                <div class="field">
                    <select class="ui fluid search dropdown" name="status">
                        <option value="">Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="two fields">
        <div style="padding: 5px;"><input value="新增" type="submit" class="ui fluid teal submit button" style="height:37px;"></div>
    </form>
</div>
</body>
</html>
