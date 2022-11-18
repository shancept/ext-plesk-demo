# Собирает DI container и кэширует его в файле.

## DI
В данном примере используется реализация Psr\Container\ContainerInterface. В своих проектах вы можете использовать любую реализацию.
В качестве DI конфигуратора используется [symfony/dependency-injection](https://symfony.com/doc/5.4/components/dependency_injection.html)
В данном примере используются Yaml файлы, но можно использовать xml или php конфиги, для этого нужно реализовать LoaderFactoryInterface и заменить Yaml на свой в файле di-container-builder.php.

Чтобы собрать DI контейнер в файл:
```bash
conposer app:build-di-container
```

Сгенерированный файл попадет в [cache](../../src/plib/cache) под именем ProjectServiceContainer.php

Путь и название файла жестко прописаны, но их можно изменить напрямую в [файле](../../dev-tools/di-container-builder.php). (Но тогда придется изменить наследование у [обертки](../../src/plib/library/DI/Container.php)) 

Обертка для сгенерированного DI файла находится [`src/plib/library/DI`](../../src/plib/library/DI/Container.php)
