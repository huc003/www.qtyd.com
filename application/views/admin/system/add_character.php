<?php
/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/10
 * Time: 13:32
 * Description:
 */
$this->load->library('form_validation');
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
        <a class="section">角色管理</a>
        <i class="right angle icon divider"></i>
        <a class="section">添加角色</a>
    </div>
</div>

<div class="ui success message hidden" id="message" style="margin-top:10px;line-height: 30px;width: 100%;">
    <i class="close icon"></i>
    <div class="header"><?php if(isset($message)){echo $message;}?>。 </div>
    <input type="hidden" value="<?php if(isset($is_show)){echo $is_show;}?>" id="is_show">
</div>
<div style="padding: 5px;">
    <form class="ui form" action="<?php echo site_url('admin/system/add_character'); ?>" method="post">
        <h4 class="ui dividing header">添加角色</h4>
        <div class="fields">
            <div class="three wide field">
                <label>角色名称</label>
                <input type="text" name="name" maxlength="30" placeholder="名称拼音" value="<?php echo $this->input->post('name');?>">
                <span style="color:red "><?php echo form_error('name'); ?></span>
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
            <div style="padding: 5px;"><input value="新增" type="submit" class="ui fluid teal submit button" style="height:37px;"></div>
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
    $(function () {
        var is_show = $('#is_show').val();
        if(is_show=="1"){
            $("#message").slideDown();
        }

        $('.message .close').bind('click', function() {
            $("#message").hide();
        });
    })
</script>
</body>
</html>
