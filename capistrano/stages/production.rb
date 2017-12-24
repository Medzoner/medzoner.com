set :ssh_user, 'medzoner'
server "176.31.251.134", user: 'deploy', roles: %w{web app db}, port: 50505

set :stage, :production
set :branch, "master"
set :rails_env, :production

set :deploy_to,   "/var/www/medzoner"
set :crontab_file, 'crontab_prod.txt'

desc "Start docker with composer install"
task :composer_install do
    on 'medzoner@medzoner.com' do
      within "/var/www/medzoner/current/" do
        execute "./run-prod.sh"
      end
    end
end

#namespace :deploy do
#  after :finished, 'composer_install'
#end



######################################################################
#### SYMFONY environment (enabled) | env=DEV
######################################################################
set :symfony_env,  "dev"
set :composer_install_flags, '--verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader'

##################################
#### TASK: Composer
##################################
SSHKit.config.command_map[:composer] = "php /var/www/medzoner/shared/composer.phar"
