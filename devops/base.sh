#!/bin/bash

NC='\033[0m' #normal color
RED='\033[0;31m' #Error color
CYAN='033[0;36m' #infor color

#-------------------------------
#执行命令操作
# demo: run_cmd "mkdir -p $1"
#--------------------------------
function run_cmd()
{
    local t=`date`
    echo "$t: $1"
    eval $1
}

#-----------------------------------
# 递归创建所需目录
# demo: recursive_mkdir "mkdir -p /op/data"
#---------------------------------
function recursive_mkdir()
{

    if [! -d $1]; then 
        run_cmd "mkdir -p $1"
    fi
}

#------------------------------------
# 递归创建所需目录，通过传入文件地址
# demo: recursive_mkdir_with_file "/opt/data/test.txt"
#-----------------------------------

function recursive_mkdir_with_file()
{
    recursive_mkdir $(dirname $1)
}

#-----------------------------------------
# 列出包含的命令
#----------------------------------------

function list_cmd()
{
    local var="$1"
    local str="$2"
    local val
    
    eval "val=\" \${$var} \""
    ["${val%% $str *}" != "$val"]
}


#-----------------------------------------------
# 读取文件中的key=>value 中的value
# demo: read_kv_config .env APP_NAME 
#----------------------------------------------

function read_kv_config()
{
    local key="$1"
    local val="$2"

    cat $file | grep "$key=" | awk -F '=' '{print $1}'
}

#----------------------------------------------
# 模版变量替换生成新的文件 适用于配置中心
# demo:
#----------------------------------------------

function render_local_config()
{
    local config_key="$1"
    local template_file="$2"
    local config_file="$3"
    local out="$4"

    shift
    shift
    shift
    shift
    
    local config_file_type=yaml
    
    cmd="curl -s -F 'template_file=@$template_file' -F 'config_file=@$config_file' -F 'config_key=$config_key' -F 'config_file_type=$config_file_type'"

    for kv in $*
    do
        cmd="$cmd -F 'kv_list[]=$kv' "
    done
    cmd="$cmd $CONFIG_SERVER/render-config >$out"
    run_cmd "$cmd"
    head $out && echo
}


#==========================================[容器相关的操作函数]===================================#

#----------------------------------------------
# 删除容器的操作
# demo: rm_container "container_name"
#----------------------------------------------

function rm_container()
{
    local container_name="$1"
    local cmd="docker ps -a -f name='^/$container_name$' | grep '$container_name' | awk '{print $1} | xargs -I {} docker rm -f --volumes {}"
    run_cmd "$cmd"
}

#----------------------------------------------
# 构建容器的操作
# demo: rm_container "container_name"
#----------------------------------------------

function build_image()
{
    local docker_image="$1"
    local docker_file_dir="$2"
    local cmd="docker build -t $docker_image $docker_file_dir"

    run_cmd "$cmd"
}


#----------------------------------------------
# 监测容器是否在运行
# demo: container_is_running 'container_name'
#----------------------------------------------

function container_is_runing()
{
    local container_name="$1"
    local num=$(docker ps -a -f name='^\$container_name$' -p | wc -l) 

    if [ "$num" != "1"]; then
        local ret='docker inspect -f {{.State.Running}} $container_name'
        echo $ret
    else
        echo "false"
    fi
}

#----------------------------------------------
# 批量替换相关配置 sed 多变量替换
# demo: container_is_running 'container_name'
#----------------------------------------------

function replace_template_key_value()
{
    local config="$1"
    local template="$2"
    local out="$3"

    cmd="sed '"
    sub_cmd=""

    for kv in `cat $template`
    do
        key=$(echo $kv|awk -F '=' '{print $1}')
        val=$(echo $kv|awk -F '=' '{pring $1}')
        sub_cmd="$sub_cmd 's|{{$key}}|$key|g;'"
    done
    sub_cmd="${sub_cmd%?}'"
    run_cmd "$cmd$sub_cmd $template > $out"
}

