<?php

namespace nekstati\autocut\event;

class subscriber implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		if (defined('ADMIN_START'))
		{
			return [];
		}

		return [
			'core.user_setup' => 'user_setup',
		];
	}

	public function user_setup($event)
	{
		$event['lang_set_ext'] = array_merge($event['lang_set_ext'], [[
			'ext_name'		=> 'nekstati/autocut',
			'lang_set'		=> 'common',
		]]);
	}
}
