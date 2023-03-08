# Как начать react приложение для Plesk extension?

## 1. Создаем точка входа в html
В месте где отображется html вашего приложения (обычно это [`action`](../../src/plib/controllers/IndexController.php) контроллера или view файл) нужно добавить следующий код:
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

Где `$moduleId` - это id вашего модуля, `$pathToFrontendEntrypoint` - это путь до точки входа в ваше приложение, `$params` - это параметры которые будут переданы в ваше приложение.

## 2. Создаем точка входа в js
Точка входа в ваше приложение это файл [`index.js`](../../src/frontend/index.js) в нем происходит только экспорт главного компонента приложения:
```JS
export { default } from './components/App/App';
```

## 3. Создаем главный компонент App
Главный компонент приложения это файл [`App.js`](../../src/frontend/components/App/App.js) в нем происходит только рендеринг компонента страницы [`Credentials`](../../src/frontend/pages/Credentials.js) в элемент с id равным `$moduleId`.

### 3.1. Структура компонента
Импортируемые зависимости:
```JS
import React, { useState, createElement } from 'react'; // React и его хуки
import PropTypes from 'prop-types'; // PropTypes для проверки типов входных параметров в компонент
import AppProvider from './Provider'; // Компонент провайдера для контекста приложения
import Credentials from '../../pages/Credentials'; // Компонент страницы ввода данных для подключения
import ToasterProvider from '../Toaster/Provider'; // Компонент провайдера для контекста тостера
```
Компонент:
```JS
// Компонент приложения это функция которая принимает входные параметры
const App = ({ baseUrl, credentials }) => { // входные параметры это baseUrl и credentials мы передаем их из точки входа в приложение
    return ( // возвращаем jsx разметку
        <AppProvider
            baseUrl={baseUrl}
            credentials={credentials}
        > // в jsx разметке мы оборачиваем в провайдеры наши компоненты чтобы они могли получить доступ к контексту
            <ToasterProvider> // провайдер тостера
                <Credentials /> // компонент страницы ввода данных для подключения
            </ToasterProvider>
        </AppProvider>);
};
```
Валидация входных параметров:
```JS
App.propTypes = {
    baseUrl: PropTypes.string.isRequired,
    credentials: PropTypes.object.isRequired,
};
```
Экспорт компонента:
```JS
export default App;
```

## 4 Создаем компонент страницы ввода данных для подключения
Компонент страницы ввода данных для подключения это файл [`Credentials.js`](../../src/frontend/pages/Credentials.js) в нем происходит только рендеринг компонента [`CredentialsForm`](../../src/frontend/components/CredentialsForm/CredentialsForm.js) и отображение заголовка страницы.

## 5 Создаем компонент формы ввода данных для подключения
Компонент формы ввода данных для подключения это файл [`Form.js`](../../src/frontend/components/Credentials/Form.js)
Визуально компонент можно разделить на 4 части:
1. Определение переменных
2. Отработка хуков и эффектов (например useEffect)
3. Определение функций
4. Рендеринг jsx разметки