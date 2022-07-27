<?php
// FROM HASH: b57cba9c4677fbe0a7e8450a59981939
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['action'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить действие за предупреждение');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать действие за предупреждение' . $__vars['xf']['language']['label_separator'] . ' ' . 'Баллы' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['action']['points']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['action'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('warnings/actions/delete', $__vars['action'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formNumberBoxRow(array(
		'name' => 'points',
		'value' => $__vars['action']['points'],
		'min' => '1',
	), array(
		'label' => 'Порог баллов',
		'explain' => 'Данное действие за предупреждение будет применено только если пользователь превысит порог баллов. Таким образом, к пользователям с таким же или более высоким числом баллов не будет применяться это действие до тех пор, пока их общее количество баллов не опустится ниже этого порога, а затем вновь его не превысит.',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'action',
		'value' => $__vars['action']['action'],
	), array(array(
		'value' => 'ban',
		'label' => 'Заблокировать',
		'_type' => 'option',
	),
	array(
		'value' => 'discourage',
		'label' => 'Добавить к нежелательным пользователям',
		'_type' => 'option',
	),
	array(
		'value' => 'groups',
		'label' => 'Добавить в выбранные группы',
		'_dependent' => array($__templater->formCheckBox(array(
		'name' => 'extra_user_group_ids',
		'value' => $__vars['action']['extra_user_group_ids'],
	), $__compilerTemp1)),
		'_type' => 'option',
	)), array(
		'label' => 'Принимаемые меры',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'action_length_type_base',
		'value' => $__vars['action']['action_length_type'],
	), array(array(
		'value' => 'points',
		'label' => 'Пока на уровне или выше порога баллов',
		'_type' => 'option',
	),
	array(
		'value' => 'permanent',
		'label' => 'Постоянно',
		'_type' => 'option',
	),
	array(
		'value' => 'temporary',
		'selected' => ($__vars['action']['action_length_type'] != 'permanent') AND ($__vars['action']['action_length_type'] != 'points'),
		'label' => 'Временно',
		'_dependent' => array('
						<div class="inputGroup">
							' . $__templater->formNumberBox(array(
		'name' => 'action_length',
		'value' => ($__vars['action']['action_length'] ?: 1),
		'min' => '1',
	)) . '
							<span class="inputGroup-splitter"></span>
							' . $__templater->formSelect(array(
		'name' => 'action_length_type',
		'value' => ((($__vars['action']['action_length_type'] == 'permanent') OR ($__vars['action']['action_length_type'] == 'points')) ? 'months' : $__vars['action']['action_length_type']),
		'class' => 'input--inline',
	), array(array(
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
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Период времени',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('warnings/actions/save', $__vars['action'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);