<?php
use \Core\Route;


return [

	/**
	 * home
	 */
	new Route('/', 'main', 'main'), 

	/**
	 * Sign
	 */
	new Route ('/signin', 'sign', 'signin'),
	new Route ('/signup', 'sign', 'signup'),
	/**
	 * Sign-action
	 */
	new Route ('/actionSignIn', 'actionSign', 'SignIn'),
	new Route ('/logout', 'actionSign', 'LogOut'),
	new Route ('/actionSignup', 'actionSign', 'SignUp'),

	/**
	 * Content: News 
	 */
	new Route ('/category/:tegs', 'news', 'getNews'),

	/**
	 * Content: Page news
	 */
	new Route ('/page/:id', 'page', 'page'),
	/**
	 * action-comment
	 */
	new Route ('/actionAddComment', 'actionComment', 'AddComment'),
	new Route ('/deleteCom/:id', 'actionComment', 'deleteComment'),
	/**
	 * Office
	 */
	new Route('/privateoffice', 'office', 'office'),
	new Route ('/editnameAccount', 'office', 'actionEditName'),
	new Route ('/editpasswordAccount', 'office', 'actionEditPassword'),
	/**
	 * Footer: info
	 */
	new Route ('/about', 'info', 'about'),
	new Route ('/contact', 'info', 'contact'),
	new Route ('/author', 'info', 'author'),

//<---------------->//

	/**
	 * ADMIN
	 */

	new Route('/admin', 'admin', 'admin'),
	new Route('/admin/action_delete_news_checkbox', 'admin', 'action_delete_news_checkbox'),
	new Route('/admin/news', 'admin', 'news'),
	new Route('/admin/users', 'admin', 'users'),
	new Route('/admin/news/add', 'admin', 'addNews'),
	new Route('/admin/news/actionAddNews', 'admin', 'actionAddNews'),
	new Route('/admin/news/edit/:id', 'admin', 'EditNews'),
	new Route('/admin/news/edit/actionEditNews/:id', 'admin', 'actionEditNews'),

	];
	
