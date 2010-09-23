<?php
/**
 * @version		$Id$
 * Kunena Component
 * @package Kunena
 *
 * @Copyright (C) 2008 - 2010 Kunena Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.com
 */
defined ( '_JEXEC' ) or die ();

jimport ( 'joomla.application.component.view' );

/**
 * About view for Kunena backend
 */
class KunenaViewCategories extends JView {
	function display() {
		switch ($this->getLayout ()) {
			case 'new' :
			case 'edit' :
				$this->displayEdit ();
				$this->setToolBarEdit();
				break;
			case 'default' :
				$this->displayDefault ();
				$this->setToolBarDefault();
				break;
		}
		parent::display ();
	}

	function displayEdit() {
		$this->assignRef ( 'state', $this->get ( 'State' ) );
		$this->assignRef ( 'category', $this->get ( 'Item' ) );
		$this->assignRef ( 'options', $this->get ( 'Options' ) );
		$this->assignRef ( 'moderators', $this->get ( 'Moderators' ) );
	}

	function displayDefault() {
		$this->assignRef ( 'state', $this->get ( 'State' ) );
		$this->assignRef ( 'categories', $this->get ( 'Items' ) );
		$this->assignRef ( 'navigation', $this->get ( 'Navigation' ) );
	}

	protected function setToolBarEdit() {
		// Set the titlebar text
		JToolBarHelper::title ( '&nbsp;', 'kunena.png' );
		JToolBarHelper::save();
		JToolBarHelper::cancel();
		//JToolBarHelper::back ( JText::_ ( 'Home' ), 'index.php?option=com_kunena' );
	}
	protected function setToolBarDefault() {
		// Set the titlebar text
		JToolBarHelper::title ( '&nbsp;', 'kunena.png' );
		JToolBarHelper::publish ();
		JToolBarHelper::unpublish ();
		JToolBarHelper::addNew ();
		JToolBarHelper::editList ();
		JToolBarHelper::deleteList ();
		//JToolBarHelper::back ( JText::_ ( 'Home' ), 'index.php?option=com_kunena' );
	}
}