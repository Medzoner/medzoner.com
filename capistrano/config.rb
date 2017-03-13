set :application, 'medzoner'
set :repo_url,  "git@bitbucket.org:MEdzoner/medzoner.git"

set :ssh_user, 'root'
server '93.113.206.134', user: fetch(:ssh_user), roles: %w{}

set :scm, :git

set :format, :pretty
set :log_level, :debug

set :keep_releases, 3



