<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>欢迎使用留言版</title>
</head>
<body>
<?php if(is_array($data)): foreach($data as $key=>$vo): ?>第<?php echo ($vo["id"]); ?>条：|
标题：<?php echo ($vo["title"]); ?>|
内容：<?php echo ($vo["content"]); ?><br/><?php endforeach; endif; ?>
</body>
</html>