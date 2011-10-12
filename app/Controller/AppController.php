<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
    
    public $components = array( 'Session',
                                'Cookie',
                                'DebugKit.Toolbar'
        );

    
    function beforeFilter() {
        parent::beforeFilter();
    }
}
