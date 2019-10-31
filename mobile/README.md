# Ⅰ. 简述

# Ⅱ. Codes

# Ⅲ. dsc

## ⅰ. 开发必读

### 开发模式

当前 app\custom 目录为二开目录，二次开发主要分类两种类型：

1. 基于现有模块进行再开发

	比如该目录下的 site 模块，基于默认的首页模块增加 phpinfo 页面。您需要继承（extends）原有的模块。如果原有模块的方法已经存在，可以在子类中进行覆写。

2. 建立全新模块进行开发

	比如该目录下的 guestbook 模块，您可以完全根据自己的业务全新进行设计开发。

3. 模板重写。

	将默认模块下的views目录的模板文件，复制一份到 对应路径 app/custom/模块名/views/目录下。例如： 复制 resources/views/site/index.html 至 app/custom/site/views/index.html  注意文件同名即可。

### 关于路由：

基本的路由结构为 mobile/index.php?m=module&c=controller&a=action&key=value

- 模块：module = site
- 控制器：controller = index
- 操作：action = phpinfo
- 参数：key = value（值）

## ⅱ. 伪静态配置

H5商城URL重写

### About

手机版从v1.9.3版本支持多种复杂路由的配置，也可以通过URL重写隐藏应用的入口文件index.php，下面是相关服务器的配置参考：

### Apache

- httpd.conf配置文件中加载了mod_rewrite.so模块
- AllowOverride None 将None改为 All
- 把下面的内容保存为.htaccess文件放到应用入口文件的同级目录下

```
<IfModule mod_rewrite.c>
 RewriteEngine on
 RewriteCond %{REQUEST_FILENAME} !-d
 RewriteCond %{REQUEST_FILENAME} !-f
 RewriteRule ^(.*)$ index.php?r=$1 [QSA,PT,L]
</IfModule>
```

### IIS

- 如果你的服务器环境支持ISAPI_Rewrite的话，可以配置httpd.ini文件，添加下面的内容：

```
RewriteRule (.*)$ /index\.php\?r=$1 [I]
```

- 在IIS的高版本下面可以配置web.Config，在中间添加rewrite节点：

```xml
<rewrite>
 <rules>
 <rule name="OrgPage" stopProcessing="true">
 <match url="^(.*)$" />
 <conditions logicalGrouping="MatchAll">
 <add input="{HTTP_HOST}" pattern="^(.*)$" />
 <add input="{REQUEST_FILENAME}" matchType="IsFile" negate="true" />
 <add input="{REQUEST_FILENAME}" matchType="IsDirectory" negate="true" />
 </conditions>
 <action type="Rewrite" url="index.php?r=/{R:1}" />
 </rule>
 </rules>
</rewrite>
```

### Nginx

在Nginx低版本中，是不支持PATHINFO的，但是可以通过在Nginx.conf中配置转发规则实现：

```
location /mobile/ {
    if (!-e $request_filename){
        rewrite ^/mobile/(.*)$ /mobile/index.php?r=$1 last;
    }
}
```

如果你的程序安装在二级目录，Nginx的伪静态方法设置如下，其中youdomain是所在的目录名称。

```
location /youdomain/mobile/ {
    if (!-e $request_filename){
        rewrite  ^/youdomain/mobile/(.*)$  /youdomain/mobile/index.php?r=$1  last;
    }
}
```

### Example

原来的访问URL：

http://serverName/index.php?r=/模块/控制器/操作/[参数名/参数值...]

设置后，我们可以采用下面的方式访问：

http://serverName/模块/控制器/操作/[参数名/参数值...]

## ⅲ. 常见问题

1. 手机端基于什么框架开发的?

	此次更新开放了除app目录以外所有的文件源码。采用了主流的composer包管理，使用包括优秀的symfony、优雅的laravel及快速上手的thinkphp等组件和底层框架。如果您阅读并领悟了 开发必读 的原理，任意对 mobile 进行二次开发。

2. 如何开启调试模式（debug）

	请编辑 mobile/index.php， 在文件开始的任意位置 添加 define('APP_DEBUG', true);
启用debug模式后可以查看具体的错误信息。不过正式上线的网站，不要启用，不然网站信息被人看光光。
建议的流程是测试环境和生产环境两个站点来运行。测试环境开启 debug 调试模式，生产环境一定要关闭。

3. 访问 mobile 出现 类似 404 页面的提示

	解决的具体流程可以参考这里：http://wenda.ecmoban.com/index.php?m=question&c=index&a=init&id=541

4. 商品详情页加入购物车异常报错

	查看报错日志：mysql ERR: 1364
解决方法： 修改mysql配置文件，win系统 my.ini, linux系统 my.cnf  搜索sql-mod= 这一段 去掉里面的STRICT_TRANS_TABLES, 重启mysql即可

5. 社会化登录授权后报错

	检查补丁文件有没有打全，该执行的sql语句有没有导入执行正确。涉及的表主要为dsc_connect_user表

6. 微信支付支付提示“当前页面的URL未注册”

	请登录微信公众平台，进入微信支付管理页面，选择开发配置选项卡，设置“支付授权目录”。支付授权目录要求如下：
	
    - http://shop.ectouch.cn/dscmall/mobile/
    - http://shop.ectouch.cn/dscmall/mobile/user/order/
