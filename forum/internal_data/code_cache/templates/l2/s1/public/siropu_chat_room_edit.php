<?php
// FROM HASH: 5850b8e23dd505b0072dd7bd65c15faa
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['room'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Создать комнату');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать комнату' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['room']['room_name']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'siropu/chat/room.js',
		'min' => 'true',
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canSetSiropuChatRoomUsers', array()) AND (!$__templater->method($__vars['room'], 'isMain', array()))) {
		$__compilerTemp1 .= '
				' . $__templater->formTokenInputRow(array(
			'name' => 'room_users',
			'value' => $__templater->filter($__templater->func('array_values', array($__vars['room']['room_users'], ), false), array(array('join', array(',', )),), false),
			'href' => $__templater->func('link', array('members/find', ), false),
		), array(
			'label' => 'Room users',
			'explain' => 'The names of the users who can join the room. Users will automatically join the room and get a notification about it.',
			'hint' => 'Не обязательно',
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canPasswordProtectSiropuChatRooms', array()) AND (!$__templater->method($__vars['room'], 'isMain', array()))) {
		$__compilerTemp2 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'room_password',
			'value' => $__vars['room']['room_password'],
			'maxlength' => $__templater->func('max_length', array($__vars['room'], 'room_password', ), false),
		), array(
			'label' => 'Пароль для комнаты',
			'explain' => 'Allow room access using a password.',
			'hint' => 'Не обязательно',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditSiropuChatRoomSettings', array())) {
		$__compilerTemp3 .= '
				<h2 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up :next">
						<span class="block-formSectionHeader-aligner">' . 'Параметры администратора' . '</span>
					</span>
				</h2>

				<div class="block-body block-body--collapsible">
					';
		$__compilerTemp4 = array();
		if ($__templater->isTraversable($__vars['userGroups'])) {
			foreach ($__vars['userGroups'] AS $__vars['group']) {
				$__compilerTemp4[] = array(
					'name' => 'room_user_groups[]',
					'value' => $__vars['group']['user_group_id'],
					'label' => $__templater->escape($__vars['group']['title']),
					'checked' => $__templater->func('in_array', array($__vars['group']['user_group_id'], $__vars['room']['room_user_groups'], ), false),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp3 .= $__templater->formCheckBoxRow(array(
		), $__compilerTemp4, array(
			'label' => 'Группы пользователей',
			'explain' => 'Этот параметр включает доступ в комнату на основе групп пользователей.',
		)) . '

					';
		$__compilerTemp5 = array(array(
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['languages'])) {
			foreach ($__vars['languages'] AS $__vars['language']) {
				$__compilerTemp5[] = array(
					'value' => $__vars['language']['record']['language_id'],
					'label' => $__templater->func('repeat', array('--', $__vars['language']['depth'], ), true) . ' ' . $__templater->escape($__vars['language']['record']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp3 .= $__templater->formSelectRow(array(
			'name' => 'room_language_id',
			'value' => $__vars['room']['room_language_id'],
		), $__compilerTemp5, array(
			'label' => 'User language',
			'explain' => 'This option allows you to display room based on the user\'s account language setting.',
		)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'room_leave',
			'value' => '1',
			'label' => 'Can leave room',
			'checked' => ($__vars['room']['room_leave'] == true),
			'_type' => 'option',
		)), array(
			'explain' => 'This option allows you to control if the user can leave or not the room once joined.',
		)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'room_readonly',
			'value' => '1',
			'label' => 'Только для чтения',
			'checked' => ($__vars['room']['room_readonly'] == true),
			'_type' => 'option',
		)), array(
			'explain' => 'Если включено, пользователи, которые присоединятся к этой комнаты, не смогут публиковать в ней сообщение.',
		)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
		), array(array(
			'label' => 'Закрыта',
			'checked' => ($__vars['room']['room_locked'] != 0),
			'_dependent' => array('
								' . $__templater->formDateInput(array(
			'name' => 'room_locked',
			'value' => ($__vars['room']['room_locked'] ? $__templater->func('date', array($__vars['room']['room_locked'], 'Y-m-d', ), false) : ''),
			'placeholder' => 'До' . $__vars['xf']['language']['ellipsis'],
		)) . '
							'),
			'_type' => 'option',
		)), array(
			'explain' => 'Если комната закрыта, пользователи не смогут присоединиться к ней до указаной даты.',
		)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'room_rss',
			'value' => '1',
			'label' => 'RSS',
			'checked' => ($__vars['room']['room_rss'] == true),
			'_type' => 'option',
		)), array(
			'explain' => 'This option allows you to get room messages in a RSS feed. Once enabled, the RSS link will show up when you click the "Link" icon in room list for this room.',
		)) . '

					<hr class="formRowSep" />

					' . $__templater->formNumberBoxRow(array(
			'name' => 'room_flood',
			'value' => $__vars['room']['room_flood'],
			'min' => '0',
			'units' => 'Секунд',
		), array(
			'label' => 'Минимальное время между сообщениями',
			'explain' => 'Пользователям придется ждать указанный здесь интервал времени между публикацией сообщений. Пользователи с правом "Игнорировать проверку на флуд" будут освобождены от этой проверки.',
		)) . '

					<hr class="formRowSep" />

					' . $__templater->formNumberBoxRow(array(
			'name' => 'room_prune',
			'value' => $__vars['room']['room_prune'],
			'min' => '0',
			'units' => 'Часов',
		), array(
			'label' => 'Авто-очистка сообщений каждые',
			'explain' => 'Эта опция позволяет автоматически очищать сообщение каждые Х часа(ов). Установите 0 для отключения.',
		)) . '

					<hr class="formRowSep" />

					' . $__templater->formTextBoxRow(array(
			'name' => 'room_thread_id',
			'value' => $__vars['room']['room_thread_id'],
		), array(
			'label' => 'ID темы',
			'explain' => 'Если указан ID темы, сообщения, опубликованные в этой комнате, будут опубликованы в теме, ID которой указан выше.',
		)) . '

					' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'room_thread_reply',
			'value' => '1',
			'checked' => ($__vars['room']['room_thread_reply'] == true),
			'label' => 'Enable thread reply',
			'_type' => 'option',
		)), array(
			'explain' => 'This option allows you to post thread replies into the room.',
		)) . '

					<hr class="formRowSep" />

					';
		$__compilerTemp6 = $__templater->mergeChoiceOptions(array(), $__vars['rooms']);
		$__compilerTemp3 .= $__templater->formSelectRow(array(
			'name' => 'room_child_ids',
			'value' => $__vars['room']['room_child_ids'],
			'multiple' => 'true',
		), $__compilerTemp6, array(
			'label' => 'Repost in selected rooms',
			'explain' => 'This option allows you to automatically repost the messages you post in this room in other rooms.',
		)) . '
				</div>
			';
	}
	$__compilerTemp7 = '';
	if ($__templater->method($__vars['room'], 'isInsert', array())) {
		$__compilerTemp7 .= '
					' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => 'join_room',
			'value' => '1',
			'label' => 'Присоединиться к комнате',
			'checked' => 'checked',
			'_type' => 'option',
		))) . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'room_name',
		'value' => $__vars['room']['room_name'],
		'maxlength' => $__templater->func('max_length', array($__vars['room'], 'room_name', ), false),
	), array(
		'label' => 'Название комнаты',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'room_description',
		'value' => $__vars['room']['room_description'],
		'maxlength' => $__templater->func('max_length', array($__vars['room'], 'room_description', ), false),
		'rows' => '3',
	), array(
		'label' => 'Описание комнаты',
	)) . '

			' . $__compilerTemp1 . '

			' . $__compilerTemp2 . '

			' . $__compilerTemp3 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
		'class' => 'js-overlayClose',
	), array(
		'rowtype' => 'simple',
		'html' => '
				' . $__compilerTemp7 . '
			',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/room/save', $__vars['room'], ), false),
		'class' => 'block',
		'ajax' => 'true',
		'data-xf-init' => 'siropu-chat-room-save',
	));
	return $__finalCompiled;
}
);