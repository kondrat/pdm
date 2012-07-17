<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        //'Security',
        'Session',
        'Cookie',
        'RequestHandler',
        'Auth' => array(
            'authenticate' => array(
                'Form'
            ),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        ),
        //'Acl',
        'DebugKit.Toolbar'=>array('panels' => array('history' => false))
    );

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('*');
    }

}
