<?php
namespace Debug\Toolbar\Controller;

/*                                                                        *
 * This script belongs to the Flow package "Debug.Toolbar".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Debug\Toolbar\Annotations as Debug;

/**
 * Profile controller for the Debug.Toolbar package
 *
 * @Flow\Scope("singleton")
 */
class ProfileController extends \TYPO3\Flow\Mvc\Controller\ActionController {

    /**
     * Index action
     *
     * @return void
     */
    public function indexAction() {
        // $dataRenderers = array(

        // );
        // foreach ($this->debugger->getDebuggers() as $dataRenderer) {
        //     $dataRenderers[$dataRenderer->getName()] = $dataRenderer;
        // }
        // $this->view->assign('dataRenderers', $dataRenderers);
        // if ($this->request->hasArgument('token')) {
        //     $this->view->assign('token', $this->request->getArgument('token'));
        //     \Debug\Toolbar\Service\DataStorage::load($this->request->getArgument('token'));
        //     \Debug\Toolbar\Service\DataStorage::freeze();
        // }


        if ($this->request->hasArgument('token')) {
            $this->view->assign('token', $this->request->getArgument('token'));
            \Debug\Toolbar\Service\DataStorage::load($this->request->getArgument('token'));
            \Debug\Toolbar\Service\DataStorage::freeze();
        }

        $modules = \Debug\Toolbar\Service\Collector::getModules();

        if ($this->request->hasArgument('module')) {
            foreach ($modules as $module) {
                if ($module->getName() == $this->request->getArgument('module')){
                    $currentModule = $module;
                    break;
                }
            }
        } else {
            $currentModule = reset($modules);
        }
        $this->view->assign('currentModule', $currentModule);

        $this->view->assign('modules', $modules);
    }

    /**
    * TODO: Document this Method!
    */
    public function testAction() {
        $this->redirectToUri('http://phoenix/typo3/management');
    }

}

?>