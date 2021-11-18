rm -f bootstrap/cache/config.php
git fetch && git pull && git merge origin/master && git merge origin/staging && 
# ./vendor/bin/sail composer update && 
./vendor/bin/sail npm install && 
# ./vendor/bin/sail npm update && 
./vendor/bin/sail npm run dev && 


docker exec -ti tall-stack-tennis_laravel.test_1 vendor/bin/ecs check --fix && 
docker exec -ti tall-stack-tennis_laravel.test_1 vendor/bin/psalm --show-info=false --no-cache &&
docker exec -ti tall-stack-tennis_laravel.test_1 ./vendor/bin/phpstan analyse &&
# ./vendor/bin/sail artisan migrate:fresh --seed && 
./vendor/bin/sail test && 
sudo chown llewellyn:www-data -R . && 
./vendor/bin/sail artisan route:list

