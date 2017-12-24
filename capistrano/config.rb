set :application, 'medzoner'
set :repo_url,  "git@github.com:Medzoner/medzoner.com.git"

set :scm, :git

set :format, :pretty
set :log_level, :debug

set :keep_releases, 3

set :linked_files, %w{app/config/parameters.yml}
set :linked_dirs, %w{web/uploads}

namespace :deploy do
    desc "install crontab"
    task :install_crontab do
      run "crontab #{latest_release}/#{crontab_file}"
    end
end

#after "deploy:cleanup", "deploy:install_crontab"