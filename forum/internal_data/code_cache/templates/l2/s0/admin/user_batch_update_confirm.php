<?php
// FROM HASH: 685cb72364472b533833c3d5c7e28bb4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Пакетное обновление пользователей');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['userIds']) {
		$__compilerTemp1 .= '
					<span role="presentation" aria-hidden="true">&middot;</span>
					<a href="' . $__templater->func('link', array('users/list', null, array('criteria' => $__vars['criteria'], 'all' => true, ), ), true) . '">' . 'Просмотр или фильтрация совпадений' . '</a>
				';
	}
	$__compilerTemp2 = array(array(
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroup']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['userGroup']['user_group_id'],
				'label' => $__templater->escape($__vars['userGroup']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = array(array(
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroup']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['userGroup']['user_group_id'],
				'label' => $__templater->escape($__vars['userGroup']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp4 = array(array(
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroup']) {
			$__compilerTemp4[] = array(
				'value' => $__vars['userGroup']['user_group_id'],
				'label' => $__templater->escape($__vars['userGroup']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp5 = '';
	if ($__vars['userIds']) {
		$__compilerTemp5 .= '
		' . $__templater->formHiddenVal('user_ids', $__templater->filter($__vars['userIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp5 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Обновить пользователей' . '</h2>
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . '
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Найдено пользователей',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'actions[set_primary_group_id]',
	), $__compilerTemp2, array(
		'label' => 'Установить основную группу пользователей',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'actions[add_group_id]',
	), $__compilerTemp3, array(
		'label' => 'Добавить дополнительную группу пользователей',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'actions[remove_group_id]',
	), $__compilerTemp4, array(
		'label' => 'Убрать из дополнительной группы пользователей',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'actions[set_user_state]',
	), array(array(
		'_type' => 'option',
	),
	array(
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
		'label' => 'Установить состояние пользователя',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'actions[set_security_lock]',
	), array(array(
		'_type' => 'option',
	),
	array(
		'value' => 'none',
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
		'label' => 'Установить блокировку безопасности',
		'explain' => 'Администраторы не будут заблокированы системой безопасности.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'actions[custom_title]',
	), array(
		'label' => 'Установить звание',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[discourage]',
		'label' => 'Добавить к нежелательны',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[undiscourage]',
		'label' => 'Убрать из нежелательных',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[ban]',
		'label' => 'Заблокировать (навсегда)',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unban]',
		'label' => 'Разблокировать пользователей',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[remove_avatar]',
		'label' => 'Удалить аватары',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[remove_signature]',
		'label' => 'Удалить подписи',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[remove_website]',
		'label' => 'Удалить веб-сайты',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[enable_activity_summary_email]',
		'label' => 'Включить отправку email со сводкой активности',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[disable_activity_summary_email]',
		'label' => 'Отключить отправку email со сводкой активности',
		'_type' => 'option',
	)), array(
		'explain' => 'Ни одно из указанных действий пакетного обновления не будет применяться к главным администраторам.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Обновить пользователей',
		'icon' => 'save',
	), array(
	)) . '
	</div>

	' . $__compilerTemp5 . '
', array(
		'action' => $__templater->func('link', array('users/batch-update/action', ), false),
		'class' => 'block',
	)) . '

';
	$__compilerTemp6 = '';
	if ($__vars['userIds']) {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('user_ids', $__templater->filter($__vars['userIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Удалить пользователей' . '</h2>
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[delete]',
		'label' => 'Подтвердите удаление ' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . ' пользователей',
		'_type' => 'option',
	)), array(
		'explain' => 'Администраторы и модераторы не будут удалены.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'name' => 'confirm_delete',
		'icon' => 'delete',
	), array(
	)) . '
	</div>

	' . $__compilerTemp6 . '
', array(
		'action' => $__templater->func('link', array('users/batch-update/action', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);