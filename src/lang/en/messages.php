<?php

/**
 * This file is part of the KraftHaus BauhausUser package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

	'success' => [
		'title'    => 'Success!',
		'messages' => [
			'sign-in'  => [
				'user-signed-in' => 'User logged in.'
			],
			'sign-out' => [
				'user-signed-out' => 'User signed out.'
			]
		]
	],

	'warning' => [
		'title' => 'Warning!'
	],

	'error'   => [
		'title'    => 'Whoops!',
		'messages' => [
			'sign-in' => [
				'validation-error'  => 'Validation error.',
				'user-not-found'    => 'User not found.',
				'user-not-active'   => 'User not activated.',
				'user-suspended'    => 'User is suspended for [%s] minutes.',
				'user-banned'       => 'User is banned.',
				'login-required'    => 'Login field is required',
				'password-required' => 'Password field is required'
			],
			'groups'  => [
				'missing-name' => 'Name field is required',
				'group-exists' => 'Group already exists',
				'not-found'    => 'Group was not found',
			],
			'user'    => [
				'already-exists' => 'User with this login already exists'
			]
		]
	]

];
