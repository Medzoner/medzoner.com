set :user, "medzoner"
set :application, "Medzoner"
set :domain,      "medzoner.com"
set :deploy_to,   "/home/medzoner/www/medzoner"
set :app_path,    "app"

set :repo_url,  "git@bitbucket.org:MEdzoner/medzoner.git"
set :branch, "master"
set :scm, :git
set :deploy_via, :remote_cache
set :copy_exclude, [ '.git' ]

set :model_manager, "doctrine" # ORM

role :web, 'medzoner.com'
role :app,        'medzoner.com', :primary => true

set :use_sudo, false


## Symfony2
set :shared_files, ["app/config/parameters.yml"]
set :shared_children, ["app/logs", "vendor"]
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

set :npm_target_path, -> { release_path.join('') }
set :npm_flags, ''
set :npm_roles, :all
set :npm_env_variables, {}

set :bower_flags, '--config.interactive=true'
set :bower_roles, :all
set :bower_target_path, "#{release_path}"
set :bower_bin, '/usr/bin/bower'

set :gulp_executable, 'gulp'

after 'deploy:finishing', 'deploy:cleanup'

namespace :deploy do
  after :finished, 'npm:install'
  after :finished, 'bower:install'
  after :finished, 'gulp'
end