<?php
// FROM HASH: 7f6667d432e31398d4000127b6148de6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[search]',
		'value' => $__vars['options']['search'],
		'min' => '0',
	), array(
		'label' => 'Включить поиск',
		'explain' => 'Включить поиск, если есть больше чем Х результатов.',
	));
	return $__finalCompiled;
}
);