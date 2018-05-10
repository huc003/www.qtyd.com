<?php
/**
 * Created by PhpStorm.
 * User: huc
 * Date: 2018/5/8
 * Time: 11:37
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
    <link rel="stylesheet" type="text/css" href="../../dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../../dist/components/dropdown.css">

    <script src="../../dist/jquery.min.js"></script>
    <script src="../../dist/assets/library/iframe.js"></script>
    <script src="../../dist/components/form.js"></script>
    <script src="../../dist/components/transition.js"></script>
    <script src="../../dist/semantic.min.js"></script>
    <script>
        $(function () {
        })
    </script>
</head>
<body>
<div style="padding: 5px;">
    <div class="ui breadcrumb">
        <a class="section">系统参数</a>
        <i class="right angle icon divider"></i>
        <a class="section">添加系统参数</a>
    </div>
</div>
<div style="padding: 5px;margin-top:20px;">
    <form class="ui form" action="<?php echo site_url('/admin/system/add_system'); ?>" method="post">
        <h4 class="ui dividing header">添加参数</h4>
        <div class="fields">
            <div class="three wide field">
                <label>NAME</label>
                <input type="text" name="name" maxlength="30" placeholder="汉字或英文" value="<?php echo $this->input->post('name');?>">
                <span style="color:red "><?php echo form_error('name'); ?></span>
            </div>
            <div class="three wide field" >
                <label>NID</label>
                <div class="field">
                    <input type="text" name="nid" placeholder="字符串"  value="<?php echo $this->input->post('nid');?>">
                    <span style="color:red "><?php echo form_error('nid'); ?></span>
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="three wide field" >
                <label>VALUE</label>
                <div class="field">
                    <input type="text" name="value" placeholder="整数或字符串"  value="<?php echo $this->input->post('value');?>">
                    <span style="color:red "><?php echo form_error('value'); ?></span>
                </div>
            </div>
            <div class="three wide field" >
                <label>TYPE</label>
                <div class="field">
                    <input type="text" name="type" placeholder="字符串"  value="<?php echo $this->input->post('type');?>">
                    <span style="color:red "><?php echo form_error('type'); ?></span>
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="three wide field">
                <label>STYLE</label>
                <div class="field">
                    <input type="text" name="style" placeholder="样式" value="<?php echo $this->input->post('style');?>">
                    <span style="color:red "><?php echo form_error('style'); ?></span>
                </div>
            </div>
            <div class="three wide field">
                <label>状态</label>
                <div class="field">
                    <select class="ui fluid search dropdown" name="status">
                        <option value="" <?php if($this->input->post('status')==0){echo 'selected';}?>>请选择</option>
                        <option value="1" <?php if($this->input->post('status')==1){echo 'selected';}?>>有效</option>
                        <option value="2" <?php if($this->input->post('status')==2){echo 'selected';}?>>无效</option>
                    </select>
                    <span style="color:red "><?php echo form_error('status'); ?></span>
                </div>
            </div>
        </div>
        <div class="two fields">
        <div style="padding: 5px;"><input value="新增" type="submit" class="ui fluid teal submit button" style="height:37px;"></div>
    </form>
</div>
</body>
</html>
