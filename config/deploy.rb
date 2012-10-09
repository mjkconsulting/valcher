set :application, "mobilegates api"
set :repository,  "http://oren.selfip.net/svn/mobilegates/branches/api-1.0"

# deployment dir
set :deploy_to, "/var/www/html/api.mobilegates"
set :scm, :subversion
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`

role :web, "Apache"                          # Your HTTP server, Apache/etc
role :app, "Apache"                          # This may be the same as your `Web` server
role :db,  "localhost", :primary => true # This is where Rails migrations will run
role :db,  ""

# If you are using Passenger mod_rails uncomment this:
# if you're still using the script/reapear helper you will need
# these http://github.com/rails/irs_process_scripts

# namespace :deploy do
#   task :start do ; end
#   task :stop do ; end
#   task :restart, :roles => :app, :except => { :no_release => true } do
#     run "#{try_sudo} touch #{File.join(current_path,'tmp','restart.txt')}"
#   end
# end
