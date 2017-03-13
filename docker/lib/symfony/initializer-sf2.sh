#!/usr/bin/env bash

function symfonyInit() {
    INDEX=0;
    for PROJECT in ${PROJECTS[*]}
    do
        INDEX=$((INDEX + 1))
        PATH_PROJECT="${PATH_PROJECTS}/${PROJECT}/current"
        echo "********************************************[${PROJECT}]***********************************************";

        touch "${PATH_PROJECT}/app/config/dev_ip.ini"
        cd "${PATH_PROJECTS}"
        PROJECT_UID=${INDEX}
        source "${PATHBASE}/app/startProject"
        echo -n "ips[] = $(docker-container-ip-gateway "nginx-${INDEX}")" > "${PATH_PROJECT}/app/config/dev_ip.ini"

        parametersYaml ${PROJECT} ${PATH_PROJECT}
    done
}

function parse_yaml {
    local prefix=$2
    local s='[[:space:]]*' w='[a-zA-Z0-9_]*' fs=$(echo @|tr @ '\034')
    sed -ne "s|^\($s\):|\1|" \
        -e "s|^\($s\)\($w\)$s:$s[\"']\(.*\)[\"']$s\$|\1$fs\2$fs\3|p" \
        -e "s|^\($s\)\($w\)$s:$s\(.*\)$s\$|\1$fs\2$fs\3|p"  $1 |
    awk -F$fs '{
        indent = length($1)/2;
        vname[indent] = $2;

        for (i in vname) {
            if (i > indent) {
                delete vname[i]
            }
        }

        if (length($3) > 0) {
            vn="";
            for (i=0; i<indent; i++) {
                vn=(vn)(vname[i])
            }
            printf("%s", vn);
            printf("\n");
            printf("%s=\"%s\"\n", $2, $3);
            PARAMS[((0))]=$2;
        }
    }'
}

function parametersYaml() {
    #sed -ri 's/^(\s*)(site_host_name\s*:\s*null\s*$)/\1site_host_name: '"$1"'/' "$2/app/config/parameters.yml"
    #sed -ri sed -i.bak -e 's/site_host_name: .*/&2/' "$2/app/config/parameters.yml"

    PARAMS[0]="";
    parse_yaml "$2/app/config/parameters.yml"

    echo "-------------------"
    echo ${PARAMS[0]}
}
