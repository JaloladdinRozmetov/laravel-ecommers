# Laravel E-Commerce

## Инструкция для исползования

### Клонирование проекта и копирование env

```bash
$ git clone https://github.com/JaloladdinRozmetov/magazine-test.git
$ cd laravel-ecommers
$ cp .env.example .env
```

### Запуск проекта через докер
```bash
$ docker-compose up -d
```

### Запускаем установку пакетов php (композер)
```bash
$ docker exec -it php.ecom composer install
```

### Генерация ключа и запуск миграции для Laravel
```bash
$ docker exec -it php.ecom php artisan key:generate
```

### Запуск миграции для Laravel
```bash
$ docker exec -it php.ecom php artisan migrate
```

### Чтобы заполнить БД заранее прописанными данными можно использовать seed
```bash
$ docker exec -it php.ecom php artisan DB:seed
```

#### Проект
Проект: http://localhost:8098/

#### Админка
Админ: http://localhost:8098/user/login \
login:admin@gmail.com \
parol:123456
