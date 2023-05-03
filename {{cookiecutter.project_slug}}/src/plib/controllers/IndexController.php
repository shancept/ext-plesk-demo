<?php
// Copyright 1999-{{ cookiecutter.year }}. Plesk International GmbH. All rights reserved.

declare(strict_types=1);

class IndexController extends \pm_Controller_Action
{
    public function indexAction(): void
    {
        $this->redirect('/');
    }

    /**
     * @throws JsonException
     */
    public function viewAction(): void
    {
        $this->_helper->_viewRenderer->setNoRender();

        $moduleId = \pm_Context::getModuleId();
        $pathToFrontendEntrypoint = \pm_Context::getBaseUrl() . 'dist/app.js';
        $baseUrl = \pm_Context::getBaseUrl();
        $locale = \pm_Locale::getSection('app');
        $params = json_encode(
            [
                'moduleId' => $moduleId,
                'baseUrl' => "{$baseUrl}index.php",
                'locale' => $locale
            ], JSON_THROW_ON_ERROR);
        echo <<<HTML
<div id="$moduleId"></div>
<script>
    require(['$pathToFrontendEntrypoint'], function (main) {
        main.default($params);
    });
</script>
HTML;
    }
}
