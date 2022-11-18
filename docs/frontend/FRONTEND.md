
## Фронтенд

Конфигурация находится в файле [`extension.config.js`](../../extension.config.js)

### Инициализация приложения:
Html с настройкой js описывалась в разделе [backend/controllers](../backend/CONTROLLERS.md)

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

Входной скрипт [`index.js`](../../src/frontend/index.js) в нем происходит только экспорт главного компонента приложения:
```JS
export { default } from './components/App/App';
```

[`react-compat.js`](../../src/frontend/react-compat.js) нужен для совместимости имен react и библиотеки @plesk/ui-library 

### Состояние приложения
В небольших приложениях для передачи состояния и параметров можно использовать [контексты](https://reactjs.org/docs/context.html)

В skeleton для передачи глобального состояния и управления Toaster использовались контексты.

Как это работает:
- создаем папку с компонентом
- в ней создаем файл Context.js. Внутри себя она содержит следующее:
```js
import React, { useContext } from 'react';
export const Context = React.createContext();
export const useSome = () => useContext(Context);
```
(для работы с контекстом мы далее будем вызывать хук useSome)
- создаем файл Provider.js. Внутри себя он содержит следующее:
```js
import React, { useState, createElement } from 'react';
import { Context } from './Context';

const Provider = (params) => {
    const [state, setState] = useState();
    return (
        <Context.Provider value={{ ...params, state, setState }}>
            {children}
        </Context.Provider>
    );
}

export default Provider;
```
тут `params` это параметры которые можно передать в компонент
внутри себя провайдер должен хранить состояния компонента и управлять им. 
Наружу провайдер отдает на чтение нужные параметры, состояние, а так же может отдавать методы для управления состоянием. 
- затем создаем сам компонент, где через хук `useSome`  мы можем получать состояние нашего компонента.
- затем оборачиваем родительский код:
```js
<SomePorvider foo={}></SomePorvider>
```
Передаем ему нужные параметры и если нужно вложенные в него теги(комопоненты)
- и теперь на любой вложенности мы можем вызвать хук `useSome` и менять и читать состояние компонента Some.
