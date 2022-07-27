<?php
// FROM HASH: 14d7246b02a7324d71e53b871120cc5a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('

	' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'className' => $__vars['formPrefix'] . '[callback_class]',
		'methodName' => $__vars['formPrefix'] . '[callback_method]',
		'classValue' => $__vars['config']['callback']['0'],
		'methodValue' => $__vars['config']['callback']['1'],
	), $__vars) . '
', array(
		'rowtype' => 'input',
		'label' => 'Обработчик',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => $__vars['formPrefix'] . '[context]',
		'value' => $__vars['config']['context'],
	), array(
		'label' => 'Значение контекста',
		'explain' => 'Любое значение, которое Вы здесь введёте, будет передано Вашему обработчику, чтобы предоставить дополнительный контекст.',
	));
	return $__finalCompiled;
}
);