#!/bin/bash

# Add local user
echo "User local user with UID: $USER_UID  GID: $USER_GID"

#assign host user id to local user and create home dir for mapping with host
usermod -u $USER_UID -d  /home/www-data www-data 2> /proc/self/fd/2 && {
  groupmod -g $USER_GID www-data 2> /proc/self/fd/2 || usermod -a -G $USER_GID www-data
}

#composer permissions (cache)
chown www-data:www-data -R /composer


#add private ssh
eval $(ssh-agent -s)
ssh-add $SSH_PRIVATE_KEY

exec "$@"