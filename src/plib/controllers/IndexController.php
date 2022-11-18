<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

use PleskExt\Demo\DI\Container;
use PleskExt\Demo\UseCases\Query\GetBasicFrontendState\Handler as GetBasicFrontendStateHandler;
use PleskExt\Demo\UseCases\Query\GetBasicFrontendState\Query as GetBasicFrontendStateQuery;
use PleskExt\Demo\UseCases\Query\GetCredentials\Handler as GetCredentialsHandler;

class IndexController extends pm_Controller_Action
{
    private GetBasicFrontendStateHandler $getBasicFrontendAppSetsHandler;
    private GetCredentialsHandler $getCredentialsHandler;

    public function __construct(
        Zend_Controller_Request_Abstract $request,
        Zend_Controller_Response_Abstract $response,
        array $invokeArgs = array()
    ) {
        $container = new Container();
        $this->getBasicFrontendAppSetsHandler = $container->get(GetBasicFrontendStateHandler::class);
        $this->getCredentialsHandler = $container->get(GetCredentialsHandler::class);
        parent::__construct($request, $response, $invokeArgs);
    }

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

        $basicFrontendAppSets = $this->getBasicFrontendAppSetsHandler->handle(
            new GetBasicFrontendStateQuery('app', '/dist/app.js', 'index.php')
        );
        $moduleId = $basicFrontendAppSets->getModuleId();
        $baseUrl = $basicFrontendAppSets->getBaseUrl();
        $pathToFrontendEntrypoint = $basicFrontendAppSets->getPathToFrontendEntrypoint();
        $locale = $basicFrontendAppSets->getLocale();

        $params = json_encode(
            [
                'moduleId' => $moduleId,
                'baseUrl' => $baseUrl,
                'locale' => $locale,
                'credentials' => $this->getCredentialsHandler->handle()
            ],
            JSON_THROW_ON_ERROR
        );

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