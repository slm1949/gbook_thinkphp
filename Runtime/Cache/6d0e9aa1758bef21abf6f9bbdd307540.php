<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>欢迎使用留言版</title>
</head>
<body>
<center>
<font size=5 color=#ff000>留言显示</font><br/>
<?php if(is_array($data)): foreach($data as $key=>$vo): ?><!--第<?php echo ($vo["id"]); ?>条：|
作者:<?php echo ($vo["user"]); ?>|
标题：<?php echo ($vo["title"]); ?>|
内容：<?php echo ($vo["content"]); ?><br/><?php endforeach; endif; ?>
-->
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>第<?php echo ($vo["id"]); ?>条：|
作者:<?php echo ($vo["user"]); ?>|
标题：<?php echo ($vo["title"]); ?>|
内容：<?php echo ($vo["content"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
</center>
</body><!--联系在HTML里写备注-->
</html>