set :ssh_user, 'medzoner'
server '93.113.206.134', user: fetch(:ssh_user), roles: %w{}

set :stage, :production
set :branch, "master"
set :rails_env, :production

set :deploy_to,   "/var/www/medzoner"