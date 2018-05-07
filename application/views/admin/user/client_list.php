<?php
/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/4
 * Time: 9:53
 * Description:
 */
$this->load->library('pagination');
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
</head>
<body>
<div style="padding: 5px;">
    <div class="ui breadcrumb">
        <a class="section">客户服务</a>
        <i class="right angle icon divider"></i>
        <a class="section">客户列表</a>
        <!--    <i class="right angle icon divider"></i>-->
        <!--    <div class="active section">T-Shirt</div>-->
    </div>
</div>
<form action="/admin/user/client_list" method="post">
<div style="padding: 5px;">
    <div class="ui input">
        <input placeholder="用户id" type="text" name="user_id">
    </div>
    <div class="ui input">
        <input placeholder="用户名" type="text" name="username">
    </div>
    <div class="ui input">
        <input placeholder="昵称" type="text" name="nickname">
    </div>
    <div class="ui buttons">
        <input value="查询" type="submit" class="ui fluid teal submit button" style="height:37px;">
    </div>
</div>
</form>

<div style="padding: 5px;">
    <table class="ui green striped table">
        <thead>
            <tr>
                <th>用户ID</th>
                <th>用户名</th>
                <th>昵称</th>
                <th>注册时间</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($client_list as $rs){?>
            <tr>
                <td><?php echo $rs->user_id;?></td>
                <td><?php echo $rs->username;?></td>
                <td><?php echo $rs->nick_name;?></td>
                <td><?php echo date("Y-m-d H:i:s",$rs->addtime);?></td>
            </tr>
        <?php }?>
<!--        <tr>-->
<!--            <td>Orange</td>-->
<!--            <td>310</td>-->
<!--            <td>0g</td>-->
<!--        </tr>-->
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">
                    <div class="ui left floated pagination ">
                        <div class="ui left floated small primary labeled icon button" style="padding-top:13.5px;padding-bottom:13.5px;"><i class="user icon"></i> 添加用户 </div>
                    </div>
<!--                    <div class="ui right floated pagination menu">-->
<!--                        <a class="icon item">-->
<!--                            <i class="left chevron icon"></i>-->
<!--                        </a>-->
<!--                        <a class="item">1</a>-->
<!--                        <a class="item">2</a>-->
<!--                        <a class="item">3</a>-->
<!--                        <a class="item">4</a>-->
<!--                        <a class="icon item">-->
<!--                            <i class="right chevron icon"></i>-->
<!--                        </a>-->
                        <?php echo $this->pagination->create_admin_links(); ?>
<!--                    </div>-->
                </th>
            </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
