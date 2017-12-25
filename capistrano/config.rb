lock "3.9.0"

set :application, 'medzoner'
set :repo_url,  "git@github.com:Medzoner/medzoner.com.git"

set :use_sudo, false

set :scm, :git

set :format, :pretty
set :log_level, :debug

set :keep_releases, 3

set :linked_files, %w{app/config/parameters.yml}
set :linked_dirs, %w{web/uploads}

after 'deploy:starting', 'composer:install_executable'