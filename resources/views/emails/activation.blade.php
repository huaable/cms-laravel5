<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TeFun.CN</title>
</head>
<body>
<p>如果这不是您发送的激活邮件，请无视这封邮件。抱歉，打扰了。</p>
<hr/>
<p>您好, {{ $user->name }} ！ 请点击下面链接完成注册:</p>
<a href="{{url('/','',true)}}/activeAccount/?verify={{$token}}">激活链接</a>
</body>
</html>