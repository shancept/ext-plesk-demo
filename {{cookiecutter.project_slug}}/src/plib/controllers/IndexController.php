<?php

class IndexController extends \pm_Controller_Action
{
    public function indexAction()
    {
        $this->_helper->_viewRenderer->setNoRender();
    }
}
