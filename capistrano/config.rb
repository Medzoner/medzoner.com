set :application, 'medzoner'
set :repo_url,  "git@bitbucket.org:MEdzoner/medzoner.git"

set :ssh_user, 'medzoner'
server 'medzoner.com', user: fetch(:ssh_user), roles: %w{}

set :scm, :git

set :format, :pretty
set :log_level, :debug

set :composer_install_flags, '--dev --prefer-dist --no-interaction --optimize-autoloader'

set :linked_files, %w{app/config/parameters.yml}
set :linked_dirs, %w{app/logs web/uploads}

set :keep_releases, 3


set :npm_target_path, -> { release_path.join('') }
set :npm_flags, ''
set :npm_roles, :all
set :npm_env_variables, {}

set :bower_flags, '--config.interactive=true'
set :bower_roles, :all
set :bower_target_path, "#{release_path}"
set :bower_bin, '/usr/bin/bower'

set :gulp_executable, 'gulp'

after 'deploy:updated', 'medzoner:database'
after 'deploy:updated', 'npm:install'
after 'deploy:updated', 'bower:install'
after 'deploy:updated', 'gulp'

after 'deploy:finishing', 'deploy:cleanup'

