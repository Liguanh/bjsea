###北京极限运动协会实例

####使用环境和软件
- Laravel5.2
- docker17.06 for Mac
- RBAC后台权限管理
- devops

####说明
>这是一个基于laravel5.2框架的企业站，主要是服务是北京极限运动协会，包括前端文章展示以及管理后台的文章管理, 在此基础上集成了docker，执行脚本命令后可以在本地拉取容器，主要包括PHP7，nginx-fpm, mysql5.7,redis....
实现简单快捷的环境搭建，减少了本地实体环境搭建浪费的时间问题。


#### docker容器环境的部署安装步骤

- 执行 `sh manager.sh clean_all` 清除当前容器
- 执行 `sh manage.sh init_app` 初始化当前环境
- 执行 `sh manager.sh new_app` 拉取容器镜像 
- 执行成功后,按照访问界面输出的url地址即可
- 数据的.env已经配置完毕了
- 默认后台账号:admin@admin.com 密码:admin

