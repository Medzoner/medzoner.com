set :user, "medzoner"
set :application, "Medzoner"
set :domain,      "medzoner.com"
set :home, "/home/medzoner"
set :deploy_to, "#{home}/#{domain}"
set :deploy_to,   "/home/medzoner/www/medzoner"
set :app_path,    "app"

set :repository,  "git@bitbucket.org:MEdzoner/medzoner.git"
set :branch, "prod"
set :scm, :git
set :deploy_via, :remote_cache
set :copy_exclude, [ '.git' ]

set :model_manager, "doctrine" # ORM

role :web, domain
role :app,        domain, :primary => true

set :use_sudo, false
set :keep_releases, 3 #

## Symfony2
set :shared_files, ["app/config/parameters.yml"]
set :shared_children, [app_path + "/logs", "vendor"]
set :use_composer, true
set :update_vendors, false
#set :composer_options, "--verbose --prefer-dist"
#set :writable_dirs, ["app/cache", "app/logs"]
#set :webserver_user, "medzoner"
#set :permission_method, :chown
set :writable_dirs,     ["app/cache", "app/logs"]
set :webserver_user,    "medzoner"
set :permission_method, :acl
set :use_set_permissions, true

#default_run_options[:pty] = true
#ssh_options[:forward_agent] = true

logger.level = Logger::MAX_LEVEL

after "deploy:finalize_update" do
#run "chown -R www-data:www-data #{latest_release}"
#run "chmod -R 777 #{latest_release}/#{cache_path}"
#run "chmod -R 777 #{latest_release}/#{log_path}"
end