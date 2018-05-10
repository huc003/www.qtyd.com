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
        function child(id) {
            $('.item').removeClass('active');
            $('#'+id).addClass('active');
        }

        function father(node_id) {
            $('#'+node_id).slideToggle();
        }
    </script>
</head>
<body>
<div class="ui styled accordion" style="width: 230px;">
    <?php foreach ($_SESSION['father_list'] as $father){?>
        <?php if(strpos($_SESSION['purview'],$father->node_id)!==false){?>
            <div class="title" onclick="father('<?php echo $father->node_id;?>')"><i class="dropdown icon"></i><?php echo $father->title;?></div>
        <?php }?>
        <div class="content <?php if($_SESSION['tb1']=="$father->node_id"){echo 'active';}?>" id="<?php echo $father->node_id;?>" style="border: none">
            <p class="transition">
                <div class="ui vertical pointing menu">
                    <?php foreach ($_SESSION['child_list'] as $child){?>
                        <?php if("$child->father_id"=="$father->id"&&strpos($_SESSION['purview'],$child->node_id)!==false){?>
                            <a class="item <?php if($_SESSION['tb2']=="$child->node_id"){echo 'active';}?>" onclick="child('<?php echo $child->node_id;?>')" id="<?php echo $child->node_id;?>" href="<?php echo $child->href;?>&tb1=<?php echo $father->node_id;?>&tb2=<?php echo $child->node_id;?>" target="iframe_a"><?php echo $child->title;?> </a>
                        <?php }?>
                    <?php }?>
                </div>
            </p>
        </div>
    <?php }?>
</div>
</body>
</html>
