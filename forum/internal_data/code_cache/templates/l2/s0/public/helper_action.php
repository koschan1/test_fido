<?php
// FROM HASH: 14ed92df14b43da25d62aaa5c6fb51ed
return array(
'macros' => array('edit_type' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'canEditSilently' => false,
		'silentName' => 'silent',
		'clearEditName' => 'clear_edit',
		'silentEdit' => false,
		'clearEdit' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['canEditSilently']) {
		$__finalCompiled .= '
		' . $__templater->formCheckBox(array(
		), array(array(
			'name' => $__vars['silentName'],
			'checked' => $__vars['silentEdit'],
			'label' => 'Редактировать скрыто',
			'hint' => 'Если включено, примечание "Последнее редактирование" не будет добавлено к сообщению.',
			'_dependent' => array($__templater->formCheckBox(array(
		), array(array(
			'name' => $__vars['clearEditName'],
			'checked' => $__vars['clearEdit'],
			'label' => 'Очистить информацию о последнем редактировании',
			'hint' => 'Если включено, любое имеющееся примечание "Последнее редактирование" будет удалено.',
			'_type' => 'option',
		)))),
			'_type' => 'option',
		))) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'delete_type' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'canHardDelete' => false,
		'typeName' => 'hard_delete',
		'reasonName' => 'reason',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['canHardDelete']) {
		$__finalCompiled .= '
		' . $__templater->formRadioRow(array(
			'name' => $__vars['typeName'],
			'value' => '0',
		), array(array(
			'value' => '0',
			'label' => 'Скрыть от публичного просмотра',
			'_dependent' => array($__templater->formTextBox(array(
			'name' => $__vars['reasonName'],
			'placeholder' => 'Причина' . $__vars['xf']['language']['ellipsis'],
			'maxlength' => $__templater->func('max_length', array('XF:DeletionLog', 'delete_reason', ), false),
		))),
			'_type' => 'option',
		),
		array(
			'value' => '1',
			'label' => 'Удалить физически',
			'hint' => 'Выбор этого параметра приведёт к удалению элемента окончательно и без возможности восстановления.',
			'_type' => 'option',
		)), array(
			'label' => 'Тип удаления',
		)) . '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->formTextBoxRow(array(
			'name' => $__vars['reasonName'],
			'maxlength' => $__templater->func('max_length', array('XF:DeletionLog', 'delete_reason', ), false),
		), array(
			'label' => 'Причина удаления',
		)) . '

		' . $__templater->formHiddenVal($__vars['typeName'], '0', array(
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'author_alert' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'selected' => false,
		'alertName' => 'author_alert',
		'reasonName' => 'author_alert_reason',
		'row' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__vars['checkbox'] = $__templater->preEscaped('
		' . $__templater->formCheckBox(array(
	), array(array(
		'name' => $__vars['alertName'],
		'selected' => $__vars['selected'],
		'label' => 'Оповестить автора об этом действии.' . ' ' . 'Причина' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => $__vars['reasonName'],
		'placeholder' => 'Не обязательно',
	))),
		'afterhint' => 'Обратите внимание, что автор увидит это оповещение, даже если он больше не может видеть своё сообщение.',
		'_type' => 'option',
	))) . '
	');
	$__finalCompiled .= '
	';
	if ($__vars['row']) {
		$__finalCompiled .= '
		' . $__templater->formRow('
			' . $__templater->filter($__vars['checkbox'], array(array('raw', array()),), true) . '
		', array(
		)) . '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->filter($__vars['checkbox'], array(array('raw', array()),), true) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'thread_alert' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'selected' => false,
		'alertName' => 'starter_alert',
		'reasonName' => 'starter_alert_reason',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['alertName'],
		'selected' => $__vars['selected'],
		'label' => 'Оповестить автора темы об этом действии.' . ' ' . 'Причина' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => $__vars['reasonName'],
		'placeholder' => 'Не обязательно',
	))),
		'afterhint' => 'Обратите внимание, что автор темы увидит это оповещение, даже если он больше не может видеть свою тему.',
		'_type' => 'option',
	)), array(
	)) . '
';
	return $__finalCompiled;
}
),
'thread_redirect' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'label' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formRadioRow(array(
		'name' => 'redirect_type',
		'value' => 'none',
	), array(array(
		'value' => 'none',
		'label' => 'Без перенаправления',
		'_type' => 'option',
	),
	array(
		'value' => 'permanent',
		'label' => 'Постоянное перенаправление',
		'_type' => 'option',
	),
	array(
		'value' => 'temporary',
		'label' => 'Временное перенаправление сроком на' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
				<div class="inputGroup">
					' . $__templater->formNumberBox(array(
		'name' => 'redirect_length[amount]',
		'value' => '1',
		'min' => '0',
	)) . '
					<span class="inputGroup-splitter"></span>
					' . $__templater->formSelect(array(
		'name' => 'redirect_length[unit]',
		'value' => 'days',
		'class' => 'input--inline',
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
	))) . '
				</div>
			'),
		'_type' => 'option',
	)), array(
		'label' => 'Параметры перенаправления',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);