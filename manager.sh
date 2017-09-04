#!/bin/bash 
set -e

#------------------
# 项目目录信息初始化
#-------------------
#项目目录
project_dir=$(cd $(dirname $0);pwd -P)
#项目devops的目录
project_devops_dir="$project_dir/devops"
#开发者
developer=$("whoami");
#加载基本函数
source "$project_devops_dir/base.sh"

#-----------------------------------
# 配置信息处理 先获取.env后期优化
#------------------------------------

#基本的配置内容获取
app_name=$(read_kv_config  bjesa_config APP_NAME) #项目名称
app_env=$(read_kv_config bjesa_config APP_ENV) #项目环境
mysql_port=$(read_kv_config bjesa_config MYSQL_PORT) #数据库mysql端口号
nginx_port=$(read_kv_config bjesa_config NGINX_PORT) #nginx端口号
php_fpm_port=$(read_kv_config bjeas_config PHP_FPM_PORT) #php-fpm的端口号
web_site=$(read_kv_config bjeas_config WEB_SITE) #网站站点设置域名

#应用的前缀名称
app="$developer-$app_name"


#定义要拉取的镜像文件
busybox_image=hoseadevops/own-busybox
syslogng_image=hoseadevops/own-syslog-ng
redis_image=hoseadevops/own-redis:3.0.1
mysql_image=hoseadevops/own-mysql:5.7
php_image=hoseadevops/own-php:7.1.7-fpm
nginx_image=hoseadevops/own-nginx:1.11

#定义容器的名字
busybox_container=$app-busybox
syslogng_container=$app-syslog-ng
redis_container=$app-redis3.0.1
mysql_container=$app-mysql5.7
php_container=$app-php7.1.7
nginx_container_fpm=$app-nginx-fpm

#容器相关的目录定义
project_devops_busybox_path="$project_devops_dir/busybox" 
project_devops_syslogng_dir="$project_devops_dir/syslog-ng"
project_devops_redis_dir="$project_devops_dir/redis"
project_devops_mysql_path="$project_devops_dir/mysql"
project_devops_php_dir="$project_devops_dir/php"
project_devops_nginx_dir="$project_devops_dir/nginx"
project_devops_runtime_dir="$project_devops_dir/runtime"           # app runtime
project_devops_persistent_dir="$project_devops_dir/persistent"     # app persistent

# 个人配置demo
app_config="$project_devops_persistent_dir/config"

#引入各容器的sh文件
source $project_devops_busybox_path/busybox.sh
source $project_devops_syslogng_dir/syslog.sh
source $project_devops_redis_dir/redis.sh
source $project_devops_mysql_path/mysql.sh
source $project_devops_php_dir/php-fpm.sh
source $project_devops_nginx_dir/nginx.sh


#初始化app应用
function init_app()
{
    clean_all
}

#创建新应用
function new_app()
{
    run_container
}

#---------------------------------
# clean相关的函数
#---------------------------------

#清除所有信息包括容器和数据
function clean_all()
{
    clean_container
    clean_runtime
    clean_persistent
}

#清理容器相关
function clean_container()
{
    rm_syslog
    rm_busybox
    rm_mysql
    rm_redis
    rm_php
    rm_nginx_fpm
}

#清理运行日志相关文件
function clean_runtime()
{
    run_cmd "rm -rf $project_devops_runtime_dir/app"
    run_cmd "rm -rf $project_devops_runtime_dir/crontab"
    run_cmd "rm -rf $project_devops_runtime_dir/nginx-fpm"
    run_cmd "rm -rf $project_devops_runtime_dir/php"
    run_cmd "rm -rf $project_devops_runtime_dir/mysql"
    run_cmd "rm -rf $project_devops_runtime_dir/sys-log"
}

#清理用户配置相关信息
function clean_persistent()
{
    run_cmd "rm -f $project_devops_persistent_dir/config"
    run_cmd "rm -rf $project_devops_persistent_dir/mysql"
    run_cmd "rm -rf $project_devops_persistent_dir/nginx-fpm-config"
}

#----------------------------------
# 初始化环境相关支持函数 
#---------------------------------

#创建配置相关文件
function build_config()
{
	echo php_container=$php_container > $project_devops_persistent_dir/config
    echo php_fpm_port=$php_fpm_port >> $project_devops_persistent_dir/config
    echo dk_nginx_domain=$web_site >> $project_devops_persistent_dir/config
    echo dk_nginx_root=$project_dir/public >> $project_devops_persistent_dir/config
    echo open_basedir=$project_dir:/tmp/:/proc/ >> $project_devops_persistent_dir/config

    recursive_mkdir "$project_devops_persistent_dir/nginx-fpm-config"
    recursive_mkdir "$project_devops_persistent_dir/mysql/data"

    run_cmd "replace_template_key_value $project_devops_persistent_dir/config $project_devops_nginx_dir/nginx-fpm-config-template/fastcgi $project_devops_persistent_dir/nginx-fpm-config/fastcgi"
    run_cmd "replace_template_key_value $project_devops_persistent_dir/config $project_devops_nginx_dir/nginx-fpm-config-template/hosea.conf $project_devops_persistent_dir/nginx-fpm-config/hosea.conf"
    run_cmd "replace_template_key_value $project_devops_persistent_dir/config $project_devops_php_dir/config-template/.user.ini $project_path/public/.user.ini"

    cat $project_devops_persistent_dir/config
    cat $project_devops_persistent_dir/nginx-fpm-config/hosea.conf
}

#运行相关的容器
run_container()
{
    run_syslog
    run_busybox
    run_mysql
    run_redis
    run_php
    run_nginx_fpm
}

