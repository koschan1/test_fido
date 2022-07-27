<?php
// FROM HASH: eecd96802e9c6e009cd522098c19463b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('siropu_chat_room_list.less');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['xf']['visitor'], 'canCreateSiropuChatRooms', array())) {
		$__compilerTemp1 .= '
				' . $__templater->button('Создать комнату', array(
			'href' => $__templater->func('link', array('chat/room/create', ), false),
			'class' => 'button--link',
			'overlay' => 'true',
			'fa' => 'fas fa-plus-square',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if (($__templater->func('count', array($__vars['rooms'], ), false) > 5)) {
		$__compilerTemp1 .= '
				<input type="search" name="find" class="input" placeholder="' . 'Введите, чтобы найти комнаты...' . '" maxlength="100" autocomplete="off" data-xf-init="siropu-chat-find-rooms">
			';
	}
	$__compilerTemp1 .= '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
	<li id="siropuChatRoomListOptions">
		' . $__compilerTemp1 . '
	</li>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->isTraversable($__vars['rooms'])) {
		foreach ($__vars['rooms'] AS $__vars['room']) {
			$__finalCompiled .= '
	';
			$__vars['userCount'] = $__templater->filter($__templater->func('count', array($__vars['users'][$__vars['room']['room_id']], ), false), array(array('number', array()),), false);
			$__finalCompiled .= '
	';
			$__vars['sanctionNotice'] = ($__templater->method($__vars['room'], 'isSanctionNotice', array()) ?: null);
			$__finalCompiled .= '
	<li data-room-id="' . $__templater->escape($__vars['room']['room_id']) . '" data-room-name="' . $__templater->filter($__vars['room']['room_name'], array(array('for_attr', array()),), true) . '" data-joined="' . ($__templater->method($__vars['room'], 'isJoined', array()) ? 'true' : 'false') . '">
		';
			if ($__vars['sanctionNotice']) {
				$__finalCompiled .= '
			<div class="siropuChatRoomInfo">
				<h3>' . $__templater->escape($__vars['room']['room_name']) . '</h3>
				<div class="siropuChatRoomSanctionNotice">
					' . $__templater->escape($__vars['sanctionNotice']) . '
				</div>
			</div>
		';
			} else {
				$__finalCompiled .= '	
			<div class="siropuChatRoomInfo">
				<h3>
					' . $__templater->escape($__vars['room']['room_name']) . '
					';
				if ($__templater->method($__vars['room'], 'isPrivate', array()) AND $__templater->method($__vars['xf']['visitor'], 'canJoinAnyRoomSiropuChat', array())) {
					$__finalCompiled .= ' ' . $__templater->fontAwesome('fas fa-user-lock', array(
					));
				}
				$__finalCompiled .= '
					';
				if ($__templater->method($__vars['room'], 'isReadOnly', array())) {
					$__finalCompiled .= ' <span title="' . $__templater->filter('Только для чтения', array(array('for_attr', array()),), true) . '" data-xf-init="tooltip">' . $__templater->fontAwesome('fas fa-eye', array(
					)) . '</span>';
				}
				$__finalCompiled .= '
				</h3>
				<div class="siropuChatRoomDescription">' . $__templater->escape($__vars['room']['room_description']) . '</div>
				<div class="siropuChatRoomDetails">' . 'Автор' . ' ' . $__templater->func('username_link', array($__vars['room']['User'], true, array(
					'defaultname' => 'Неизвестно',
					'aria-hidden' => 'true',
				))) . ', ' . $__templater->func('date_dynamic', array($__vars['room']['room_date'], array(
				))) . '</div>
				<div class="siropuChatRoomUsers">
					<b>' . $__templater->escape($__vars['userCount']) . '</b> ' . ((($__vars['userCount'] > 1) OR ($__vars['userCount'] == 0)) ? 'Пользователи' : 'Пользователь') . (($__vars['userCount'] > 0) ? ':' : '') . '
					';
				if ($__vars['userCount']) {
					$__finalCompiled .= '
						<ul>
							';
					if ($__templater->isTraversable($__vars['users'][$__vars['room']['room_id']])) {
						foreach ($__vars['users'][$__vars['room']['room_id']] AS $__vars['user']) {
							$__finalCompiled .= '
								<li>
									';
							if (!$__vars['user']['user_id']) {
								$__finalCompiled .= '<span class="siropuChatGuest">(' . 'Гость' . ')</span> ';
							}
							$__finalCompiled .= $__templater->func('username_link', array($__vars['user'], true, array(
								'defaultname' => 'Неизвестно',
								'aria-hidden' => 'true',
							))) . '
								</li>
							';
						}
					}
					$__finalCompiled .= '
						</ul>
					';
				}
				$__finalCompiled .= '
				</div>
			</div>
			<div class="siropuChatRoomManage">
				<a href="' . $__templater->func('link', array('chat/room/link', $__vars['room'], ), true) . '" class="siropuChatRoomLink" title="' . $__templater->filter('Ссылка', array(array('for_attr', array()),), true) . '" data-xf-click="overlay">' . $__templater->fontAwesome('fa-link', array(
				)) . '<span>' . 'Ссылка' . '</span></a>
				';
				if ($__templater->method($__vars['xf']['visitor'], 'canViewSiropuChatSanctions', array())) {
					$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('chat/room/sanctions', $__vars['room'], ), true) . '" class="siropuChatRoomSanctions" title="' . $__templater->filter('Наказания', array(array('for_attr', array()),), true) . '" data-xf-click="overlay">' . $__templater->fontAwesome('fa-user-slash', array(
					)) . '<span>' . 'Наказания' . '</span></a>
				';
				}
				$__finalCompiled .= '
				';
				if ($__templater->method($__vars['room'], 'canEdit', array())) {
					$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('chat/room/edit', $__vars['room'], ), true) . '" class="siropuChatRoomEdit" title="' . $__templater->filter('Изменить', array(array('for_attr', array()),), true) . '" data-xf-click="overlay" data-cache="false">' . $__templater->fontAwesome('fa-edit', array(
					)) . '<span>' . 'Изменить' . '</span></a>
				';
				}
				$__finalCompiled .= '
				';
				if ($__templater->method($__vars['room'], 'canDelete', array())) {
					$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('chat/room/delete', $__vars['room'], ), true) . '" class="siropuChatRoomDelete" title="' . $__templater->filter('Удалить', array(array('for_attr', array()),), true) . '" data-xf-click="overlay">' . $__templater->fontAwesome('fa-trash', array(
					)) . '<span>' . 'Удалить' . '</span></a>
				';
				}
				$__finalCompiled .= '
			</div>
			<div class="siropuChatRoomAction">
				';
				if ($__templater->method($__vars['room'], 'isJoined', array()) AND $__templater->method($__vars['room'], 'canLeave', array())) {
					$__finalCompiled .= '
					' . $__templater->form('
						' . $__templater->button('Покинуть комнату', array(
						'type' => 'submit',
						'class' => 'button--cta',
						'fa' => 'fas fa-sign-out-alt',
					), '', array(
					)) . '
					', array(
						'action' => $__templater->func('link', array('chat/room/leave', $__vars['room'], ), false),
						'class' => 'siropuChatRoomLeave',
					)) . '
				';
				} else if (!$__templater->method($__vars['room'], 'isJoined', array())) {
					$__finalCompiled .= '
					';
					$__compilerTemp2 = '';
					if ($__templater->method($__vars['room'], 'canJoin', array())) {
						$__compilerTemp2 .= '
							' . $__templater->button('Присоединиться к комнате', array(
							'type' => 'submit',
							'fa' => 'fas fa-sign-in-alt',
						), '', array(
						)) . '
						';
					} else {
						$__compilerTemp2 .= '
							';
						if ($__vars['room']['room_password'] AND (!$__templater->method($__vars['room'], 'isLocked', array()))) {
							$__compilerTemp2 .= '
								' . $__templater->formTextBox(array(
								'name' => 'password',
								'class' => 'siropuChatRoomPassword',
								'placeholder' => $__templater->filter('Пароль для комнаты', array(array('for_attr', array()),), false),
							)) . '
							';
						}
						$__compilerTemp2 .= '
							';
						$__compilerTemp3 = '';
						if ($__templater->method($__vars['room'], 'isLocked', array())) {
							$__compilerTemp3 .= '
									' . 'Закрыто до <br>' . $__templater->func('date', array($__vars['room']['room_locked'], 'M d, Y', ), true) . '' . '
								';
						} else {
							$__compilerTemp3 .= '
									' . 'Присоединиться к комнате' . '
								';
						}
						$__compilerTemp2 .= $__templater->button('
								' . $__compilerTemp3 . '
							', array(
							'type' => 'submit',
							'fa' => 'fas fa-lock',
						), '', array(
						)) . '
						';
					}
					$__finalCompiled .= $__templater->form('
						' . $__compilerTemp2 . '
					', array(
						'action' => $__templater->func('link', array('chat/room/join', $__vars['room'], ), false),
						'class' => 'siropuChatRoomJoin',
					)) . '
				';
				}
				$__finalCompiled .= '
			</div>
		';
			}
			$__finalCompiled .= '
	</li>
';
		}
	}
	return $__finalCompiled;
}
);