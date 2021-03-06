<?php

namespace KraftHaus\BauhausUser;

/**
 * This file is part of the KraftHaus Bauhaus package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Sentry;

/**
 * Class BauhausUserServiceProvider
 * @package KraftHaus\BauhausUser
 */
class BauhausUserServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the package.
	 *
	 * @access public
	 * @return void
	 */
	public function boot()
	{
		$this->package('krafthaus/bauhaususer');
		View::addNamespace('krafthaus/bauhaususer', __DIR__ . '/../../views');

		// Add the BauhausUser menu items
		app('krafthaus.bauhaus.menu')->addMenu('left', Config::get('bauhaususer::config.menu'));

		if (\Sentry::check()) {
			
			$curentUser = \Sentry::getUser();
			
			app('krafthaus.bauhaus.menu')->addMenu('right', [
				'text' => trans('bauhaususer::admin.signed-in-as', ['name' => $curentUser->last_name . ' ' . $curentUser->first_name])
			]);

			app('krafthaus.bauhaus.menu')->addMenu('right', [
				'image' => sprintf('http://www.gravatar.com/avatar/%s?s=35', md5($curentUser->getLogin()))
			]);

			app('krafthaus.bauhaus.menu')->addMenu('right', [
				'title' => 'Sign Out',
				'url'   => url(Config::get('bauhaus::admin.auth.logout_path'))
			]);
		}

		require_once __DIR__ . '/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// add the install command to the application
		$this->app['bauhaus:user:register'] = $this->app->share(function($app) {
			return new RegisterCommand($app);
		});

		// add the activate command to the application
		$this->app['bauhaus:user:activate'] = $this->app->share(function($app) {
			return new ActivateCommand($app);
		});

		// add the deactivate command to the application
		$this->app['bauhaus:user:deactivate'] = $this->app->share(function($app) {
			return new DeactivateCommand($app);
		});


		// add the grant command to the application
		$this->app['bauhaus:user:grant'] = $this->app->share(function($app) {
			return new GrantCommand($app);
		});


		$this->commands('bauhaus:user:register');
		$this->commands('bauhaus:user:activate');
		$this->commands('bauhaus:user:deactivate');

		$this->commands('bauhaus:user:grant');

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
