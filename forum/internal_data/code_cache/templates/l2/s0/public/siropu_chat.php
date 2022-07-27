<?php
// FROM HASH: e3a9b44beb27a26217616369f784af02
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('siropu_chat.less');
	$__finalCompiled .= '

';
	if ($__vars['xf']['options']['siropuChatCompactMobileMode'] AND $__vars['chat']['isMobile']) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('siropu_chat_mobile.less');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'siropu/chat/core.js',
		'min' => '1',
	));
	$__templater->inlineJs('
	' . $__templater->includeTemplate('siropu_chat_js', $__vars) . '
');
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canSetMessageColorSiropuChat', array())) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('color_picker.less');
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/color_picker.js',
			'min' => '1',
		));
		$__templater->inlineJs('
		jQuery.extend(XF.phrases, {
			update: "' . $__templater->filter('Обновить', array(array('escape', array('js', )),), false) . '",
			view: "' . $__templater->filter('Посмотреть', array(array('escape', array('js', )),), false) . '"
		});
	');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('lightbox_macros', 'setup', array(
		'canViewAttachments' => true,
	), $__vars) . '

';
	$__vars['canBrowseRooms'] = ($__templater->method($__vars['xf']['visitor'], 'canBrowseSiropuChatRooms', array()) ? true : false);
	$__finalCompiled .= '
';
	$__vars['joinRoomCount'] = ($__templater->method($__vars['xf']['visitor'], 'canJoinSiropuChatRooms', array()) ?: 0);
	$__finalCompiled .= '
';
	$__vars['canJoinRooms'] = (($__vars['xf']['visitor']['user_id'] AND ($__vars['xf']['options']['siropuChatRooms'] AND ((($__vars['joinRoomCount'] == -1) OR ($__vars['joinRoomCount'] > 1)) OR (($__vars['joinRoomCount'] == 1) AND $__vars['canBrowseRooms'])))) ? true : false);
	$__finalCompiled .= '
';
	$__vars['canChatInPrivate'] = (($__vars['xf']['visitor']['user_id'] AND ($__vars['xf']['options']['siropuChatPrivateConversations'] AND $__templater->method($__vars['xf']['visitor'], 'canChatInPrivateSiropuChat', array()))) ? true : false);
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['xf']['options']['siropuChatDynamicTitle']) {
		$__compilerTemp1 .= '
		' . 'Чат' . '
	';
	} else if (($__vars['chat']['channel'] == 'room') AND $__vars['chat']['roomId']) {
		$__compilerTemp1 .= '
		' . $__templater->escape($__vars['chat']['rooms'][$__vars['chat']['roomId']]['room_name']) . '
	';
	} else if ($__vars['chat']['channel'] == 'conv') {
		$__compilerTemp1 .= '
		';
		if ($__vars['chat']['convId']) {
			$__compilerTemp1 .= '
			' . 'Приватный разговор с ' . $__templater->escape($__vars['chat']['convContacts'][$__vars['chat']['convId']]['Contact']['username']) . '' . '
		';
		} else {
			$__compilerTemp1 .= '
			' . 'Приватные разговоры' . '
		';
		}
		$__compilerTemp1 .= '
	';
	}
	$__vars['title'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
');
	$__finalCompiled .= '

<div id="siropuChat" class="block ' . $__templater->escape($__vars['chat']['cssClass']) . '" data-active="' . ($__templater->method($__vars['xf']['visitor'], 'isActiveSiropuChat', array()) ? 'true' : 'false') . '" data-xf-init="siropu-chat">
	<div class="block-container">
		<div id="siropuChatHeader" class="block-header">
			' . $__templater->fontAwesome('fa-comments', array(
	)) . ' <span>' . $__templater->escape($__vars['title']) . '</span>
			<div id="siropuChatOptions">
				';
	if ($__vars['xf']['options']['siropuChatRules']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('chat/rules', ), true) . '" title="' . $__templater->filter('Правила', array(array('for_attr', array()),), true) . '" data-xf-click="overlay" data-cache="false">' . $__templater->fontAwesome('fal fa-book', array(
		)) . ' <span>' . 'Правила' . '</span></a>
				';
	}
	$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('chat/help', ), true) . '" title="' . $__templater->filter('Помощь', array(array('for_attr', array()),), true) . '" data-xf-click="overlay">' . $__templater->fontAwesome('fal fa-life-ring', array(
	)) . ' <span>' . 'Помощь' . '</span></a>
				<a role="button" id="siropuChatToggleUsers" title="' . $__templater->filter('Пользователи', array(array('for_attr', array()),), true) . '" data-xf-click="siropu-chat-toggle-users">' . $__templater->fontAwesome('fal fa-users', array(
	)) . ' <span>' . 'Пользователи' . '</span></a>
				';
	if ($__templater->method($__vars['xf']['visitor'], 'canChangeSettingsSiropuChat', array())) {
		$__finalCompiled .= '
					<a role="button" title="' . $__templater->filter('Настройки', array(array('for_attr', array()),), true) . '" data-xf-click="menu" aria-expanded="false" aria-haspopup="true">' . $__templater->fontAwesome('fal fa-cogs', array(
		)) . ' <span>' . 'Настройки' . '</span></a>
				';
	}
	$__finalCompiled .= '
				<div class="menu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<form id="siropuChatSettings">
							<h4 class="menu-tabHeader tabs" data-xf-init="tabs" role="tablist">
								<span class="hScroller" data-xf-init="h-scroller">
									<span class="hScroller-scroll">
										<a class="tabs-tab is-active" role="tab" tabindex="0" aria-controls="' . $__templater->func('unique_id', array('siropuChatMisc', ), true) . '">' . $__templater->fontAwesome('fal fa-wrench', array(
	)) . ' ' . 'Настройки' . '</a>
										<a class="tabs-tab" role="tab" tabindex="0" aria-controls="' . $__templater->func('unique_id', array('siropuChatNotifications', ), true) . '">' . $__templater->fontAwesome('fal fa-bell', array(
	)) . ' ' . 'Notifications' . '</a>
									</span>
								</span>
							</h4>
							<ul class="tabPanes">
								<li class="is-active" role="tabpanel" id="' . $__templater->func('unique_id', array('siropuChatMisc', ), true) . '">
									<fieldset data-type="misc">
										<legend data-xf-click="siropu-chat-toggle-options">' . 'Разное' . '</legend>
										' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'inverse',
		'value' => '1',
		'label' => 'Новые сообщения сверху',
		'checked' => ($__vars['chat']['settings']['inverse'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'editor_on_top',
		'value' => '1',
		'label' => 'Отображать редактор сверху',
		'checked' => ($__vars['chat']['settings']['editor_on_top'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'maximized',
		'value' => '1',
		'label' => 'Включить максимальный режим',
		'checked' => ($__vars['chat']['settings']['maximized'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'image_as_link',
		'value' => '1',
		'label' => 'Отображать изображение как ссылку',
		'checked' => ($__vars['chat']['settings']['image_as_link'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'hide_bot',
		'value' => '1',
		'label' => 'Скрыть сообщения Бота',
		'checked' => ($__vars['chat']['settings']['hide_bot'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'hide_status',
		'value' => '1',
		'label' => 'Скрыть статусы',
		'checked' => ($__vars['chat']['settings']['hide_status'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'hide_chatters',
		'value' => '1',
		'label' => 'Скрыть список участников',
		'checked' => ($__vars['chat']['settings']['hide_chatters'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'show_ignored',
		'value' => '1',
		'label' => 'Показывать сообщения пользователей, которых игнорирую',
		'checked' => ($__vars['chat']['settings']['show_ignored'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'disable',
		'value' => '1',
		'label' => 'Выключить чат',
		'checked' => ($__vars['chat']['settings']['disable'] ? true : false),
		'_type' => 'option',
	))) . '
									</fieldset>
									';
	if ($__templater->method($__vars['xf']['visitor'], 'canSetMessageColorSiropuChat', array())) {
		$__finalCompiled .= '
										<fieldset data-type="color">
											<legend>' . 'Цвет Ваших сообщений' . '</legend>
											<div class="inputGroup inputGroup--joined inputGroup--color" data-xf-init="color-picker">
												' . $__templater->formTextBox(array(
			'name' => 'message_color',
			'value' => $__vars['chat']['settings']['message_color'],
			'readonly' => 'readonly',
		)) . '
												<div class="inputGroup-text"><span class="colorPickerBox js-colorPickerTrigger"></span></div>
												<div class="inputGroup-text"><span data-xf-click="siropu-chat-reset-color" data-xf-init="tooltip" title="' . $__templater->filter('Reset color', array(array('for_attr', array()),), true) . '">' . $__templater->fontAwesome('far fa-eraser', array(
		)) . '</span></div>
											</div>
										</fieldset>
									';
	}
	$__finalCompiled .= '
									';
	if ($__templater->method($__vars['xf']['visitor'], 'canChangeDisplayModeSiropuChat', array())) {
		$__finalCompiled .= '
										<fieldset data-type="display">
											<legend>' . 'Место отображения' . '</legend>
											';
		$__compilerTemp2 = array();
		if (($__vars['xf']['options']['siropuChatDisplayMode'] == 'custom') OR ($__vars['xf']['options']['siropuChatDisplayMode'] == 'chat_page')) {
			$__compilerTemp2[] = array(
				'value' => 'default',
				'label' => 'По умолчанию',
				'_type' => 'option',
			);
		}
		$__compilerTemp2[] = array(
			'value' => 'all_pages',
			'label' => 'На всех страницах',
			'_type' => 'option',
		);
		$__compilerTemp2[] = array(
			'value' => 'below_breadcrumb',
			'label' => 'Below breadcrumb',
			'_type' => 'option',
		);
		$__compilerTemp2[] = array(
			'value' => 'above_forum_list',
			'label' => 'Над списком разделов форума',
			'_type' => 'option',
		);
		$__compilerTemp2[] = array(
			'value' => 'below_forum_list',
			'label' => 'Под списком разделов форума',
			'_type' => 'option',
		);
		$__compilerTemp2[] = array(
			'value' => 'above_content',
			'label' => 'Над содержимым',
			'_type' => 'option',
		);
		$__compilerTemp2[] = array(
			'value' => 'below_content',
			'label' => 'Под содержимым',
			'_type' => 'option',
		);
		$__compilerTemp2[] = array(
			'value' => 'sidebar_top',
			'label' => 'Боковая панель (Выше)',
			'_type' => 'option',
		);
		$__compilerTemp2[] = array(
			'value' => 'sidebar_bottom',
			'label' => 'Боковая панель (Ниже)',
			'_type' => 'option',
		);
		$__finalCompiled .= $__templater->formSelect(array(
			'name' => 'display_mode',
			'value' => $__vars['chat']['settings']['display_mode'],
		), $__compilerTemp2) . '
										</fieldset>
									';
	}
	$__finalCompiled .= '
								</li>
								<li role="tabpanel" id="' . $__templater->func('unique_id', array('siropuChatNotifications', ), true) . '">
									';
	if ($__vars['xf']['options']['siropuChatUserMentionAlert']) {
		$__finalCompiled .= '
										<fieldset data-type="mention">
											' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'mention_alert',
			'value' => '1',
			'label' => 'Получать оповещения при упоминании',
			'checked' => ($__vars['chat']['settings']['mention_alert'] ? true : false),
			'_type' => 'option',
		))) . '
										</fieldset>
									';
	}
	$__finalCompiled .= '
									<fieldset data-type="sound">
										<legend data-xf-click="siropu-chat-toggle-options">' . 'Sound notifications' . '</legend>
										' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'sound[normal]',
		'value' => '1',
		'label' => 'Обычные сообщение',
		'checked' => ($__vars['chat']['settings']['sound']['normal'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'sound[private]',
		'value' => '1',
		'label' => 'Сообщение в приватных разговорах',
		'checked' => ($__vars['chat']['settings']['sound']['private'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'sound[whisper]',
		'value' => '1',
		'label' => 'Личные сообщения',
		'checked' => ($__vars['chat']['settings']['sound']['whisper'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'sound[mention]',
		'value' => '1',
		'label' => 'Сообщения, в которых упоминали',
		'checked' => ($__vars['chat']['settings']['sound']['mention'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'sound[bot]',
		'value' => '1',
		'label' => 'Сообщения Бота',
		'checked' => ($__vars['chat']['settings']['sound']['bot'] ? true : false),
		'_type' => 'option',
	))) . '
									</fieldset>
									<fieldset data-type="notifications">
										<legend data-xf-click="siropu-chat-toggle-options">' . 'Визуальные оповещения' . '</legend>
										' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'notification[normal]',
		'value' => '1',
		'label' => 'Обычные сообщение',
		'checked' => ($__vars['chat']['settings']['notification']['normal'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'notification[private]',
		'value' => '1',
		'label' => 'Сообщение в приватных разговорах',
		'checked' => ($__vars['chat']['settings']['notification']['private'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'notification[whisper]',
		'value' => '1',
		'label' => 'Личные сообщения',
		'checked' => ($__vars['chat']['settings']['notification']['whisper'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'notification[mention]',
		'value' => '1',
		'label' => 'Сообщения, в которых упоминали',
		'checked' => ($__vars['chat']['settings']['notification']['mention'] ? true : false),
		'_type' => 'option',
	),
	array(
		'name' => 'notification[bot]',
		'value' => '1',
		'label' => 'Сообщения Бота',
		'checked' => ($__vars['chat']['settings']['notification']['bot'] ? true : false),
		'_type' => 'option',
	))) . '
									</fieldset>
								</li>
							</ul>
						</form>
					</div>
				</div>
				<a role="button" title="' . 'Параметры' . '" data-xf-click="menu" aria-expanded="false" aria-haspopup="true">' . $__templater->fontAwesome('fa-bars', array(
	)) . ' <span>' . 'Параметры' . '</span></a>
				<div class="menu siropuChatOptionsMenu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<h3 class="menu-header">' . 'Параметры' . '</h3>
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canSetSiropuChatStatus', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/update-status', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Обновить статус' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canCreateSiropuChatRooms', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/room/create', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Создать комнату' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditSiropuChatRules', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/edit-rules', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Редактировать правила' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditSiropuChatNotice', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/edit-notice', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Редактировать примечание' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditSiropuChatAds', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/edit-ads', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Редактировать объявление' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canPostSiropuChatAnnouncements', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/post-announcement', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Post announcement' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canResetSiropuChatUserData', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/reset-joined-rooms', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Reset joined rooms' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canSanctionSiropuChat', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/sanction', ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Наказание к пользователю' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewSiropuChatArchive', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/archive', ), true) . '" class="menu-linkRow">' . 'Посмотреть архив' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewSiropuChatTopChatters', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/top-chatters', ), true) . '" class="menu-linkRow">' . 'Посмотреть топ пользователей' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewSiropuChatSanctions', array())) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/sanctions', ), true) . '" class="menu-linkRow">' . 'Посмотреть наказания' . '</a>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['xf']['visitor']['is_admin']) {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('chat/embed', ), true) . '" class="menu-linkRow" data-xf-click="overlay" data-cache="false">' . 'Embed' . '</a>
						';
	}
	$__finalCompiled .= '
						<div class="menu-footer menu-footer--split">
							';
	if ($__vars['canJoinRooms']) {
		$__finalCompiled .= '
								<span class="menu-footer-main">
									<a href="' . $__templater->func('link', array('chat/logout', ), true) . '" class="siropuChatLogout" data-xf-click="overlay">' . $__templater->fontAwesome('fa-sign-out-alt', array(
		)) . ' ' . 'Выйти' . '</a>
								</span>
							';
	}
	$__finalCompiled .= '
							';
	if (!$__vars['chat']['isFullPage']) {
		$__finalCompiled .= '
								<span class="menu-footer-opposite">
									<a href="' . $__templater->func('link', array('chat/fullpage', ), true) . '" data-xf-click="siropu-chat-popup">' . $__templater->fontAwesome('fa-external-link-alt', array(
		)) . ' ' . 'В всплывающем окне' . '</a>
								</span>
							';
	}
	$__finalCompiled .= '
						</div>
					</div>
				</div>
			</div>
		</div>
		' . $__templater->callMacro('siropu_chat_notice_macros', 'notice', array(
		'notice' => $__vars['chat']['notice'],
	), $__vars) . '
		';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
					';
	if (($__vars['canJoinRooms'] OR $__vars['canChatInPrivate']) AND (!$__vars['chat']['hideTabs'])) {
		$__compilerTemp3 .= '
						';
		if ($__templater->isTraversable($__vars['chat']['rooms'])) {
			foreach ($__vars['chat']['rooms'] AS $__vars['room']) {
				$__compilerTemp3 .= '
							' . $__templater->includeTemplate('siropu_chat_room_tab', $__vars) . '
						';
			}
		}
		$__compilerTemp3 .= '
						';
		if ($__vars['canJoinRooms'] AND $__vars['canBrowseRooms']) {
			$__compilerTemp3 .= '
							<a role="button" data-target="room-list" data-title="' . $__templater->filter('Cписок комнат', array(array('for_attr', array()),), true) . '">' . $__templater->fontAwesome('fas fa-folder-open', array(
			)) . ' ' . 'Cписок комнат' . '</a>
						';
		}
		$__compilerTemp3 .= '
					';
	}
	$__compilerTemp3 .= '
					';
	if ($__vars['canChatInPrivate'] AND (!$__vars['chat']['hideTabs'])) {
		$__compilerTemp3 .= '
						<span>
							<a role="button" data-target="conv-list" data-title="' . $__templater->filter('Приватные разговоры', array(array('for_attr', array()),), true) . '" ' . (($__vars['chat']['convUnread'] AND ($__vars['chat']['channel'] != 'conv')) ? ' class="siropuChatNewMessage"' : '') . (($__vars['chat']['channel'] == 'conv') ? ' class="siropuChatActiveTab"' : '') . '>' . 'Приватные разговоры';
		if ($__vars['xf']['options']['siropuChatConvTabCount'] != 'disabled') {
			$__compilerTemp3 .= ' <span class="siropuChatTabCount' . ($__vars['chat']['convTabCount'] ? 'Active' : 'Inactive') . '">' . $__templater->filter($__vars['chat']['convTabCount'], array(array('number', array()),), true) . '</span>';
		}
		$__compilerTemp3 .= '</a>
							<a role="button" data-target="conv-form" data-title="' . $__templater->filter('Начать приватный разговор', array(array('for_attr', array()),), true) . '">' . $__templater->fontAwesome('fas fa-user-plus', array(
		)) . '</a>
						</span>
					';
	}
	$__compilerTemp3 .= '
				';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
			<div id="siropuChatTabs">
				' . $__compilerTemp3 . '
			</div>
		';
	}
	$__finalCompiled .= '
		';
	if ($__vars['chat']['settings']['editor_on_top']) {
		$__finalCompiled .= '
			' . $__templater->includeTemplate('siropu_chat_editor', $__vars) . '
		';
	}
	$__finalCompiled .= '
		<div id="siropuChatContent">
			';
	if (!$__templater->test($__vars['chat']['rooms'], 'empty', array())) {
		$__finalCompiled .= '
				';
		if ($__templater->isTraversable($__vars['chat']['rooms'])) {
			foreach ($__vars['chat']['rooms'] AS $__vars['roomId'] => $__vars['room']) {
				$__finalCompiled .= '
					<ul class="siropuChatRoom siropuChatUsers" data-room-id="' . $__templater->escape($__vars['roomId']) . '"' . (($__templater->method($__vars['room'], 'isActive', array()) AND (($__vars['chat']['channel'] == 'room') AND (!$__vars['chat']['isResponsive']))) ? ' style="display: block;"' : '') . '>
						' . $__templater->callMacro('siropu_chat_user_list', 'room', array(
					'room' => $__vars['room'],
					'users' => $__vars['chat']['users'][$__vars['roomId']],
				), $__vars) . '
					</ul>
					<ul class="siropuChatRoom siropuChatMessages" data-room-id="' . $__templater->escape($__vars['roomId']) . '" data-autoscroll="1"' . (($__templater->method($__vars['room'], 'isActive', array()) AND ($__vars['chat']['channel'] == 'room')) ? ' style="display: block;"' : '') . ' data-xf-init="lightbox">
						' . $__templater->callMacro('siropu_chat_message_list', 'room', array(
					'messages' => $__vars['chat']['messages'][$__vars['roomId']],
				), $__vars) . '
					</ul>
				';
			}
		}
		$__finalCompiled .= '
			';
	} else if ($__vars['chat']['channel'] == 'room') {
		$__finalCompiled .= '
				<p id="siropuChatNoRoomsJoined" style="display: block;">' . 'Вы не присоединились ни к одной комнате.' . '</p>
			';
	}
	$__finalCompiled .= '
			<ul id="siropuChatRooms"></ul>
			';
	if ($__vars['canChatInPrivate']) {
		$__finalCompiled .= '
				<ul class="siropuChatConversation siropuChatUsers"' . (($__vars['chat']['channel'] == 'conv') ? ' style="display: block;"' : '') . '>
					';
		if (!$__templater->test($__vars['chat']['convContacts'], 'empty', array())) {
			$__finalCompiled .= '
						' . $__templater->callMacro('siropu_chat_user_list', 'conversation', array(
				'conversations' => $__vars['chat']['convContacts'],
				'unread' => $__vars['chat']['convUnread'],
			), $__vars) . '
					';
		} else {
			$__finalCompiled .= '
						' . $__templater->includeTemplate('siropu_chat_conversation_list_empty', $__vars) . '
					';
		}
		$__finalCompiled .= '
				</ul>
				';
		if (!$__templater->test($__vars['chat']['convMessages'], 'empty', array())) {
			$__finalCompiled .= '
					';
			if ($__templater->isTraversable($__vars['chat']['convMessages'])) {
				foreach ($__vars['chat']['convMessages'] AS $__vars['convId'] => $__vars['messages']) {
					$__finalCompiled .= '
						<ul class="siropuChatConversation siropuChatMessages" data-conv-id="' . $__templater->escape($__vars['convId']) . '" data-autoscroll="1"' . ((($__templater->method($__vars['xf']['visitor'], 'getLastConvIdSiropuChat', array()) == $__vars['convId']) AND (($__vars['chat']['channel'] == 'conv') AND (!$__vars['chat']['isResponsive']))) ? ' style="display: block;"' : '') . ' data-xf-init="lightbox">
							' . $__templater->callMacro('siropu_chat_message_list', 'conversation', array(
						'messages' => $__vars['messages'],
					), $__vars) . '
						</ul>
					';
				}
			}
			$__finalCompiled .= '
				';
		}
		$__finalCompiled .= '
				<div id="siropuChatStartConversation">
					' . $__templater->callMacro('siropu_chat_conversation_start', 'form', array(), $__vars) . '
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
		';
	if (!$__vars['chat']['settings']['editor_on_top']) {
		$__finalCompiled .= '
			' . $__templater->includeTemplate('siropu_chat_editor', $__vars) . '
		';
	}
	$__finalCompiled .= '
	</div>
</div>

';
	if ($__templater->method($__vars['xf']['visitor'], 'canChangeDisplayModeSiropuChat', array()) AND (($__vars['chat']['settings']['display_mode'] == 'all_pages') AND (!$__vars['chat']['isChatPage']))) {
		$__finalCompiled .= '
	<div id="siropuChatBar" class="block-container">
		<div id="siropuChatBarMessageContainer">
			';
		if (!$__templater->test($__vars['chat']['lastMessage'], 'empty', array())) {
			$__finalCompiled .= '
				' . $__templater->callMacro('siropu_chat_room_message_helper', 'message_content', array(
				'message' => $__vars['chat']['lastMessage'],
				'lastRow' => 'true',
				'isResponsive' => $__vars['chat']['isResponsive'],
			), $__vars) . '
				' . $__templater->func('date_dynamic', array($__vars['chat']['lastMessage']['message_date'], array(
				'class' => 'siropuChatDateTime',
			))) . '
			';
		} else {
			$__finalCompiled .= '
				<span class="siropuChatMessageText">
					';
			if (!$__templater->test($__vars['chat']['rooms'], 'empty', array())) {
				$__finalCompiled .= '
						' . 'В чате еще нет сообщений. Будьте первым!' . '
					';
			} else {
				$__finalCompiled .= '
						' . 'Вы не присоединились ни к одной комнате.' . '
					';
			}
			$__finalCompiled .= '
				</span>
			';
		}
		$__finalCompiled .= '
		</div>
		<div id="siropuChatBarDisable" data-xf-init="tooltip" title="' . $__templater->filter('Выключить чат', array(array('for_attr', array()),), true) . '">
			' . $__templater->fontAwesome('fas fa-toggle-off', array(
		)) . '
		</div>
		<div id="siropuChatBarUserCount">
			<a role="button">' . 'Чат' . ' <span>' . $__templater->filter($__vars['chat']['userCount'], array(array('number', array()),), true) . '</span></a>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);