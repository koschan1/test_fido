<?php
// FROM HASH: 3982efb3a50130d0478223731e2713f4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__vars['noSpecificUser']) {
		$__finalCompiled .= '
	' . $__templater->formRow('
		<ul class="inputList">
			<li>' . $__templater->formTextBox(array(
			'name' => 'criteria[username][name]',
			'value' => ($__templater->func('is_array', array($__vars['criteria']['username'], ), false) ? $__vars['criteria']['username']['name'] : $__vars['criteria']['username']),
			'readonly' => $__vars['readOnly'],
		)) . '</li>

			<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
			'readonly' => $__vars['readOnly'],
		), array(array(
			'name' => 'criteria[username][exact_match]',
			'selected' => ($__templater->func('is_array', array($__vars['criteria']['username'], ), false) AND $__vars['criteria']['username']['exact_match']),
			'label' => '
					' . 'Точное совпадение' . '
				',
			'_type' => 'option',
		))) . '</li>
		</ul>
	', array(
			'label' => 'Имя пользователя',
		)) . '

	' . $__templater->formRow('
		<ul class="inputList">
			<li>' . $__templater->formTextBox(array(
			'name' => 'criteria[email][address]',
			'value' => ($__templater->func('is_array', array($__vars['criteria']['email'], ), false) ? $__vars['criteria']['email']['address'] : $__vars['criteria']['email']),
		)) . '
			</li>

			<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
			'readonly' => $__vars['readOnly'],
		), array(array(
			'name' => 'criteria[email][exact_match]',
			'selected' => ($__templater->func('is_array', array($__vars['criteria']['email'], ), false) AND $__vars['criteria']['email']['exact_match']),
			'label' => '
					' . 'Точное совпадение' . '
				',
			'_type' => 'option',
		))) . '</li>
		</ul>
	', array(
			'label' => 'Электронная почта',
		)) . '
';
	}
	$__finalCompiled .= '

<hr class="formRowSep" />

';
	if (!$__vars['readOnly']) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = array(array(
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'Учитывать все' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['userGroups'])) {
			foreach ($__vars['userGroups'] AS $__vars['userGroup']) {
				$__compilerTemp1[] = array(
					'value' => $__vars['userGroup']['user_group_id'],
					'label' => $__templater->escape($__vars['userGroup']['title']),
					'_type' => 'option',
				);
			}
		}
		$__finalCompiled .= $__templater->formSelectRow(array(
			'name' => 'criteria[user_group_id]',
			'value' => $__vars['criteria']['user_group_id'],
		), $__compilerTemp1, array(
			'label' => 'Основная группа пользователей',
		)) . '
';
	} else {
		$__finalCompiled .= '
	';
		$__compilerTemp2 = '';
		if ($__vars['userGroups'][$__vars['criteria_user_group_id']]['title']) {
			$__compilerTemp2 .= '
			' . $__templater->escape($__vars['userGroups'][$__vars['criteria_user_group_id']]['title']) . '
		';
		} else {
			$__compilerTemp2 .= '
			' . $__vars['xf']['language']['parenthesis_open'] . 'Учитывать все' . $__vars['xf']['language']['parenthesis_close'] . '
		';
		}
		$__finalCompiled .= $__templater->formRow('

		' . $__compilerTemp2 . '
	', array(
			'label' => 'Основная группа пользователей',
		)) . '
	' . $__templater->formHiddenVal('criteria[user_group_id]', $__vars['criteria']['user_group_id'], array(
		)) . '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp3 = array();
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroup']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['userGroup']['user_group_id'],
				'label' => $__templater->escape($__vars['userGroup']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => 'criteria[no_secondary_group_ids]',
		'value' => $__vars['criteria']['no_secondary_group_ids'],
		'readonly' => $__vars['readOnly'],
	), array(array(
		'value' => '1',
		'label' => 'Не состоит в дополнительных группах',
		'_type' => 'option',
	),
	array(
		'value' => '0',
		'label' => 'Состоит в дополнительных группах',
		'_dependent' => array($__templater->formCheckBox(array(
		'name' => 'criteria[secondary_group_ids]',
		'value' => $__vars['criteria']['secondary_group_ids'],
		'listclass' => 'listColumns',
		'readonly' => $__vars['readOnly'],
	), $__compilerTemp3)),
		'_type' => 'option',
	)), array(
		'label' => 'Дополнительные группы пользователя',
	)) . '

';
	$__compilerTemp4 = array();
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroup']) {
			$__compilerTemp4[] = array(
				'value' => $__vars['userGroup']['user_group_id'],
				'label' => $__templater->escape($__vars['userGroup']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
		'name' => 'criteria[not_secondary_group_ids]',
		'value' => $__vars['criteria']['not_secondary_group_ids'],
		'listclass' => 'listColumns',
		'readonly' => $__vars['readOnly'],
	), $__compilerTemp4, array(
		'label' => 'Не в этих дополнительных группах',
	)) . '

<hr class="formRowSep" />

' . $__templater->formRow('

	<div class="inputGroup">
		' . $__templater->formDateInput(array(
		'name' => 'criteria[register_date][start]',
		'value' => $__vars['criteria']['register_date']['start'],
		'size' => '15',
		'readonly' => $__vars['readOnly'],
	)) . '
		<span class="inputGroup-text">-</span>
		' . $__templater->formDateInput(array(
		'name' => 'criteria[register_date][end]',
		'value' => $__vars['criteria']['register_date']['end'],
		'size' => '15',
		'readonly' => $__vars['readOnly'],
	)) . '
	</div>
', array(
		'rowtype' => 'input',
		'label' => 'Регистрация между',
	)) . '

' . $__templater->formRow('

	<div class="inputGroup">
		' . $__templater->formDateInput(array(
		'name' => 'criteria[last_activity][start]',
		'value' => $__vars['criteria']['last_activity']['start'],
		'size' => '15',
		'readonly' => $__vars['readOnly'],
	)) . '
		<span class="inputGroup-text">-</span>
		' . $__templater->formDateInput(array(
		'name' => 'criteria[last_activity][end]',
		'value' => $__vars['criteria']['last_activity']['end'],
		'size' => '15',
		'readonly' => $__vars['readOnly'],
	)) . '
	</div>
', array(
		'rowtype' => 'input',
		'label' => 'Последнее посещение между',
		'explain' => 'Посещения за последний час могут быть не учтены.',
	)) . '

' . $__templater->formRow('

	<div class="inputGroup">
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[message_count][start]',
		'value' => $__vars['criteria']['message_count']['start'],
		'min' => '0',
		'readonly' => $__vars['readOnly'],
	)) . '
		<span class="inputGroup-text">-</span>
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[message_count][end]',
		'value' => $__vars['criteria']['message_count']['end'],
		'min' => '-1',
		'readonly' => $__vars['readOnly'],
	)) . '
	</div>
', array(
		'rowtype' => 'input',
		'label' => 'Количество сообщений между',
		'explain' => 'Используйте -1, чтобы было без ограничений.',
	)) . '

' . $__templater->formRow('

	<div class="inputGroup">
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[question_solution_count][start]',
		'value' => $__vars['criteria']['question_solution_count']['start'],
		'min' => '0',
		'readonly' => $__vars['readOnly'],
	)) . '
		<span class="inputGroup-text">-</span>
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[question_solution_count][end]',
		'value' => $__vars['criteria']['question_solution_count']['end'],
		'min' => '-1',
		'readonly' => $__vars['readOnly'],
	)) . '
	</div>
', array(
		'rowtype' => 'input',
		'label' => 'Вопросы решены между',
		'explain' => 'Используйте -1, чтобы было без ограничений.',
	)) . '

' . $__templater->formRow('

	<div class="inputGroup">
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[trophy_points][start]',
		'value' => $__vars['criteria']['trophy_points']['start'],
		'min' => '0',
		'readonly' => $__vars['readOnly'],
	)) . '
		<span class="inputGroup-text">-</span>
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[trophy_points][end]',
		'value' => $__vars['criteria']['trophy_points']['end'],
		'min' => '-1',
		'readonly' => $__vars['readOnly'],
	)) . '
	</div>
', array(
		'rowtype' => 'input',
		'label' => 'Баллов за трофеи между',
		'explain' => 'Используйте -1, чтобы было без ограничений.',
	)) . '

' . $__templater->formRow('
	<div class="inputGroup">
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[reaction_score][start]',
		'value' => $__vars['criteria']['reaction_score']['start'],
		'readonly' => $__vars['readOnly'],
	)) . '
		<span class="inputGroup-text">-</span>
		' . $__templater->formNumberBox(array(
		'name' => 'criteria[reaction_score][end]',
		'value' => $__vars['criteria']['reaction_score']['end'],
		'readonly' => $__vars['readOnly'],
	)) . '
	</div>
', array(
		'rowtype' => 'input',
		'label' => 'Количество реакций между',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
		'name' => 'criteria[user_state]',
		'readonly' => $__vars['readOnly'],
	), array(array(
		'value' => 'valid',
		'selected' => $__templater->func('in_array', array('valid', $__vars['criteria']['user_state'], ), false),
		'label' => 'Активен',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm',
		'selected' => $__templater->func('in_array', array('email_confirm', $__vars['criteria']['user_state'], ), false),
		'label' => 'Ожидает подтверждения по электронной почте',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm_edit',
		'selected' => $__templater->func('in_array', array('email_confirm_edit', $__vars['criteria']['user_state'], ), false),
		'label' => 'Ожидает подтверждения по электронной почте (после редактирования)',
		'_type' => 'option',
	),
	array(
		'value' => 'email_bounce',
		'selected' => $__templater->func('in_array', array('email_bounce', $__vars['criteria']['user_state'], ), false),
		'label' => 'Электронная почта недействительна (bounced)',
		'_type' => 'option',
	),
	array(
		'value' => 'moderated',
		'selected' => $__templater->func('in_array', array('moderated', $__vars['criteria']['user_state'], ), false),
		'label' => 'Ожидает одобрения',
		'_type' => 'option',
	),
	array(
		'value' => 'rejected',
		'selected' => $__templater->func('in_array', array('rejected', $__vars['criteria']['user_state'], ), false),
		'label' => 'Отказано',
		'_type' => 'option',
	),
	array(
		'value' => 'disabled',
		'selected' => $__templater->func('in_array', array('disabled', $__vars['criteria']['user_state'], ), false),
		'label' => 'Отключено',
		'_type' => 'option',
	)), array(
		'label' => 'Состояние пользователя',
	)) . '

' . $__templater->formCheckBoxRow(array(
		'name' => 'criteria[security_lock]',
		'readonly' => $__vars['readOnly'],
	), array(array(
		'value' => 'none',
		'selected' => $__templater->func('in_array', array('none', $__vars['criteria']['security_lock'], ), false),
		'label' => 'Нет',
		'_type' => 'option',
	),
	array(
		'value' => 'change',
		'selected' => $__templater->func('in_array', array('change', $__vars['criteria']['security_lock'], ), false),
		'label' => 'Закрыто' . $__vars['xf']['language']['label_separator'] . ' ' . 'Пользователь должен изменить пароль',
		'_type' => 'option',
	),
	array(
		'value' => 'reset',
		'selected' => $__templater->func('in_array', array('reset', $__vars['criteria']['security_lock'], ), false),
		'label' => 'Закрыто' . $__vars['xf']['language']['label_separator'] . ' ' . 'Пользователь должен сбросить пароль',
		'_type' => 'option',
	)), array(
		'label' => 'Блокировка безопасности',
	)) . '

' . $__templater->formCheckBoxRow(array(
		'name' => 'criteria[is_banned]',
		'readonly' => $__vars['readOnly'],
	), array(array(
		'value' => '0',
		'selected' => $__templater->func('in_array', array(0, $__vars['criteria']['is_banned'], ), false),
		'label' => 'Не заблокирован',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => $__templater->func('in_array', array(1, $__vars['criteria']['is_banned'], ), false),
		'label' => 'Заблокирован',
		'_type' => 'option',
	)), array(
		'label' => 'Статус блокировки',
	)) . '

' . $__templater->formCheckBoxRow(array(
		'name' => 'criteria[Option][is_discouraged]',
		'readonly' => $__vars['readOnly'],
	), array(array(
		'value' => '0',
		'selected' => $__templater->func('in_array', array(0, $__vars['criteria']['Option']['is_discouraged'], ), false),
		'label' => 'Не является нежелательным пользователем',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => $__templater->func('in_array', array(1, $__vars['criteria']['Option']['is_discouraged'], ), false),
		'label' => 'Нежелательный',
		'_type' => 'option',
	)), array(
		'label' => 'Статус нежелательного пользователя',
	)) . '

' . $__templater->formCheckBoxRow(array(
		'name' => 'criteria[is_staff]',
		'readonly' => $__vars['readOnly'],
	), array(array(
		'value' => '0',
		'selected' => $__templater->func('in_array', array(0, $__vars['criteria']['is_staff'], ), false),
		'label' => 'Не член команды',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => $__templater->func('in_array', array(1, $__vars['criteria']['is_staff'], ), false),
		'label' => 'Команда форума',
		'_type' => 'option',
	)), array(
		'label' => 'Член команды',
	)) . '

' . $__templater->formCheckBoxRow(array(
		'name' => 'criteria[activity_summary]',
		'readonly' => $__vars['readOnly'],
	), array(array(
		'value' => '0',
		'selected' => $__templater->func('in_array', array(0, $__vars['criteria']['activity_summary'], ), false),
		'label' => 'Отправка сводка активности на email отключена',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => $__templater->func('in_array', array(1, $__vars['criteria']['activity_summary'], ), false),
		'label' => 'Отправка сводка активности на email включена',
		'_type' => 'option',
	)), array(
		'label' => 'Сводка активности на email',
	)) . '

';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
		';
	$__compilerTemp6 = $__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:UserField', )), 'getDisplayGroups', array());
	if ($__templater->isTraversable($__compilerTemp6)) {
		foreach ($__compilerTemp6 AS $__vars['fieldGroup'] => $__vars['phrase']) {
			$__compilerTemp5 .= '
			';
			$__vars['customFields'] = $__templater->method($__vars['xf']['app'], 'getCustomFields', array('users', $__vars['fieldGroup'], ));
			$__compilerTemp5 .= '
			';
			$__compilerTemp7 = '';
			$__compilerTemp7 .= '
					';
			if ($__templater->isTraversable($__vars['customFields'])) {
				foreach ($__vars['customFields'] AS $__vars['fieldId'] => $__vars['fieldDefinition']) {
					$__compilerTemp7 .= '
						';
					$__vars['choices'] = $__vars['fieldDefinition']['field_choices'];
					$__compilerTemp7 .= '
						';
					$__vars['fieldName'] = 'criteria[user_field]' . (($__vars['choices'] AND ($__vars['fieldDefinition']['type_group'] != 'multiple')) ? '[exact]' : '') . '[' . $__vars['fieldId'] . ']';
					$__compilerTemp7 .= '
						';
					$__compilerTemp8 = '';
					if (!$__vars['choices']) {
						$__compilerTemp8 .= '
								' . $__templater->formTextBox(array(
							'name' => $__vars['fieldName'],
							'value' => $__vars['criteria']['user_field'][$__vars['fieldId']],
							'readonly' => $__vars['readOnly'],
						)) . '
							';
					} else {
						$__compilerTemp8 .= '

								';
						$__compilerTemp9 = array();
						if ($__templater->isTraversable($__vars['choices'])) {
							foreach ($__vars['choices'] AS $__vars['val'] => $__vars['choice']) {
								$__compilerTemp9[] = array(
									'value' => (($__vars['fieldDefinition']['type_group'] == 'multiple') ? (((('s:' . $__templater->func('strlen', array($__vars['val'], ), false)) . ':"') . $__vars['val']) . '"') : $__vars['val']),
									'label' => $__templater->escape($__vars['choice']),
									'_type' => 'option',
								);
							}
						}
						$__compilerTemp8 .= $__templater->formCheckBox(array(
							'name' => $__vars['fieldName'],
							'value' => (($__vars['fieldDefinition']['type_group'] != 'multiple') ? $__vars['criteria']['user_field']['exact'][$__vars['fieldId']] : $__vars['criteria']['user_field'][$__vars['fieldId']]),
							'listclass' => 'listColumns',
							'readonly' => $__vars['readOnly'],
						), $__compilerTemp9) . '

							';
					}
					$__compilerTemp7 .= $__templater->formRow('

							' . $__compilerTemp8 . '

						', array(
						'rowtype' => ($__vars['choices'] ? '' : 'input'),
						'label' => $__templater->escape($__vars['fieldDefinition']['title']),
					)) . '
					';
				}
			}
			$__compilerTemp7 .= '
				';
			if (strlen(trim($__compilerTemp7)) > 0) {
				$__compilerTemp5 .= '
				' . $__compilerTemp7 . '
			';
			}
			$__compilerTemp5 .= '
		';
		}
	}
	$__compilerTemp5 .= '
	';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__finalCompiled .= '
	<hr class="formRowSep" />
	' . $__compilerTemp5 . '
';
	}
	return $__finalCompiled;
}
);