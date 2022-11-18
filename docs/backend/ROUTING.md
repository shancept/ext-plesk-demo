### Роутинг
Роутинг в экстеншне может осуществляться несколькими способами:
- с помощью zend-routes в строенного в плеск
- с помощью любого своего, но для этого нужно перехватить встроенный роутинг. В этом примере используется [symfony/routing](https://symfony.com/doc/5.4/routing.html)

#### zend-routes
Конфиги для zend-routes находятся в `src/plib/config/zend-routes.php`. Как правильно собирать этот массив можно почитать в официальной документации zend.

#### symfony-routes
Конфиги для [symfony-routes](https://symfony.com/doc/5.4/routing.html) находятся [тут](../../src/plib/config/symfony-routes.php).
В данном примере роутинг производится с помощью php файла расположенного `src/plib/config/symfony-routes.php`.
В своем проекте вы можете использовать любой другой вид конфигурации например через аннотации или yaml файл. Для этого нужно создать свою реализацию `PleskExt\Demo\Http\Factory\RouteCollectionFactoryInterface` и добавить ее в DI.
