# Joomla plugin: REST API /users

Simple Joomla plugin to expose users list and some user info as REST API/Json.
Based on template in [com_api-plugins](https://github.com/techjoomla/com_api-plugins)

## Requirements
* [com_api by Techjoomla](https://github.com/techjoomla/com_api) installed

## Instructions
1. Set which user attributes you want to expose in **./users./users.php** file.
```php
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
```
2. Install & activate this plugin in your Joomla site.
3. Define an API plugin in `com_api` configs inside Joomla administrator interface.
4. Use this Url in your HTTP client
`<YOUR_JOOMLA_SITE_URL>/index.php?option=com_api&app=users&resource=users&format=raw&key=<YOUR_API_TOKEN>`

## Caution ⚠️
This plugin expose ALL users as JSON through a HTTP request, all at time.
What means that, if you have a ruge amount of registered users, you can literally drop down your site.
Be aware of what you are about to do.
