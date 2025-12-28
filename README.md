Для запуска необходимо чтобы локально были установлены git, docker, composer.
Клонируем репозиторий
```
git clone https://github.com/bendergrek/smarta-test ./test
```

Все дальнейшие команды необходимо выполнять в директории `test`
```
cd ./test
```

Устанавливаем зависимости
```
composer install
```

Запускаем сборку и старт образа
```
./vendor/bin/sail up -d
```

Установка node зависимостей
```
./vendor/bin/sail npm install
```

Необходимо выполнить миграции с засеиванием
```
./vendor/bin/sail php artisan migrate --seed
```

Сборка vite
```
./vendor/bin/sail npm run build
```
Автоматом будет создано два пользователя:
`admin@example.com` и `test@example.com` пароль у обоих `password`
