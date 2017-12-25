set :ssh_user, 'medzoner'
server "176.31.251.134", user: 'deploy', roles: %w{web app db}, port: 50505

set :stage, :production
set :branch, "master"
set :rails_env, :production

set :deploy_to,   "/var/www/medzoner"


######################################################################
#### SYMFONY environment (enabled) | env=DEV
######################################################################
set :symfony_env,  "prod"
set :composer_install_flags, '--verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader'

##################################
#### TASK: Composer
##################################
SSHKit.config.command_map[:composer] = "php /var/www/medzoner/shared/composer.phar"
