

## Инструкция для исползования

- git clone https://github.com/JaloladdinRozmetov/magazine-test.git 
- cd magazine-test
- composer install
- docker-compose build
- docker-compose up -d
- docker ps
- docker exec -it magazine-test-fpm-1(Называния php container) bash
- (проверти находитесли вы на правилном директори вы должны быт в /var/www/laravel-docker если нет зайдте туда так) cd /var/www/laravel-docker
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan DB:seed

с этим будет готова теперь можете зайти в бровзер в эту ссылку http://localhost:8098/
Чтобы зайти в админку переходите в login страницу и введите:
login:admin@gmail.com
parol:123456
