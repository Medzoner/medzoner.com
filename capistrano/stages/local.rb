set :ssh_user, 'medzoner'
server '127.0.0.1', user: fetch(:ssh_user), roles: %w{}

set :stage, :local
set :branch, "master"
set :rails_env, :production

set :deploy_to,   "/var/www/medzoner"