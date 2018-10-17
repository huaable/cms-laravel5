<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
尊敬的 {{ $name }} 用户，
<br>
<a href="{{ URL(<span style="color:#ff0000;">'mailBox?uid='.$uid.'&activationcode='.$activationcode</span>) }}" target="_blank">
请点击此处激活XXX账号
</a>
</body>
</html>