<?php
// FROM HASH: de96ab39a8226a6b16f011656c247f72
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[iconic]',
		'selected' => $__vars['options']['iconic'],
		'label' => 'Отображать только иконки',
		'_type' => 'option',
	)), array(
	));
	return $__finalCompiled;
}
);