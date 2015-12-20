#Laravel-Blog


###简介

自己练习了一个laravel的blog。目前个人正在使用。[http://www.goenitz.xyz/][1]。

只完成了基本的功能，还有些正在做的，应该会很快完成。(大部分已完成，接下来优化一些小东西 15.12.20)

本博客，主要分为文章和标签，使用了`laravel`的多对多来实现。并没有涉及文章的类别。后台使用`AdminLTE`模板完成，前台使用也用了一些经过`AdminLTE`改变过的`bootstrap`。因为是基于`bootstrap`的，所以也是适用于手机的。

本人颜色搭配很差，所以做出来的前台是很简洁的，黑白配。。下面有网站效果图。 (新增加了一些颜色 15.12.20)

另外博客实现了一个简单的文章加密功能，支持多个用逗号隔开的多个密码。

~~评论我是用的多说的，请**务必**修改为你自己的。在`resources/views/front/post.blade.php`文件中可以找到。~~

评论功能已更新，在后台的设置里面，添加一个字段，名称为 `duoshuo_key`，值为你在多说设置或得到的网站id字符串。当然，还是可以像以前一样在`resources/views/front/post.blade.php`中替换为其他的评论系统。

首页截图：

![首页截图](https://ooo.0o0.ooo/2015/12/20/567648fea7ae4.png)


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