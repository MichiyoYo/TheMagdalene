<?php

return array(
	'id'          => 'team_metaboxes',
	'types'       => array('team'),
	'title'       => __('Team Options', 'brushed'),
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'upload',
			'name' => 'team_upload',
			'label' => __('Upload photo of member', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
		),
		array(
			'type' => 'textbox',
			'name' => 'member_name',
			'label' => __('Full Name', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
			'validation' => 'alpha',
		),
		array(
			'type' => 'textbox',
			'name' => 'member_description',
			'label' => __('Member Description', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
			'validation' => 'alpha',
		),
		array(
			'type' => 'textbox',
			'name' => 'member_facebook_url',
			'label' => __('Facebook URL', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
			'validation' => 'alpha',
		),
		array(
			'type' => 'textbox',
			'name' => 'member_twitter_url',
			'label' => __('Twitter URL', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
			'validation' => 'alpha',
		),
		array(
			'type' => 'textbox',
			'name' => 'member_linkedin',
			'label' => __('LinkedIn URL', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
			'validation' => 'alpha',
		),
		array(
			'type' => 'textbox',
			'name' => 'member_googleplus',
			'label' => __('Google Plus URL', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
			'validation' => 'alpha',
		),
		array(
			'type' => 'textbox',
			'name' => 'member_vimeo',
			'label' => __('Vimeo URL', 'brushed'),
			'description' => __('', 'brushed'),
			'default' => '',
			'validation' => 'alpha',
		),


	),
);

/**
 * EOF
 */