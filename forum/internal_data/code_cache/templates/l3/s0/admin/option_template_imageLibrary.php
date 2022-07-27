<?php
// FROM HASH: 49607d33807255a1fa5b18c208726076
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => $__vars['inputName'],
		'value' => $__vars['option']['option_value'],
	), array(array(
		'value' => 'gd',
		'label' => 'Библиотека GD, встроенная в PHP',
		'_type' => 'option',
	),
	array(
		'value' => 'imPecl',
		'disabled' => ($__vars['noImagick'] ? 'disabled' : false),
		'label' => 'PECL-расширение ImageMagick',
		'hint' => 'У Вас должно быть установлено расширение <a href="' . 'https://pecl.php.net/package/imagick' . '" target="_blank">imagick PECL</a>.',
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);