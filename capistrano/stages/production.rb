set :ssh_user, 'medzoner'
server 'medzoner.com', user: fetch(:ssh_user), roles: %w{}

set :stage, :production
set :branch, "master"
set :rails_env, :production

set :deploy_to,   "/var/www/medzoner"

desc "Start docker with composer install"
task :composer_install do
    on 'medzoner@medzoner.com' do
      within "/var/www/medzoner/current/" do
        execute "./run.sh"
      end
    end
end

namespace :deploy do
  after :finished, 'composer_install'
end