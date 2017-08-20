set :application, 'medzoner'
set :repo_url,  "git@github.com:Medzoner/medzoner.com.git"

set :scm, :git

set :format, :pretty
set :log_level, :debug

set :keep_releases, 3

set :linked_files, %w{./.env app/config/parameters.yml}
set :linked_dirs, %w{vendor web/uploads}