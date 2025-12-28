Клонируем репозиторий
```
git clone https://github.com/bendergrek/smarta-test ./test
```

Все дальнейшие команды необходимо выполнять в директории `test`

Устанавливаем зависимости
```
composer install
```

Запускаем сборку образов
```
./vendor/bin/sail install
```

Стартуем образ
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
