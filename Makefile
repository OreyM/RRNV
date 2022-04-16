include ./_makefiles/settings/Makefile

# App
commands:
	php artisan list

app\:clr:
	php artisan config:cache
	php artisan event:cache
	php artisan route:cache
	php artisan view:clear
app\:clr\:c:
	php artisan config:cache
app\:clr\:v:
	php artisan view:clear
app\:clr\:cr:
	php artisan config:cache
	php artisan route:cache
app\:dbg:
	php artisan debugbar:clear

key:
	php artisan key:generate

storage:
	php artisan storage:link

serve:
	@[ "${port}" ] && php artisan serve --port=$(port) || ( php artisan serve )

up: # Bring the application out of maintenance mode
	php artisan up
down: # Put the application into maintenance / demo mode
	php artisan down

optimize:
	php artisan optimize

tinker:
	php artisan tinker

# Providers
provider:
	php artisan make:provider $(filter-out $@, $(MAKECMDGOALS))

# Routes
rt:
	php artisan route:list
rt\:g:
	php artisan route:list | grep -i $(filter-out $@, $(MAKECMDGOALS))
rt\:clr:
	php artisan route:cache

# Controllers
ctrl:
	php artisan make:controller $(filter-out $@,$(MAKECMDGOALS)) --test
	@[ "${model}" ] && php artisan make:model $(model) --test || ( echo '' )
	@[ "${request}" ] && php artisan make:request $(request) || ( echo '' )
ctrl\:i:
	php artisan make:controller $(filter-out $@,$(MAKECMDGOALS)) --invokable --test
ctrl\:rs:
	php artisan make:controller $(filter-out $@,$(MAKECMDGOALS)) --resource --test
ctrl\:api:
	php artisan make:controller $(filter-out $@,$(MAKECMDGOALS)) --api --test
ctrl\:h:
	php artisan make:controller --help

# Requests
request:
	php artisan make:request $(filter-out $@,$(MAKECMDGOALS))

# Rules
rule:
	php artisan make:rule $(filter-out $@,$(MAKECMDGOALS))
rule\:i:
	php artisan make:rule $(filter-out $@,$(MAKECMDGOALS)) --implicit

# Models
model:
	php artisan make:model $(filter-out $@,$(MAKECMDGOALS)) --test
model\:f:
	php artisan make:model $(filter-out $@,$(MAKECMDGOALS)) --factory --test
model\:m:
	php artisan make:model $(filter-out $@,$(MAKECMDGOALS)) --migration --test
model\:s:
	php artisan make:model $(filter-out $@,$(MAKECMDGOALS)) --seed --test
model\:p:
	php artisan make:model $(filter-out $@,$(MAKECMDGOALS)) --pivot --test
model\:plc:
	php artisan make:model $(filter-out $@,$(MAKECMDGOALS)) --policy --test
model\:ide:
	php artisan ide-helper:models --dir="app/Models"
model\:h:
	php artisan make:model --help

# Seeders
seeder:
	php artisan make:seeder $(filter-out $@,$(MAKECMDGOALS))

# Resources
res:
	php artisan make:resource $(filter-out $@,$(MAKECMDGOALS))
res\:col:
	php artisan make:resource $(filter-out $@,$(MAKECMDGOALS)) --collection

# Observer
observer:
	@[ "${model}" ] && php artisan make:observer $(filter-out $@,$(MAKECMDGOALS)) --model=$(model) || ( php artisan make:observer $(filter-out $@,$(MAKECMDGOALS)) )

# Database
migration:
	php artisan make:migration $(filter-out $@,$(MAKECMDGOALS))
migration\:h:
	php artisan make:migration --help
migrate:
	php artisan migrate
status:
	php artisan migrate:status
fresh:
	php artisan migrate:fresh
refresh:
	php artisan migrate:refresh --seed
reset:
	php artisan migrate:reset
rollback:
	@[ "${step}" ] && php artisan make:rollback --step=$(step) || ( php artisan make:rollback )
wipe: # Drop all tables, views, and types
	php artisan db:wipe
factory:
	php artisan make:factory $(filter-out $@,$(MAKECMDGOALS))

# Notifications
note:
	@[ "${md}" ] && php artisan make:notification $(filter-out $@,$(MAKECMDGOALS)) --test --markdown=$(md) || ( php artisan make:notification $(filter-out $@,$(MAKECMDGOALS)) --test )
note\:h:
	php artisan make:notification --help

# Events && Listeners
event:
	php artisan make:event $(filter-out $@,$(MAKECMDGOALS))
events:
	php artisan event:list
event\:clr:
	php artisan event:cache
event\:gen:
	php artisan event:generate
event\:h:
	php artisan make:event --help

list:
	@[ "${event}" ] && php artisan make:listener $(filter-out $@,$(MAKECMDGOALS)) --event=$(event) --test || ( php artisan make:listener $(filter-out $@,$(MAKECMDGOALS)) --test )
list\:h:
	php artisan make:listener --help

# Jobs
job:
	php artisan make:job $(filter-out $@,$(MAKECMDGOALS)) --test
job\:s:
	php artisan make:job $(filter-out $@,$(MAKECMDGOALS)) --sync --test
job\:h:
	php artisan make:job --help

# Queues
qu\:work:
	php artisan queue:work --help
qu\:list:
	php artisan queue:listen --help
qu\:monitor: # add names of the queues to monitor
	php artisan queue:monitor $(filter-out $@,$(MAKECMDGOALS))
qu\:clr:
	@[ "${queue}" ] && php artisan queue:clear --queue=$(queue) || ( php artisan queue:clear )
qu\:fail:
	php artisan queue:failed
qu\:flush:
	php artisan queue:flush
qu\:forget: # queue:forget <id>
	php artisan queue:forget $(filter-out $@,$(MAKECMDGOALS))
qu\:retry:
	php artisan queue:retry $(filter-out $@,$(MAKECMDGOALS))
qu\:rest:
	php artisan queue:restart

# Channels
chan:
	php artisan make:channel $(filter-out $@,$(MAKECMDGOALS))
chan\:h:
	php artisan make:channel --help

# Mails
mail:
	@[ "${md}" ] && php artisan make:mail $(filter-out $@,$(MAKECMDGOALS)) --test --markdown=$(md) || ( php artisan make:mail $(filter-out $@,$(MAKECMDGOALS)) --test )
mail\:h:
	php artisan make:mail --help

# Middlewares
middl:
	php artisan make:middleware $(filter-out $@,$(MAKECMDGOALS)) --test
middl\:h:
	php artisan make:middleware --help

# Exceptions
exc:
	php artisan make:exception $(filter-out $@,$(MAKECMDGOALS))
exc\:rn: # Create the exception with an empty render method
	php artisan make:exception $(filter-out $@,$(MAKECMDGOALS)) --render
exc\:rp: # Create the exception with an empty report method
	php artisan make:exception $(filter-out $@,$(MAKECMDGOALS)) --report
exc\:h:
	php artisan make:exception --help

# Tests
test:
	php artisan test
test\:f:
	php artisan make:test
test\:u:
	php artisan make:test --unit
test\:p:
	php artisan make:test --pest

# Passports
passport\:i:
	php artisan passport:install
passport\:k:
	php artisan passport:keys

# Websockets
ws\:serve:
	php artisan websockets:serve --host=$(host) --port=$(port)
ws\:serve\:def:
	php artisan websockets:serve
ws\:dd:
	php artisan websockets:serve --host=$(host) --port=$(port) --debug
ws\:dd\:def:
	php artisan websockets:serve --debug
ws\:clr: # websockets:clean [<appId>]
	php artisan websockets:clean $(filter-out $@,$(MAKECMDGOALS))
ws\:rest:
	php artisan websockets:restart

# DON'T DEL THIS!!!
%:
	@true
