set :application, 'medzoner'
set :repo_url,  "git@bitbucket.org:MEdzoner/medzoner.git"

set :ssh_user, 'medzoner'
server '93.113.206.134', user: fetch(:ssh_user), roles: %w{}

set :scm, :git

set :format, :pretty
set :log_level, :debug

set :keep_releases, 3

set :linked_files, %w{docker/.env}
set :linked_dirs, %w{vendor web/uploads}


desc "Start composer install"
task :composer_install do
    on '93.113.206.134' do
      within "/var/www" do
        execute "./run.sh"
      end
      within "/var/www/medzoner/current/docker/" do
        execute "./run.sh"
      end
    end
end

namespace :deploy do
  after :finished, 'composer_install'
end