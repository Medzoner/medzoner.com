set :application, 'medzoner'
set :repo_url,  "git@github.com:Medzoner/medzoner.com.git"

set :scm, :git

set :format, :pretty
set :log_level, :debug

set :keep_releases, 3

set :linked_files, %w{.env app/config/parameters.yml}
set :linked_dirs, %w{vendor web/uploads}


desc "Start docker with composer install"
task :composer_install do
    on 'medzoner@93.113.206.134' do
      within "/var/www/medzoner/current/" do
        execute "./run.sh"
      end
    end
end

namespace :deploy do
  after :finished, 'composer_install'
end