set :deploy_config_path, "capistrano/config.rb"
set :stage_config_path, "capistrano/stages/"

require 'sshkit'
require 'sshkit/dsl'
include SSHKit::DSL

require 'capistrano/setup'
require 'capistrano/deploy'

Dir.glob('capistrano/tasks/*.cap').each { |r| import r }

