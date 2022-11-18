# ext-demo

## Сборка проекта
1. устанавливаем зависимости и создаем сборку
### backend
```bash
composer update
composer app:build
```
### frontend
```bash
yarn install
yarn build
```
2. архивируем содержимое папки src
```bash
tar -cvf archive.tar src/_meta src/htdocs src/plib src/meta.xml
```
3. устанавливаем экстеншн


## Разработка проекта
Устанавливаем зависимости и создаем сборку
### backend
```bash
composer update
composer app:build
```
После каждого коммита запускайте:
- Для изменения файлов по стандартам PSR
```bash
composer cs-fix
```
- Для анализа кода
```bash
composer ci:psalm
```
- Для анализа архитектуры и взаимодействия слоев
```bash
composer ci:architectural-violations
```
- Тесты
```bash
composer test
```

### frontend
Устанавливаем зависимости и включаем автосборку
```bash
yarn install
yarn dev
```
Для форматирования кода по стандартам
```bash
yarn lint
```

## Что умеет skeleton?

- [Конфигурировать](docs/backend/CONFIG.mdO) backend приложение
- Собирать DI [контейнер](docs/backend/DI.md) и кэшировать его
- Собирать backend приложение
- Собирать [frontend приложение](docs/frontend/FRONTEND.md)
- Управлять стандартным [роутингом](docs/backend/ROUTING.md) Plesk
- Управлять кастомным [роутингом](docs/backend/ROUTING.md)
- Показывать как работать с [Plesk зависимостями](docs/backend/PLESK-DEPENDENCE.md)
- Подготавливать состояние данных с backend во frontend
- Выполнять несколько [useCases](docs/backend/USECASES.md)
- unit и integration test базирующиеся на phpunit

## [Описание backend приложения](docs/backend/BACKEND.md)
## [Описание frontend приложения](docs/frontend/FRONTEND.md)

