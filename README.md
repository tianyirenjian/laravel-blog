#Laravel-Blog


###简介

自己练习了一个laravel的blog。目前个人正在使用。[http://www.goenitz.xyz/][1]。

只完成了基本的功能，还有些正在做的，应该会很快完成。

本博客，主要分为文章和标签，使用了`laravel`的多对多来实现。并没有涉及文章的类别。后台使用`AdminLTE`模板完成，前台使用也用了一些经过`AdminLTE`改变过的`bootstrap`。因为是基于`bootstrap`的，所以也是适用于手机的。

本人颜色搭配很差，所以做出来的前台是很简洁的，黑白配。。下面有网站效果图。

另外博客实现了一个简单的文章加密功能，支持多个用逗号隔开的多个密码。

首页截图：

![首页截图](https://ooo.0o0.ooo/2015/12/09/5667f281a8c27.png)


###安装方法

安装前确保你已经安装了git，composer。

首先clone源文件

```bash
git clone https://git.coding.net/goenitz/Laravel-Blog.git
```

然后安装依赖:

```shell
composer install
```

然后把根目录下面的 `.env.example` 复制出来一份叫做 `.env`。然后打开，修改里面的数据库配置信息。

执行数据库迁移

```shell
php artisan migrate
php artisan db:seed
php artisan key:generate
php artisan config:cache
php artisan route:cache
```
最后两行是创建cache的，可以使博客的运行速度加快很多。

至此安装完成。

网站后台的目录是 /goenitz。默认的邮箱是179063828[AT]qq.com ,密码：password。

有问题可以反馈给我。




  [1]: http://www.goenitz.xyz/