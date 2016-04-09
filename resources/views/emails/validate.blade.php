<!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>
<body>
	<h3>欢迎您报名参加第十二届“花旗杯”金融创新应用大赛</h3>
	
	<p>请单击下面的链接以确认您的电子邮件地址。您必须先进行电子邮件确认，才能访问大赛进程（如团队组建和提交作品），同时确保您帐户的安全。</p>
  <a href="{{ URL('validate/'.$token) }}" target="_blank">{{ URL('validate/'.$token) }}</a>
  <p>此链接有效期为 1 天。如果链接已过期，您可以<a href="{{ URL('/') }}" target="_blank">登录您的账户</a>并请求向您发送新的确认电子邮件。</p>
  <p>
  您收到这封电子邮件是因为有用户使用您的电子邮件地址创建了一个帐户。如果您并没有没有进行上述操作，请忽略这封邮件。
</p>
</body>
</html>