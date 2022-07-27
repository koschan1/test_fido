<?php
// FROM HASH: a43b997f074a3e3645cda3a93eeed7fd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Повышение прав пользователя вручную');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
	), array(
		'label' => 'Имя пользователя',
	)) . '

			' . $__templater->formRow($__templater->escape($__vars['upgrade']['title']), array(
		'label' => 'Обновить для применения',
	)) . '

			' . '

			' . $__templater->formRadioRow(array(
		'name' => 'end_type',
	), array(array(
		'value' => 'permanent',
		'selected' => !$__vars['endDate'],
		'label' => 'Постоянно',
		'_type' => 'option',
	),
	array(
		'value' => 'date',
		'selected' => $__vars['endDate'],
		'label' => 'Дата' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formDateInput(array(
		'name' => 'end_date',
		'value' => ($__vars['endDate'] ? $__templater->func('date', array($__vars['endDate'], 'picker', ), false) : $__templater->func('date', array($__vars['xf']['time'], 'picker', ), false)),
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Повышение истекает',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Обновление',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('user-upgrades/manual', $__vars['upgrade'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);