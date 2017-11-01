<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_trading
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.user.user');
jimport('joomla.plugin.plugin');
jimport('joomla.user.helper');
jimport('joomla.application.component.helper');
jimport('joomla.application.component.model');
jimport('joomla.database.table.user');

// Load com_users language file
$language = JFactory::getLanguage();
$language->load('com_users');
$language->load('com_users', JPATH_SITE, 'en-GB', true);
$language->load('com_users', JPATH_ADMINISTRATOR, 'en-GB', true);
require_once JPATH_SITE . '/libraries/joomla/filesystem/folder.php';
require_once JPATH_ROOT . '/administrator/components/com_users/models/users.php';

/**
 * User Api.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_api
 *
 * @since       1.0
 */
class UsersApiResourceUsers extends ApiResource
{
	/**
	 * Function get for users record.
	 *
	 * @return void
	 */
	public function get()
	{

		$input = JFactory::getApplication()->input;

		// If we have an id try to fetch the user
		if ($id = $input->get('id'))
		{
			$user = JUser::getInstance($id);
			if (!$user->id)
			{
				$this->plugin->setResponse($this->getErrorResponse(JText::_( 'PLG_API_USERS_USER_NOT_FOUND_MESSAGE' )));

				return;
			}
			$this->plugin->setResponse($user);
		}
		else
		{
			$model = new UsersModelUsers;
					
			// This hack allow pull all users at once
			$model->getState();
			$model->setState('list.limit', 0);
			$model->setState('list.start', 0);
			
			$users = $model->getItems();

			foreach ($users as $k => $v)
			{
				unset($users[$k]->password);

				/* Uncomment any line below to remove attr from users list
				*/
				// unset($users[$k]->block);
				// unset($users[$k]->sendEmail);				
				// unset($users[$k]->lastvisitDate);
				// unset($users[$k]->activation);
				// unset($users[$k]->params);
				// unset($users[$k]->lastResetTime);
				// unset($users[$k]->resetCount);
				// unset($users[$k]->otpKey);
				// unset($users[$k]->otep);
				// unset($users[$k]->requireReset);
				// unset($users[$k]->group_count);
				// unset($users[$k]->note_count);								
			}

			$this->plugin->setResponse($users);
		}
	}
}
