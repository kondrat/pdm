<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
    
    public $components = array( 'Session',
                                'Cookie',
                                'RequestHandler',
                                'DebugKit.Toolbar'
        );

    
    function beforeFilter() {
        parent::beforeFilter();
    }
}
