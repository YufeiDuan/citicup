<!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>
<body>
	<h3>尊敬的用户：</h3>
	
	<p>您正在申请重置密码服务。请单击下面的链接以重置您的登录密码。</p>
  <a href="{{ URL('password/'.$token) }}" target="_blank">{{ URL('password/'.$token) }}</a>
  <p>此链接有效期为 30 分钟。如果链接已过期，您可以<a href="{{ URL('/') }}" target="_blank">打开网站</a>并请求向您发送新的电子邮件。</p>
  <p>
  如果您并没有没有进行上述操作，请忽略这封邮件。
</p>
</body>
</html>
