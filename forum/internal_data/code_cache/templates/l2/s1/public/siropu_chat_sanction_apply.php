<?php
// FROM HASH: e5cf26a42f2c078acdd46b2c36d995b8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['sanction'], 'isUpdate', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать наказание');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if (!$__templater->test($__vars['user'], 'empty', array())) {
			$__compilerTemp1 .= ': ' . $__templater->escape($__vars['user']['username']);
		}
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Наказание к пользователю' . $__compilerTemp1);
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp2 = '';
	if (!$__templater->test($__vars['user'], 'empty', array())) {
		$__compilerTemp2 .= '
				' . $__templater->formHiddenVal('user_id', $__vars['user']['user_id'], array(
		)) . '
			';
	} else if ($__templater->method($__vars['sanction'], 'isInsert', array())) {
		$__compilerTemp2 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'value' => $__vars['user']['username'],
			'data-xf-init' => 'auto-complete',
			'required' => 'required',
		), array(
			'label' => 'Пользователь',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__templater->method($__vars['sanction'], 'isInsert', array())) {
		$__compilerTemp3 .= '
				';
		$__compilerTemp4 = array();
		if ($__templater->isTraversable($__vars['rooms'])) {
			foreach ($__vars['rooms'] AS $__vars['room']) {
				$__compilerTemp4[] = array(
					'value' => $__vars['room']['room_id'],
					'label' => $__templater->escape($__vars['room']['room_name']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp3 .= $__templater->formRadioRow(array(
			'name' => 'method',
			'value' => ($__vars['roomId'] ? 'room' : 'chat'),
		), array(array(
			'value' => 'chat',
			'label' => 'Все комнаты',
			'_type' => 'option',
		),
		array(
			'value' => 'room',
			'label' => 'Выбранные комнаты',
			'_dependent' => array('
							' . $__templater->formSelect(array(
			'name' => 'room_id',
			'value' => $__vars['roomId'],
			'multiple' => 'true',
		), $__compilerTemp4) . '
						'),
			'_type' => 'option',
		)), array(
			'label' => 'Применить наказание к',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp2 . '
			' . $__templater->formSelectRow(array(
		'name' => 'sanction_type',
		'value' => ($__vars['sanction']['sanction_type'] ?: 'ban'),
		'class' => 'input--autoSize',
	), array(array(
		'value' => 'ban',
		'label' => 'Блокировка',
		'_type' => 'option',
	),
	array(
		'value' => 'kick',
		'label' => 'Выгнать',
		'_type' => 'option',
	),
	array(
		'value' => 'mute',
		'label' => 'Запрет писать сообщения',
		'_type' => 'option',
	)), array(
		'label' => 'Тип наказания',
	)) . '
			' . $__compilerTemp3 . '
			' . $__templater->formRadioRow(array(
		'name' => 'length_type',
		'value' => (($__vars['sanction']['sanction_end'] == 0) ? 'perm' : 'temp'),
	), array(array(
		'value' => 'perm',
		'label' => 'Постоянно',
		'_type' => 'option',
	),
	array(
		'value' => 'temp',
		'label' => 'Временно',
		'_dependent' => array('
							<div class="inputGroup" style="margin-bottom: 5px;">
								' . $__templater->formNumberBox(array(
		'name' => 'length_value',
		'min' => '1',
	)) . '
								' . $__templater->formSelect(array(
		'name' => 'length_option',
		'class' => 'input--autoSize',
		'style' => 'margin-left: 5px;',
	), array(array(
		'value' => 'hours',
		'label' => 'Часов',
		'_type' => 'option',
	),
	array(
		'value' => 'days',
		'label' => 'Дней',
		'_type' => 'option',
	),
	array(
		'value' => 'weeks',
		'label' => 'Недель',
		'_type' => 'option',
	),
	array(
		'value' => 'months',
		'label' => 'Месяцев',
		'_type' => 'option',
	),
	array(
		'value' => 'years',
		'label' => 'Лет',
		'_type' => 'option',
	))) . '
							</div>
							' . $__templater->formDateInput(array(
		'name' => 'length_date',
		'placeholder' => 'До' . $__vars['xf']['language']['ellipsis'],
	)) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Продолжительность наказания',
	)) . '
			' . $__templater->formTextBoxRow(array(
		'name' => 'reason',
		'value' => $__vars['sanction']['sanction_reason'],
	), array(
		'label' => 'Причина наказания',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Применить наказание',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/sanction/apply', $__vars['sanction'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);