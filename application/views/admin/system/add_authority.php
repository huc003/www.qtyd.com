<?php
/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/9
 * Time: 18:12
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
    <link rel="stylesheet" type="text/css" href="/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/site.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/menu.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/form.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/input.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/message.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="/dist/accordion/accordion.css">
    <link rel="stylesheet" type="text/css" href="/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/dist/components/dropdown.css">

    <script src="/dist/jquery.min.js"></script>
    <script src="/dist/assets/library/iframe.js"></script>
    <script src="/dist/components/form.js"></script>
    <script src="/dist/components/transition.js"></script>
    <script src="/dist/semantic.min.js"></script>
</head>
<body>
<div style="padding: 5px;">
    <div class="ui breadcrumb">
        <a class="section">系统设置</a>
        <i class="right angle icon divider"></i>
        <a class="section">权限管理</a>
    </div>
</div>
<div style="padding: 5px;">
    <form class="ui form" action="<?php echo site_url('/admin/system/add_system'); ?>" method="post">

    </form>
</div>
<div style="padding: 5px;">
    <form class="ui form" action="<?php echo site_url('admin/system/add_authority'); ?>" method="post">
        <h4 class="ui dividing header">用户</h4>
        <div class="fields">
            <div class="three wide field">
                <label>用户名</label>
                <input type="text" name="username" maxlength="30" placeholder="名称拼音" value="<?php echo $this->input->post('username');?>">
                <!--                <span style="color:red ">--><?php //echo form_error('name'); ?><!--</span>-->
            </div>
        </div>
        <div class="fields">
            <div class="three wide field" >
                <label>角色</label>
                <div class="field">
                    <select class="ui fluid search dropdown" name="status">
                        <option value="" <?php if($this->input->post('status')==0){echo 'selected';}?>>请选择</option>
                        <option value="1" <?php if($this->input->post('status')==1){echo 'selected';}?>>有效</option>
                        <option value="2" <?php if($this->input->post('status')==2){echo 'selected';}?>>无效</option>
                    </select>
<!--                    <input type="text" name="nid" placeholder="字符串"  value="--><?php //echo $this->input->post('nid');?><!--">-->
                    <!--                    <span style="color:red ">--><?php //echo form_error('nid'); ?><!--</span>-->
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="three wide field" >
                <label>密码</label>
                <div class="field">
                    <input type="password" name="password" placeholder="字符串"  value="<?php echo $this->input->post('password');?>">
                    <!--                    <span style="color:red ">--><?php //echo form_error('nid'); ?><!--</span>-->
                </div>
            </div>
        </div>


        <h4 class="ui dividing header">添加权限</h4>
        <?php foreach ($father_list as $father){?>
            <div class="fields">
                <div class="five wide field">
                    <input type="checkbox" tabindex="0" class="hidden ui checkbox" name="father[]" onchange="a('<?php echo $father->node_id;?>')" id="<?php echo $father->node_id;?>" value="<?php echo $father->node_id;?>"><?php echo $father->title;?>
                    <div class="fields" style="padding-top:10px;margin-left:20px; ">
                        <?php foreach ($child_list as $child){?>
                            <?php if("$child->father_id"=="$father->id"){?>
                                <div class="four wide field  <?php echo $father->node_id;?>">
                                    <input type="checkbox" tabindex="0" class="hidden ui checkbox" onchange="b('<?php echo $father->node_id;?>')" name="child[]" value="<?php echo $child->node_id;?>"><?php echo $child->title;?>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                </div>
            </div>
        <?php }?>
        <div class="two fields">
            <div style="padding: 5px;"><input value="修改" type="submit" class="ui fluid teal submit button" style="height:37px;"></div>
    </form>
</div>
<script>
    function a(father_id) {
        if($('#'+father_id).is(':checked')){
            $("."+father_id+" input").attr("checked","true");
        }else{
            $("."+father_id+" input").removeAttr("checked");
        }
    }
    function b(father_id) {
        if($("."+father_id +" input").is(':checked')){
            $('#'+father_id).attr("checked","true");
        }
        if($("."+father_id+" input[type='checkbox']:checked").length==0){
            $('#'+father_id).removeAttr("checked");
        }
    }
</script>
</body>
</html>
