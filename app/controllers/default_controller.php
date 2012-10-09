<?php
/**
 *
 * @package       mobilegates
 * @subpackage    mobilegates.cake.libs.controller
 */
class DefaultController extends Controller {
	
	var $view = 'Smarty'; 
	var $helpers = array('SmartyHtml','SmartySession','form'); 
	
	/**
	 * default display func
	 *
	 */
	function index() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', $path));
	}
}
?>
