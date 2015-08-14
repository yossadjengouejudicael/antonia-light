<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helloController
 *
 * @author yossa judicaël
 */
use cm\antonia\kernel\system\Controller;

class helloController extends Controller{
    
    public function executeIndex(cm\antonia\kernel\system\Request $request){
        echo '<br/>that is your uri: '.$request->uri();
        echo '<br/> id: '.$request->get('id');
        echo '<br/> no: '.$request->get('no');
    }
    
    public function executeNews(\cm\antonia\kernel\system\Request $request) {
        echo 'totonana';
    }
}
