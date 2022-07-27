<?php
// FROM HASH: 3c7fae771e21c41f07facd6f1f9462c6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'XF.SiropuChat.Core = XF.extend(XF.SiropuChat.Core, {
	userId: ' . $__templater->escape($__vars['xf']['visitor']['user_id']) . ',
	canUseChat: ' . ($__templater->method($__vars['xf']['visitor'], 'canUseSiropuChat', array()) ? 'true' : 'false') . ',
	serverTime: ' . $__templater->escape($__vars['xf']['time']) . ',
	channel: \'' . $__templater->escape($__vars['chat']['channel']) . '\',
	roomId: ' . ($__templater->escape($__vars['chat']['roomId']) ?: 0) . ',
	lastId: ' . $__templater->filter($__vars['chat']['lastRoomIds'], array(array('json', array()),array('raw', array()),), true) . ',
	convId: ' . ($__templater->escape($__vars['chat']['convId']) ?: 0) . ',
	convUnread: ' . $__templater->filter($__vars['chat']['convUnread'], array(array('json', array()),array('raw', array()),), true) . ',
	convOnly: ' . ($__vars['chat']['convOnly'] ? 1 : 0) . ',
	convItems: ' . $__templater->filter($__vars['chat']['convIds'], array(array('json', array()),array('raw', array()),), true) . ',
	guestRoom: ' . $__templater->escape($__vars['xf']['options']['siropuChatGuestRoom']) . ',
	messageDisplayLimit: ' . ($__templater->escape($__vars['chat']['messageDisplayLimit']) ?: 25) . ',
	notificationTimeout: ' . ($__vars['xf']['options']['siropuChatNotificationTimeout'] * 1000) . ',
	refreshActive: ' . ($__vars['xf']['options']['siropuChatRefreshIntervalActive'] * 1000) . ',
	refreshActiveHidden: ' . ($__vars['xf']['options']['siropuChatRefreshIntervalActiveHidden'] * 1000) . ',
	refreshInactive: ' . ($__vars['xf']['options']['siropuChatRefreshIntervalInactive'] * 1000) . ',
	refreshInactiveHidden: ' . ($__vars['xf']['options']['siropuChatRefreshIntervalInactiveHidden'] * 1000) . ',
	tabNotification: ' . ($__vars['xf']['options']['siropuChatTabNotification'] ? 'true' : 'false') . ',
	inverse: ' . ($__templater->escape($__vars['chat']['settings']['inverse']) ?: 0) . ',
	floodCheck: ' . ($__vars['xf']['options']['siropuChatFloodCheckLength'] * 1000) . ',
	roomFloodCheck: ' . ($__vars['chat']['rooms'] ? ($__vars['chat']['rooms'][$__vars['chat']['roomId']]['room_flood'] * 1000) : 0) . ',
	bypassFloodCheck: ' . ($__templater->method($__vars['xf']['visitor'], 'canBypassSiropuChatFloodCheck', array()) ? 'true' : 'false') . ',
	displayNavCount: ' . (($__vars['xf']['options']['siropuChatPage'] AND $__vars['xf']['options']['siropuChatNavUserCount']) ? 'true' : 'false') . ',
	dynamicTitle: ' . ($__vars['xf']['options']['siropuChatDynamicTitle'] ? 'true' : 'false') . ',
	activeUsers: ' . $__templater->filter($__vars['chat']['userIds'], array(array('raw', array()),array('json', array()),), true) . ',
	commands: ' . $__templater->filter($__vars['chat']['commands'], array(array('raw', array()),array('json', array()),), true) . ',
	loadMoreButton: {room: ' . (($__vars['xf']['options']['siropuChatRoomLoadMoreButton'] AND $__templater->method($__vars['xf']['visitor'], 'canViewSiropuChatArchive', array())) ? 'true' : 'false') . ', conv: ' . ($__vars['xf']['options']['siropuChatConvLoadMoreButton'] ? 'true' : 'false') . '},
	loadRooms: ' . ($__vars['xf']['options']['siropuChatLoadRoomsIfNoneJoined'] ? 'true' : 'false') . ',
	internalLinksInNewTab: ' . ($__vars['xf']['options']['siropuChatOpenInternalLinksInNewTab'] ? 'true' : 'false') . ',
	roomTabUserCount: ' . ($__vars['xf']['options']['siropuChatRoomTabUserCount'] ? 'true' : 'false') . ',
	enableRightNavLinkMobile: ' . ($__vars['xf']['options']['siropuChatEnableRightNavLinkMobile'] ? 'true' : 'false') . ',
	convTabCount: \'' . $__templater->escape($__vars['xf']['options']['siropuChatConvTabCount']) . '\',
	userListOrder: \'' . $__templater->escape($__vars['xf']['options']['siropuChatUsersOrder']) . '\',
	forceAutoScroll: false
});

jQuery.extend(XF.phrases, {
	siropu_chat_write_public_message: "' . $__templater->filter('Напишите публичное сообщение...', array(array('escape', array('js', )),), true) . '",
	siropu_chat_write_private_message: "' . $__templater->filter('Напишите приватное сообщение...', array(array('escape', array('js', )),), true) . '",
	siropu_chat_new_message: "' . $__templater->filter('Чат: Новое сообщение', array(array('escape', array('js', )),), true) . '",
	siropu_chat_new_public_message: "' . $__templater->filter('Чат: Новое публичное сообщение', array(array('escape', array('js', )),), true) . '",
	siropu_chat_new_whisper_message: "' . $__templater->filter('Чат: Новое личное сообщение', array(array('escape', array('js', )),), true) . '",
	siropu_chat_new_private_message: "' . $__templater->filter('Чат: Новое сообщение в приватном разговоре', array(array('escape', array('js', )),), true) . '",
	siropu_chat_posting_message: "' . $__templater->filter('Публикация сообщения...', array(array('escape', array('js', )),), true) . '",
	siropu_chat_please_wait: "' . $__templater->filter('Пожалуйста, подождите...', array(array('escape', array('js', )),), true) . '",
	siropu_chat_please_wait_x_seconds: "' . $__templater->filter('Пожалуйста, подождите ' . $__vars['xf']['options']['siropuChatFloodCheckLength'] . ' секунд...', array(array('escape', array('js', )),), true) . '",
	siropu_chat_no_response: "' . $__templater->filter('Сервер не ответил вовремя. :(', array(array('escape', array('js', )),), true) . '",
	siropu_chat_loading_conversation: "' . $__templater->filter('Загрузка приватного разговора...', array(array('escape', array('js', )),), true) . '",
	siropu_chat_confirm_conversation_leave: "' . $__templater->filter('Вы уверены, что хотите покинуть приватный разговор?', array(array('escape', array('js', )),), true) . '",
	siropu_chat_settings_change_reload_page: "' . $__templater->filter('Перезагрузите страницу, чтобы изменения применились.', array(array('escape', array('js', )),), true) . '",
	siropu_chat_room_is_read_only: "' . $__templater->filter('Эта комната доступна только для чтения.', array(array('escape', array('js', )),), true) . '",
	siropu_chat_no_conversations_started: "' . $__templater->filter('Вы еще не начинали приватных разговоров.', array(array('escape', array('js', )),), true) . '",
	siropu_chat_load_more_messages: "' . $__templater->filter('Загрузить больше сообщений?', array(array('escape', array('js', )),), true) . '",
	siropu_chat_all_messages_have_been_loaded: "' . $__templater->filter('Все сообщения загружены.', array(array('escape', array('js', )),), true) . '",
	siropu_chat_loading_conversation_messages: "' . $__templater->filter('Загрузка сообщений приватного разговора...', array(array('escape', array('js', )),), true) . '",
	siropu_chat_has_been_disabled: "' . $__templater->filter('Чат отключен. Вы можете включить его снова в том же месте.', array(array('escape', array('js', )),), true) . '",
	siropu_chat_do_not_have_permission_to_use: "' . $__templater->filter('You do not have the permission to use the chat.', array(array('escape', array('js', )),), true) . '",
	siropu_chat_no_one_is_chatting: "' . $__templater->filter('Никто не разговаривает в данный момент.', array(array('escape', array('js', )),), true) . '"
});

' . $__templater->includeTemplate('siropu_chat_custom_js', $__vars);
	return $__finalCompiled;
}
);