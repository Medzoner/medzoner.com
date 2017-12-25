set :ssh_options, keys: ["config/deploy_id_rsa"] if File.exist?("config/deploy_id_rsa")

set :deploy_config_path, "capistrano/config.rb"
set :stage_config_path, "capistrano/stages/"

require 'sshkit'
require 'sshkit/dsl'
include SSHKit::DSL

require 'capistrano/setup'
require 'capistrano/deploy'
require "capistrano/composer"

# Include symfony tasks
gem 'capistrano-symfony', github: 'TheBigBrainsCompany/capistrano-symfony', branch: 'parameters'
require 'capistrano/symfony-doctrine'

# Load the SCM plugin appropriate to your project:
require "capistrano/scm/git"
install_plugin Capistrano::SCM::Git

Dir.glob('capistrano/tasks/*.cap').each { |r| import r }

