<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Form\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\FormElement;


class FormElementController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new FormElement();
        $view = new ViewModel(['form' => $form]);
        return $view;
    }

    public function getFormDataAction()
    {
        $form = new FormElement();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $this->params()->fromPost();
            $file = $request->getFiles();
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            echo "<pre>";
            print_r($file);
            echo "</pre>";
        }
        $view = new ViewModel(['form' => $form]);
        $view->setTemplate('form/form-element/get-data');
        return $view;
    }
    public function index02Action()
    {
        $form = new FormElement();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $this->params()->fromPost();
            $file = $request->getFiles();
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            echo "<pre>";
            print_r($file);
            echo "</pre>";
        }
        $view = new ViewModel(['form' => $form]);
        $view->setTemplate('form/form-element/index02');
        return $view;
    }
}
