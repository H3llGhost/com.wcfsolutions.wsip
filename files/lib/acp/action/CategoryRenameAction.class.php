<?php
// wsip imports
require_once(WSIP_DIR.'lib/acp/action/AbstractCategoryAction.class.php');

/**
 * Renames a category.
 * 
 * @author	Sebastian Oettl
 * @copyright	2009-2011 WCF Solutions <http://www.wcfsolutions.com/index.html>
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.wcfsolutions.wsip
 * @subpackage	acp.action
 * @category	Infinite Portal
 */
class CategoryRenameAction extends AbstractCategoryAction {
	/**
	 * new title
	 * 
	 * @var string
	 */
	public $title = '';
	
	/**
	 * @see Action::readParameters()
	 */
	public function readParameters() {
		parent::readParameters();
		
		if (isset($_POST['title'])) {
			$this->title = $_POST['title'];
			if (CHARSET != 'UTF-8') $this->title = StringUtil::convertEncoding('UTF-8', CHARSET, $this->title);
		}
	}
	
	/**
	 * @see Action::execute();
	 */
	public function execute() {
		parent::execute();
		
		// check permission
		WCF::getUser()->checkPermission('admin.portal.canEditCategory');
		
		// change language variable
		require_once(WCF_DIR.'lib/system/language/LanguageEditor.class.php');
		$language = new LanguageEditor(WCF::getLanguage()->getLanguageID());
		$language->updateItems(array(('wsip.category.'.$this->category->category) => $this->title), 0, PACKAGE_ID, array('wsip.category.'.$this->category->category => 1));
		
		// reset cache
		WCF::getCache()->clearResource('category');
		$this->executed();
	}
}
?>