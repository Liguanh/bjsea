#!/bin/bash
set -e

function run_busybox()
{
    local args=''
    args="$args -v $project_dir:$project_dir"
    run_cmd "docker run $args --name $busybox_container $busybox_image /bin/true"
}

function rm_busybox()
{
    rm_container $busybox_container
}


