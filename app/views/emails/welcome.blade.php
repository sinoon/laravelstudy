<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>欢迎来到快捷订餐大家庭中！</h2>

		<p><b>用户名:</b> {{{ $name }}}</p>
		<p>请点击这里验证您的邮箱, <a href="{{ URL::to('email/confirm', array($confirm_code)) }}">click here.</a></p>
		<p>或者通过以下地址进行验证: <br /> {{ URL::to('email/confirm', array($confirm_code)) }} </p>
		<p>谢谢您的参与<br />
			&copy;  2014 浙江财经大学 商楠 for 毕业设计</p>
	</body>
</html>