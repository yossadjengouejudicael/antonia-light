<?php
//    Antonia - Pride to be Cameroonian
//    
//    This file is part of Antonia
//
//    Antonia is a free framework: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    Antonia is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with Antonia.  If not, see <http://www.gnu.org/licenses/>

/**
 * Application
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
namespace cm\antonia\kernel\system;
use cm\antonia\kernel\system\Request;
use cm\antonia\kernel\system\Response;
use cm\antonia\kernel\system\User;
use cm\antonia\kernel\system\Config;
use cm\antonia\kernel\system\Antonia;
use cm\antonia\kernel\util\StringUtils;

abstract class Application {

    protected $request;
    
    protected $response;
    
    protected $name;
    
    protected $user;

    protected $config;
    
    public function __construct(){
        $this->request = new Request($this);
        $this->response = new Response($this);
        $this->user = new User($this);
        $this->config = new Config($this);
        $this->name = '';
    }

    public function getRequest() {
        return $this->request;
    }

    public function getResponse() {
        return $this->response;
    }

    public function getName() {
        return $this->name;
    }
    public function getUser() {
        return $this->user;
    }

    public function getConfig() {
        return $this->config;
    }
    
    abstract public function run();
    
    public function getController (){
        $DS = DIRECTORY_SEPARATOR;
        $router = new Router();
        $xml = new \DOMDocument;
        $xml->load(Antonia::getConfigPath().$DS.'routes.xml');
        $routes = $xml->getElementsByTagName('route');
        foreach ($routes as $route)
        {
            $vars = array();
            if ($route->hasAttribute('vars'))
            {
                $vars = explode(',', $route->getAttribute('vars'));
            } 
            /*
            echo 'url: '.$route->getAttribute('url').'<br/>';
            echo 'module: '.$route->getAttribute('module').'<br/>';
            echo 'action: '.$route->getAttribute('action').'<br/>';//*/
            $router->addRoute(new Route($route->getAttribute('url'),$route->getAttribute('module'), $route->getAttribute('action'),$vars));
        }
        $matchedRoute = $router->getRoute($this->getRealUri($this->request->uri()));
        if (is_null($matchedRoute))
        {
            $this->response->redirect404();
        }
        //*
        $_GET = array_merge($_GET, $matchedRoute->getVars());
        if(strtolower($this->name)=='backend'){
            include_once Antonia::getAdminPath().$DS.$matchedRoute->getModule().$DS.'controller'.$DS.$matchedRoute->getModule().'Controller.class.php';
        }else{
            include_once Antonia::getModulesPath().$DS.$matchedRoute->getModule().$DS.'controller'.$DS.$matchedRoute->getModule().'Controller.class.php';
        }
        $controllerClass = $matchedRoute->getModule().'Controller';
        return new $controllerClass($this, $matchedRoute->getModule(),$matchedRoute->getAction());//*/
    }
    
    private function getRealUri($uri) {
        $tab = explode(DIRECTORY_SEPARATOR,Antonia::getRootPath());
        $appName = $tab[count($tab)-1];
        if(StringUtils::startsWith($this->request->uri(), '/'.$appName)){
            return substr($this->request->uri(), strlen($appName)+1);
        }
        return $uri;
    }

}
