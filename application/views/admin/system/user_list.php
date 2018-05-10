<?php
/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/10
 * Time: 13:56
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
    <link rel="stylesheet" type="text/css" href="../../dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/index.css">

    <script src="../../dist/jquery.min.js"></script>
    <script src="../../dist/assets/library/iframe.js"></script>
    <script src="../../dist/components/form.js"></script>
    <script src="../../dist/components/transition.js"></script>
    <script src="../../dist/semantic.min.js"></script>
</head>
<body>
<div style="padding: 5px;">
    <div class="ui breadcrumb">
        <a class="section">系统设置</a>
        <i class="right angle icon divider"></i>
        <a class="section">用户列表</a>
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
            <th>user_id</th>
            <th>用户名</th>
            <th>性别</th>
            <th>姓名</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($user_list as $rs){?>
            <tr>
                <td><?php echo $rs->user_id;?></td>
                <td><?php echo $rs->username;?></td>
                <td><?php echo $rs->sex;?></td>
                <td><?php echo $rs->realname;?></td>
                <td><?php echo $rs->addtime;?></td>
                <td><a href="/welcome/right?controller=/admin/system/update_authority_page/<?php echo $rs->user_id;?>&tb1=<?php echo $_SESSION['tb1'];?>&tb2=<?php echo $_SESSION['tb2'];?>" class="caozuo_btn_40 caozuo_btn_fleft caozuo_btn_mright">
                        编辑</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="8">
                <a href="/welcome/right?controller=/admin/system/add_authority_page&tb1=<?php echo $_SESSION['tb1'];?>&tb2=<?php echo $_SESSION['tb2'];?>" style="color: #FFFFFF">
                    <div class="ui left floated pagination ">
                        <div class="ui left floated small primary labeled icon button" style="padding-top:13.5px;padding-bottom:13.5px;"><i class="user icon"></i>
                            添加用户 </div>
                    </div>
                </a>
                <?php echo $this->pagination->create_admin_links(); ?>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
