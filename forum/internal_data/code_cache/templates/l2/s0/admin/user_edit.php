<?php
// FROM HASH: b806ae8656bf9df86148c7ca16d169cb
return array(
'macros' => array('privacy_select' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'label' => '!',
		'user' => '!',
		'hideEveryone' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'value' => 'none',
		'label' => 'Никто',
		'_type' => 'option',
	));
	if (!$__vars['hideEveryone']) {
		$__compilerTemp1[] = array(
			'value' => 'everyone',
			'label' => 'Все посетители',
			'_type' => 'option',
		);
	}
	$__compilerTemp1[] = array(
		'value' => 'members',
		'label' => 'Только зарегистрированные пользователи',
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'value' => 'followed',
		'label' => 'Пользователи, чьим подписчиком является ' . ($__vars['user']['username'] ? $__templater->escape($__vars['user']['username']) : (('[' . 'Пользователь') . ']')) . '',
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'privacy[' . $__vars['name'] . ']',
		'value' => $__vars['user']['Privacy'][$__vars['name']],
	), $__compilerTemp1, array(
		'label' => $__templater->escape($__vars['label']),
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['user'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить пользователя');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать пользователя' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['user']['username']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['user'], 'isUpdate', array())) {
		$__compilerTemp1 = '';
		if ($__vars['user']['is_banned']) {
			$__compilerTemp1 .= '
					<a href="' . $__templater->func('link', array('banning/users/lift', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Снять блокировку' . '</a>
				';
		} else if ((!$__vars['user']['is_moderator']) AND (!$__vars['user']['is_admin'])) {
			$__compilerTemp1 .= '
					<a href="' . $__templater->func('link', array('banning/users/add', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Заблокировать' . '</a>
				';
		}
		$__compilerTemp2 = '';
		if ((!$__vars['user']['is_moderator']) AND (!$__vars['user']['is_admin'])) {
			$__compilerTemp2 .= '
					<a href="' . $__templater->func('link', array('users/merge', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Объединить с другим пользователем' . '</a>
					<a href="' . $__templater->func('link', array('users/delete-conversations', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Удалить переписки' . '</a>
				';
		}
		$__compilerTemp3 = '';
		if ((!$__vars['user']['is_super_admin']) AND $__vars['xf']['options']['editHistory']['enabled']) {
			$__compilerTemp3 .= '
					<a href="' . $__templater->func('link', array('users/revert-message-edit', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Отменить правки сообщений' . '</a>
				';
		}
		$__compilerTemp4 = '';
		if (!$__vars['user']['is_super_admin']) {
			$__compilerTemp4 .= '
					<a href="' . $__templater->func('link', array('users/remove-reactions', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Удалить реакции' . '</a>
					<a href="' . $__templater->func('link', array('users/manage-watched-threads', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Управление отслеживаемыми темами' . '</a>
				';
		}
		$__compilerTemp5 = '';
		if ($__templater->method($__vars['user'], 'isAwaitingEmailConfirmation', array())) {
			$__compilerTemp5 .= '
					<a href="' . $__templater->func('link', array('users/resend-confirmation', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Отправить подтверждение учётной записи ещё раз' . '</a>
				';
		}
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<div>
		' . $__templater->button('', array(
			'href' => $__templater->func('link', array('users/delete', $__vars['user'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '

		' . $__templater->button('Действия', array(
			'class' => 'menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
		<div class="menu" data-menu="menu" aria-hidden="true">
			<div class="menu-content">
				<h3 class="menu-header">' . 'Действия' . '</h3>
				' . '
				<a href="' . $__templater->func('link_type', array('public', 'members', $__vars['user'], ), true) . '" class="menu-linkRow" target="_blank">' . 'Посмотреть публичный профиль' . '</a>

				' . $__compilerTemp1 . '

				' . $__compilerTemp2 . '

				' . $__compilerTemp3 . '

				' . $__compilerTemp4 . '

				' . $__compilerTemp5 . '
				' . '
			</div>
		</div>
	</div>
');
	}
	$__finalCompiled .= '

';
	if ($__vars['success']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">' . 'Ваши изменения были сохранены.' . '</div>
';
	}
	$__finalCompiled .= '

<div class="block">
	';
	if ($__vars['user']['user_id']) {
		$__finalCompiled .= '
	';
		$__compilerTemp6 = '';
		$__compilerTemp6 .= '
				' . '
				';
		if ($__vars['user']['is_admin']) {
			$__compilerTemp6 .= '
					<li><a href="' . $__templater->func('link', array('admins/edit', $__vars['user'], ), true) . '">' . ($__vars['user']['is_super_admin'] ? 'Главный администратор' : 'Администратор') . '</a></li>
				';
		}
		$__compilerTemp6 .= '
				';
		if ($__vars['user']['is_moderator']) {
			$__compilerTemp6 .= '
					<li><a href="' . $__templater->func('link', array('moderators', ), true) . '">' . 'Модератор' . '</a></li>
				';
		}
		$__compilerTemp6 .= '
				';
		if ($__vars['user']['Option']['is_discouraged']) {
			$__compilerTemp6 .= '
					<li>' . 'Нежелательный' . '</li>
				';
		}
		$__compilerTemp6 .= '
				';
		if ($__vars['user']['is_banned']) {
			$__compilerTemp6 .= '
					<li><a href="' . $__templater->func('link', array('banning/users/lift', $__vars['user'], ), true) . '" data-xf-click="overlay">' . 'Заблокирован' . '</a></li>
				';
		}
		$__compilerTemp6 .= '
				' . '
			';
		if (strlen(trim($__compilerTemp6)) > 0) {
			$__finalCompiled .= '
		<div class="block-outer">
			<ul class="listInline listInline--bullet">
			' . $__compilerTemp6 . '
			</ul>
		</div>
	';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	$__compilerTemp7 = '';
	if ($__vars['user']['is_super_admin']) {
		$__compilerTemp7 .= '
			<div class="block-body">
				' . $__templater->formPasswordBoxRow(array(
			'name' => 'visitor_password',
		), array(
			'label' => 'Ваш пароль',
			'explain' => 'Вы должны ввести свой текущий пароль для выполнения этого запроса.',
		)) . '
			</div>
		';
	}
	$__compilerTemp8 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp8 .= '
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-extras"
						aria-controls="user-extras"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-extras">' . 'Дополнительно' . '</a>
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-ips"
						aria-controls="user-ips"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-ips">' . 'IP-адреса' . '</a>
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-changes"
						aria-controls="user-changes"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-changes">' . 'Журнал изменений' . '</a>
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-permissions"
						aria-controls="user-permissions"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-permissions">' . 'Права' . '</a>
				';
	}
	$__compilerTemp9 = '';
	if ($__templater->method($__vars['user'], 'exists', array())) {
		$__compilerTemp9 .= '
							' . $__templater->formCheckBox(array(
			'style' => 'margin-top: 5px;',
		), array(array(
			'name' => 'username_change_invisible',
			'label' => 'Не отображать изменение имени пользователя публично (если оно изменилось)',
			'_type' => 'option',
		))) . '
						';
	}
	$__compilerTemp10 = '';
	if ($__vars['user']['username_date']) {
		$__compilerTemp10 .= '
						' . $__templater->formRow('
							' . $__templater->func('date_dynamic', array($__vars['user']['username_date'], array(
		))) . '
						', array(
			'label' => 'Последнее изменение имени пользователя',
		)) . '
					';
	}
	$__compilerTemp11 = '';
	if ($__vars['user']['next_allowed_username_change']) {
		$__compilerTemp11 .= '
						' . $__templater->formRow('
							' . $__templater->func('date_dynamic', array($__vars['user']['next_allowed_username_change'], array(
		))) . '
						', array(
			'label' => 'Следующая разрешенная смена имени пользователя',
		)) . '
					';
	}
	$__compilerTemp12 = '';
	if ($__templater->method($__vars['user'], 'exists', array())) {
		$__compilerTemp12 .= '
						' . $__templater->formRadioRow(array(
			'name' => 'change_password',
		), array(array(
			'value' => '',
			'checked' => 'checked',
			'label' => 'Не изменять',
			'_type' => 'option',
		),
		array(
			'value' => 'generate',
			'label' => 'Инициировать сброс пароля',
			'hint' => 'Подтверждение сброса пароля будет отправлено пользователю по электронной почте, и он не сможет войти в систему, пока не установит новый пароль.',
			'_type' => 'option',
		),
		array(
			'value' => 'change',
			'label' => 'Установить новый пароль' . $__vars['xf']['language']['label_separator'],
			'_dependent' => array($__templater->formTextBox(array(
			'name' => 'password',
			'autocomplete' => 'off',
		))),
			'_type' => 'option',
		)), array(
			'label' => 'Пароль',
			'explain' => 'Изменение пароля пользователя приведет к сбросу любой блокировки системы безопасности для его учетной записи.',
		)) . '
					';
	} else {
		$__compilerTemp12 .= '
						' . $__templater->formTextBoxRow(array(
			'name' => 'password',
			'autocomplete' => 'off',
		), array(
			'label' => 'Пароль',
		)) . '
					';
	}
	$__compilerTemp13 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp13 .= '
						';
		$__compilerTemp14 = '';
		if ($__vars['user']['Option']['use_tfa']) {
			$__compilerTemp14 .= '
								<ul class="inputChoices">
									<li class="inputChoices-choice inputChoices-plainChoice">' . 'Включено' . '</li>
									<li class="inputChoices-choice">' . $__templater->formCheckBox(array(
				'standalone' => 'true',
			), array(array(
				'name' => 'disable_tfa',
				'label' => 'Отключить двухфакторную аутентификацию',
				'_type' => 'option',
			))) . '</li>
								</ul>
							';
		} else {
			$__compilerTemp14 .= '
								' . 'Отключено' . '
							';
		}
		$__compilerTemp13 .= $__templater->formRow('
							' . $__compilerTemp14 . '
						', array(
			'label' => 'Двухфакторная аутентификация',
		)) . '

						' . $__templater->formRow('
							' . $__templater->func('avatar', array($__vars['user'], 'l', false, array(
			'href' => $__templater->func('link', array('users/avatar', $__vars['user'], ), false),
			'data-xf-click' => 'overlay',
		))) . '
							<div>
								' . $__templater->button('Изменить аватар', array(
			'href' => $__templater->func('link', array('users/avatar', $__vars['user'], ), false),
			'data-xf-click' => 'overlay',
			'class' => 'button--link',
		), '', array(
		)) . '
							</div>
						', array(
			'label' => 'Аватар',
			'rowtype' => 'button avatar',
		)) . '

						' . $__templater->formRow('
							' . $__templater->func('profile_banner', array($__vars['user'], 'l', false, array(
			'class' => 'memberProfileBanner--small',
			'href' => $__templater->func('link', array('users/banner', $__vars['user'], ), false),
			'overlay' => 'true',
			'hideempty' => 'true',
		), '')) . '
							' . $__templater->button('Изменить обложку профиля', array(
			'href' => $__templater->func('link', array('users/banner', $__vars['user'], ), false),
			'data-xf-click' => 'overlay',
			'class' => 'button--link',
		), '', array(
		)) . '
						', array(
			'label' => 'Обложка профиля',
			'rowtype' => 'button memberProfileBanner',
		)) . '

						' . $__templater->formRow('
							' . $__templater->func('date_dynamic', array($__vars['user']['register_date'], array(
		))) . '
						', array(
			'label' => 'Регистрация',
		)) . '
						';
		if ($__vars['user']['last_activity']) {
			$__compilerTemp13 .= '
							' . $__templater->formRow('
								' . $__templater->func('date_dynamic', array($__vars['user']['last_activity'], array(
			))) . '
							', array(
				'label' => 'Последняя активность',
			)) . '
						';
		}
		$__compilerTemp13 .= '
					';
	}
	$__compilerTemp15 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp15 .= '
							';
		if (!$__vars['user']['is_moderator']) {
			$__compilerTemp15 .= '<a href="' . $__templater->func('link', array('moderators', ), true) . '">' . 'Сделать этого пользователя модератором' . '</a>';
		}
		$__compilerTemp15 .= '
							';
		if ((!$__vars['user']['is_admin']) AND (!$__vars['user']['is_moderator'])) {
			$__compilerTemp15 .= '/';
		}
		$__compilerTemp15 .= '
							';
		if (!$__vars['user']['is_admin']) {
			$__compilerTemp15 .= '<a href="' . $__templater->func('link', array('admins', ), true) . '">' . 'Сделать этого пользователя администратором' . '</a>';
		}
		$__compilerTemp15 .= '
						';
	}
	$__vars['_userChangesHtml'] = $__templater->preEscaped('
						' . $__compilerTemp15 . '
					');
	$__compilerTemp16 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp17 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp18 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Использовать стиль по умолчанию' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp19 = $__templater->method($__vars['styleTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp19)) {
		foreach ($__compilerTemp19 AS $__vars['treeEntry']) {
			$__compilerTemp18[] = array(
				'value' => $__vars['treeEntry']['record']['style_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp20 = array();
	$__compilerTemp21 = $__templater->method($__vars['languageTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp21)) {
		foreach ($__compilerTemp21 AS $__vars['treeEntry']) {
			$__compilerTemp20[] = array(
				'value' => $__vars['treeEntry']['record']['language_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . '
								' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp22 = $__templater->mergeChoiceOptions(array(), $__vars['timeZones']);
	$__compilerTemp23 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp23 .= '
				<li data-href="' . $__templater->func('link', array('users/extra', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="user-extras">
					<div class="block-body block-row">' . 'Загрузка' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__compilerTemp24 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp24 .= '
				<li data-href="' . $__templater->func('link', array('users/user-ips', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="user-ips">
					<div class="block-body block-row">' . 'Загрузка' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__compilerTemp25 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp25 .= '
				<li data-href="' . $__templater->func('link', array('users/change-log', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="user-changes">
					<div class="block-body block-row">' . 'Загрузка' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__compilerTemp26 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp26 .= '
				<li data-href="' . $__templater->func('link', array('permissions/users', $__vars['user'], array('tabbed' => 1, ), ), true) . '" role="tabpanel" aria-labelledby="user-permissions">
					<div class="block-body block-row">' . 'Загрузка' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__finalCompiled .= $__templater->form('
		' . $__compilerTemp7 . '

		<h2 class="block-tabHeader tabs hScroller" data-xf-init="tabs h-scroller" data-state="replace" role="tablist">
			<span class="hScroller-scroll">
				' . '
				<a class="tabs-tab is-active" role="tab" tabindex="0"
					id="user-details"
					aria-controls="user-details"
					href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-details">' . 'Основная информация' . '</a>
				' . $__compilerTemp8 . '
				' . '
			</span>
		</h2>

		<ul class="tabPanes">
			' . '
			<li class="is-active" role="tabpanel" aria-labelledby="user-details">
				<div class="block-body">
					' . $__templater->formTextBoxRow(array(
		'name' => 'user[username]',
		'value' => $__vars['user']['username'],
		'maxlength' => ($__vars['xf']['options']['usernameLength']['max'] ?: $__templater->func('max_length', array($__vars['user'], 'username', ), false)),
	), array(
		'label' => 'Имя пользователя',
		'html' => $__compilerTemp9,
	)) . '

					' . $__compilerTemp10 . '

					' . $__compilerTemp11 . '

					' . $__templater->formTextBoxRow(array(
		'name' => 'user[email]',
		'value' => $__vars['user']['email'],
		'type' => 'email',
		'dir' => 'ltr',
		'maxlength' => $__templater->func('max_length', array($__vars['user'], 'email', ), false),
	), array(
		'label' => 'Электронная почта',
	)) . '

					' . $__compilerTemp12 . '

					' . $__compilerTemp13 . '

					<hr class="formRowSep" />

					' . '' . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[user_group_id]',
		'value' => $__vars['user']['user_group_id'],
	), $__compilerTemp16, array(
		'label' => 'Группа пользователя',
		'explain' => $__templater->filter($__vars['_userChangesHtml'], array(array('raw', array()),), true),
	)) . '

					' . $__templater->formCheckBoxRow(array(
		'name' => 'user[secondary_group_ids]',
		'value' => $__vars['user']['secondary_group_ids'],
		'listclass' => 'listColumns',
	), $__compilerTemp17, array(
		'label' => 'Дополнительные группы пользователя',
	)) . '

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[is_staff]',
		'selected' => $__vars['user']['is_staff'],
		'label' => 'Отображать пользователя как члена команды',
		'hint' => 'Если включено, то этот пользователь будет отображаться для всех как один из членов команды.',
		'_type' => 'option',
	)), array(
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[user_state]',
		'value' => $__vars['user']['user_state'],
	), array(array(
		'value' => 'valid',
		'label' => 'Активен',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm',
		'label' => 'Ожидает подтверждения по электронной почте',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm_edit',
		'label' => 'Ожидает подтверждения по электронной почте (после редактирования)',
		'_type' => 'option',
	),
	array(
		'value' => 'email_bounce',
		'label' => 'Электронная почта недействительна (bounced)',
		'_type' => 'option',
	),
	array(
		'value' => 'moderated',
		'label' => 'Ожидает одобрения',
		'_type' => 'option',
	),
	array(
		'value' => 'rejected',
		'label' => 'Отказано',
		'_type' => 'option',
	),
	array(
		'value' => 'disabled',
		'label' => 'Отключено',
		'_type' => 'option',
	)), array(
		'label' => 'Состояние пользователя',
		'explain' => '
							' . 'Когда пользователь имеет статус, отличный от \'' . 'Активен' . '\', он будет иметь права группы ' . (((('<a href="' . $__templater->func('link', array('user-groups/edit', array('user_group_id' => 1, 'title' => $__vars['userGroups']['1'], ), ), true)) . '" target="_blank">') . $__templater->escape($__vars['userGroups']['1'])) . '</a>') . '.' . '
						',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[security_lock]',
		'value' => $__vars['user']['security_lock'],
	), array(array(
		'value' => '',
		'label' => 'Нет',
		'_type' => 'option',
	),
	array(
		'value' => 'change',
		'label' => 'Закрыто' . $__vars['xf']['language']['label_separator'] . ' ' . 'Пользователь должен изменить пароль',
		'_type' => 'option',
	),
	array(
		'value' => 'reset',
		'label' => 'Закрыто' . $__vars['xf']['language']['label_separator'] . ' ' . 'Пользователь должен сбросить пароль',
		'_type' => 'option',
	)), array(
		'label' => 'Блокировка безопасности',
		'explain' => '
							' . 'Когда система безопасности блокирует аккаунт, Вы можете либо заставить пользователя сменить свой пароль, либо, если Вы подозреваете несанкционированный доступ к аккаунту пользователя, Вы можете заставить его сбросить свой пароль (требуется наличие у аккаунта email-адреса).' . '
						',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'option[is_discouraged]',
		'selected' => $__vars['user']['Option']['is_discouraged'],
		'hint' => 'Нежелательные пользователи будут подвергнуты случайным раздражающим задержкам и сбоям, сделанным для того, чтобы подтолкнуть их уйти с форума и не мешать нормальным пользователям.',
		'label' => 'Нежелательный',
		'_type' => 'option',
	)), array(
		'explain' => '<a href="' . $__templater->func('link', array('banning/discouraged-ips', ), true) . '">' . 'В качестве альтернативы можно использовать систему нежелательных пользователей, основанную на IP-адресах.' . '</a>',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Персональная информация' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->callMacro('public:helper_user_dob_edit', 'dob_edit', array(
		'dobData' => $__vars['user']['Profile'],
	), $__vars) . '

					<hr class="formRowSep" />

					' . $__templater->formTextBoxRow(array(
		'name' => 'profile[location]',
		'value' => $__vars['user']['Profile']['location_'],
	), array(
		'label' => 'Местоположение',
	)) . '
					' . $__templater->formTextBoxRow(array(
		'name' => 'profile[website]',
		'value' => $__vars['user']['Profile']['website_'],
		'type' => 'url',
		'dir' => 'ltr',
	), array(
		'label' => 'Сайт',
	)) . '
					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'personal',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
					' . $__templater->formTextAreaRow(array(
		'name' => 'profile[about]',
		'value' => $__vars['user']['Profile']['about_'],
		'autosize' => 'true',
	), array(
		'label' => 'Информация',
		'hint' => 'Можно использовать BB-код',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Информация профиля' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formTextBoxRow(array(
		'name' => 'user[custom_title]',
		'value' => $__vars['user']['custom_title_'],
		'maxlength' => $__templater->func('max_length', array($__vars['user'], 'custom_title', ), false),
	), array(
		'label' => 'Нестандартное звание',
	)) . '
					' . $__templater->formTextAreaRow(array(
		'name' => 'profile[signature]',
		'value' => $__vars['user']['Profile']['signature_'],
		'autosize' => 'true',
	), array(
		'label' => 'Подпись',
		'hint' => 'Можно использовать BB-код',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[message_count]',
		'value' => $__vars['user']['message_count'],
		'min' => '0',
	), array(
		'label' => 'Сообщения',
	)) . '
					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[reaction_score]',
		'value' => $__vars['user']['reaction_score'],
	), array(
		'label' => 'Реакции',
	)) . '
					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[trophy_points]',
		'value' => $__vars['user']['trophy_points'],
		'min' => '0',
	), array(
		'label' => 'Баллы',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Дополнительные контакты' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'contact',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Настройки' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formSelectRow(array(
		'name' => 'user[style_id]',
		'value' => $__vars['user']['style_id'],
	), $__compilerTemp18, array(
		'label' => 'Стиль',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formSelectRow(array(
		'name' => 'user[language_id]',
		'value' => $__vars['user']['language_id'],
	), $__compilerTemp20, array(
		'label' => 'Язык',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[timezone]',
		'value' => $__vars['user']['timezone'],
	), $__compilerTemp22, array(
		'label' => 'Часовой пояс',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'option[content_show_signature]',
		'selected' => $__vars['user']['Option']['content_show_signature'],
		'label' => '
							' . 'Показывать подписи вместе с сообщениями',
		'_type' => 'option',
	),
	array(
		'name' => 'option[receive_admin_email]',
		'selected' => $__vars['user']['Option']['receive_admin_email'],
		'label' => '
							' . 'Получать электронные письма о новостях и обновлениях' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'enable_activity_summary_email',
		'selected' => $__vars['user']['last_summary_email_date'] !== null,
		'label' => '
							' . 'Получать электронные письма со сводкой активности' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'option[email_on_conversation]',
		'selected' => $__vars['user']['Option']['email_on_conversation'],
		'label' => '
							' . 'Получать уведомления на электронную почту, если появилось новое сообщение в личной переписке',
		'_type' => 'option',
	)), array(
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'option[creation_watch_state]',
		'value' => $__vars['user']['Option']['creation_watch_state'],
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Да',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Да, с электронной почтой',
		'_type' => 'option',
	),
	array(
		'value' => '',
		'label' => 'Нет',
		'_type' => 'option',
	)), array(
		'label' => 'Отслеживать контент при создании',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'option[interaction_watch_state]',
		'value' => $__vars['user']['Option']['interaction_watch_state'],
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Да',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Да, с электронной почтой',
		'_type' => 'option',
	),
	array(
		'value' => '',
		'label' => 'Нет',
		'_type' => 'option',
	)), array(
		'label' => 'Отслеживать контент при взаимодействии',
	)) . '

					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'preferences',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Конфиденциальность' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[visible]',
		'selected' => $__vars['user']['visible'],
		'label' => 'Показывать онлайн-статус',
		'_dependent' => array('
								' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'user[activity_visible]',
		'selected' => $__vars['user']['activity_visible'],
		'label' => '
										' . 'Показывать текущую активность' . '
									',
		'_type' => 'option',
	))) . '
							'),
		'_type' => 'option',
	),
	array(
		'name' => 'option[show_dob_date]',
		'selected' => $__vars['user']['Option']['show_dob_date'],
		'label' => '
							' . 'Показывать день и месяц рождения' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'option[show_dob_year]',
		'selected' => $__vars['user']['Option']['show_dob_year'],
		'label' => '
							' . 'Показывать год рождения' . '
						',
		'_type' => 'option',
	)), array(
		'label' => 'Общая конфиденциальность',
	)) . '

					<hr class="formRowSep" />

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_view_profile',
		'label' => 'Просматривать страницу профиля пользователя',
		'user' => $__vars['user'],
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_post_profile',
		'label' => 'Оставлять сообщения в профиле этого пользователя',
		'user' => $__vars['user'],
		'hideEveryone' => true,
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_receive_news_feed',
		'label' => 'Просматривать ленту новостей этого пользователя',
		'user' => $__vars['user'],
	), $__vars) . '

					<hr class="formRowSep" />

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_send_personal_conversation',
		'label' => 'Начинать переписку с этим пользователем',
		'user' => $__vars['user'],
		'hideEveryone' => true,
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_view_identities',
		'label' => 'Просматривать идентификационные данные этого пользователя',
		'user' => $__vars['user'],
	), $__vars) . '
				</div>

				' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
			</li>

			' . $__compilerTemp23 . '

			' . $__compilerTemp24 . '

			' . $__compilerTemp25 . '

			' . $__compilerTemp26 . '
			' . '
		</ul>
	', array(
		'action' => $__templater->func('link', array('users/save', $__vars['user'], ), false),
		'ajax' => 'true',
		'class' => 'block-container',
		'novalidate' => 'novalidate',
	)) . '
</div>

';
	return $__finalCompiled;
}
);