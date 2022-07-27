<?php
// FROM HASH: 2b69dbc6ba9734ee5b01e2df1d7e378b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Изменить тип раздела' . ': ' . $__templater->escape($__vars['node']['title']));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['newForumTypeId']) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					' . $__templater->escape($__vars['newForumTypeTitle']) . '
				', array(
			'label' => 'Новый тип раздела',
			'explain' => $__templater->escape($__vars['newForumTypeDesc']),
		)) . '
				';
		if ($__vars['typeConfigTemplate']) {
			$__compilerTemp1 .= '
					' . $__templater->includeTemplate($__vars['typeConfigTemplate'], $__vars) . '
				';
		}
		$__compilerTemp1 .= '
				' . $__templater->formHiddenVal('new_forum_type_id', $__vars['newForumTypeId'], array(
		)) . '
				' . $__templater->formHiddenVal('confirm', '1', array(
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = array();
		if ($__templater->isTraversable($__vars['forumTypesInfo'])) {
			foreach ($__vars['forumTypesInfo'] AS $__vars['forumTypeId'] => $__vars['forumTypeInfo']) {
				$__compilerTemp2[] = array(
					'value' => $__vars['forumTypeId'],
					'label' => $__templater->escape($__vars['forumTypeInfo']['title']),
					'hint' => $__templater->escape($__vars['forumTypeInfo']['description']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1 .= $__templater->formRadioRow(array(
			'name' => 'new_forum_type_id',
			'value' => $__vars['currentForumTypeId'],
		), $__compilerTemp2, array(
			'label' => 'Новый тип раздела',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['newForumTypeId']) {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Изменить тип',
		), array(
		)) . '
		';
	} else {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Продолжить' . $__vars['xf']['language']['ellipsis'],
		), array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				<div class="blockMessage blockMessage--warning">
					' . 'Изменение типа раздела приведет к изменению типа всех тем внутри раздела на тип, разрешенный для этого раздела. Это может привести к потере некоторых данных. Пожалуйста, убедитесь, что Вы выбрали правильные настройки, прежде чем продолжить.' . '
				</div>
			', array(
	)) . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['currentForumTypeTitle']) . '
			', array(
		'label' => 'Текущий тип раздела',
		'explain' => $__templater->escape($__vars['currentForumTypeDesc']),
	)) . '

			' . $__compilerTemp1 . '
		</div>
		' . $__compilerTemp3 . '
	</div>
', array(
		'action' => $__templater->func('link', array('forums/change-type', $__vars['node'], ), false),
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);