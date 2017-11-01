# api_users
Simple Joomla plugin to expose all users as REST API/Json.
Based on template in [com_api-plugins](https://github.com/techjoomla/com_api-plugins)

## Requirements
* [com_api](https://github.com/techjoomla/com_api) installed

## Instructions
Install & activate this plugin in your Joomla site.
Define a API plugin in `com_api` configs inside Joomla administrator interface.
Open a new tab and enter `<YOUR_JOOMLA_SITE_URL>/index.php?option=com_api&app=users&resource=users&format=raw&key=<YOUR_API_TOKEN>`.
Use this Url in your app HTTP client.

## Caution
This plugin expose ALL users as JSON through a HTTP request, all at time.
What means that, if you have a ruge amount of registered users, you can literally drop down your site.
Know what your are about to do.