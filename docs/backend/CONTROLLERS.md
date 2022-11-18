
#### zend controllers
Zend контроллеры находятся `src/plib/controllers`, должны содержать в конце имени класса Controller и наследоваться от `pm_Controller_Action`
В таких контроллерах отсутствует внедрение зависимостей через конструктор посредствам аргументов, по этому все зависимости можно получить напрямую через контейнер:

```php
use PleskExt\Demo\DI\Container;

$container = new Container();
$someService = $container->get(SomeService::class);
```

И делать это можно с помощью композиции:

```php
use PleskExt\Demo\DI\Container;

public function __construct()
{
    $container = new Container();
    $this->someService = $container->get(SomeService::class);
}
```

В текущем примере extension это PWA. По этому вся View часть будет во Frontend.
Во `viewAction` происходит текущая настройка и конфигурирование Frontend. Мы сначала собираем нужные параметры, а потом просто выводим через `echo` это:
```php
<<<HTML
<div id="$moduleId"></div>
<script>
    require(['$pathToFrontendEntrypoint'], function (main) {
        main.default($params);
    });
</script>
HTML;
```

#### Symfony controllers
В данном примере маршруты в API будут управляться кастомными контроллерами. Их удобвство в том что они ничего не наследуют, поддерживают PSR-7, внедрение зависимостей и очень гибкие. Чтобы работали кастомные маршруты мы должны в zend-routes добавить правила:
```php
    'Default' => [
        'route' => ':controller/:action',
    ]
``` 
И для перехвата всех запросов (кроме тех что указаны в zend-routes), можно создать файл контроллер, в данном случае я создал [ApiController](../../src/plib/controllers/ApiController.php), в котором вызывается [Response::send()](../../src/plib/library/Http/Response.php). Он внутри себя:
- создает ServerRequestInterface
- через middlware находит **обработчика** уже в кастомых контроллерах
- отправляет заголовки
- выводит body (StreamInterface) на странице
- умирает

Вся магия поиска нужного **обработчика** кроется в middlware (PSR-15).

В класс [ApiController](../../src/plib/library/Http/ChainedRequestHandler.php) передаются все нужные цепочки для обработки запроса:
- [MatchedController](../../src/plib/library/Http/Middleware/MatchedController.php) - вызов контроллера указанного в [symfony-router](../../src/plib/config/symfony-routes.php)
- [ErrorCatcher](../../src/plib/library/Http/Middleware/ErrorCatcher.php) - перехватывает все ошибки вызванные в цепочке выше
- [NotFoundRequestHandler](../../src/plib/library/Http/Handler/NotFoundRequestHandler.php) - вызывается если предыдущие цепочки вызовов не отработали

При необходимости можно добавить свои middlware, например для авторизации или какой-то дополнительной проверки.
