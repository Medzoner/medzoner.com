set :deploy_config_path, "capistrano/config.rb"
set :stage_config_path, "capistrano/stages/"

require 'capistrano/setup'
require 'capistrano/deploy'

require 'capistrano/composer'
require 'capistrano/symfony'

require 'capistrano/npm'
require 'capistrano/bower'
require 'capistrano/gulp'

Dir.glob('capistrano/tasks/*.cap').each { |r| import r }

