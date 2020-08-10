# Kindle-Library-Serve

一个用于支持 Kindle 内置浏览器下载自己书库内书籍的 PHP 程序

### 项目背景

早些时候在图灵社区买了一些电子书,后来又收集了一些,渐渐的攒了一个小的书库,书籍按照文件管理的,方便迁移,其中也试过用 (Calibre)[https://calibre-ebook.com/] 来管理书籍,Calibre 会复制一份,这样就需要双倍空间,之后 PC 一直用 [Alfa eBooks Manager](https://www.alfaebooks.com/) 管理电子书,后来购买了一台家用 [TerraMaster NAS(中文名:铁威马)](https://www.terra-master.com/cn/),文件迁移到 NAS 上,用 Kindle 内置浏览器访问 NAS 上的文件时,发现这个浏览器只支持 http 和 https 访问,NAS 常用的协议毫无用武之地,尝试直接从后台登录,好不容易登录进去,后台一片空白,气的我直接从床上跳起来,赶紧找出大佬开发的[Veno File Manager](https://filemanager.veno.it/),一顿操作猛如虎,kindle 打开的时候一直在转圈圈, What?,心里哇凉哇凉的,看看时间,还是洗洗睡吧.

拿着 kindle,思前想后,要是不能搞定这件事,我昨天的夜不是白熬了吗,查资料,CV,调试,折腾出了这个跑在 NAS 上 web 服务器的 PHP 程序,功能就只有一个:支持 kindle 内置浏览器从 NAS 上下载电子书文件,我是吃多了撑的吗.....

特此记录,感谢那些 SB 的日子.

### 功能

- 打开目录
- 下载文件
- 屏蔽 Kindle 不支持文件

: 后续有空在完善一个登录功能,这样内网映射就妥妥的了

### 安装

下载文件放到网站根目录,再把书库拷贝到 library 下就好了

### 使用

用 kindle 内置浏览器访问 ip

### 注意事项

没有实现登录验证,为保证您的数据安全,请不要暴露在公网上

### 开源协议

MIT License
