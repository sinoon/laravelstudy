使用Laravel框架，开发的网上订餐系统，非常简单的一些功能，作为毕业设计。

功能非常简单，之前也没有用过PHP开发过，在学校只学习过.NET，不过毕业设计不想做.NET的。

网上订餐系统 说明 —— 毕业设计

一、整体环境
	此次毕业设计网上订餐系统基于 PHP 语言开发，数据库使用MySql。服务器可以任意选择，推荐使用Apache。
	推荐使用Wamp环境安装包。

二、配置方式
	因为毕业设计使用Laravel-PHP框架开发。
	Laravel框架有一些系统要求：
	1、PHP最低版本： 5.3.7
	2、MCrypt PHP扩展
	Laravel框架有一个目录需要额外设置权限： 需要为 app/storage 目录下的文件设置写权限。

	如果是用Apache服务器请开启mod_rewrite 模块，因为Laravel框架通过设置 public/.htaccess 文件去除链接中的index.php。如果使用Nginx 服务器将下列指令放到网址的配置文件中，就能让网址更优雅了：
	location / {
    	try_files $uri $uri/ /index.php?$query_string;
	}
	在Apache的配置中，请把网站的主页目录指向 'root'/public 下，根目录指向root。

	PHP配置中，请开启php_curl.dll，因为在本设计中有发送短信的模块，发送短信模块会向短信平台服务器发送请求。php_mbstring.dll也是要的，主页显示一部分菜品的简介，这个模块是用来打断超长的语句，因为字符长度原因，必须开启这个模块。php_openssl.dll，Laravel要求必须开启的模块。php_pdo_mysql.dll，数据库。

	数据库文件放在MySql安装路径的dataw文件夹下面。

	其余的配置信息，包括时区，数据库连接都已经配置好了，可以直接使用，出现问题请检查PHP配置和服务器配置信息。

额外说明：
	1、一共有2个文件夹，web文件夹是网站内容，Laravelstudy是数据库文件夹。