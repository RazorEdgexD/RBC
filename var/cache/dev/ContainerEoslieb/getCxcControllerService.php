<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\CxcController' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once $this->targetDirs[3].'/src/Controller/CxcController.php';

$this->services['App\Controller\CxcController'] = $instance = new \App\Controller\CxcController();

$instance->setContainer(${($_ = isset($this->services['service_locator.yscbjmj']) ? $this->services['service_locator.yscbjmj'] : $this->load('getServiceLocator_YscbjmjService.php')) && false ?: '_'}->withContext('App\\Controller\\CxcController', $this));

return $instance;
