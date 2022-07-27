<?php
// FROM HASH: 85a91335c18a9004ca804112f1046d09
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['inputName'] . '[enabled]',
		'selected' => $__vars['option']['option_value']['enabled'],
		'label' => 'Включить регистрацию',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[emailConfirmation]',
		'selected' => $__vars['option']['option_value']['emailConfirmation'],
		'label' => 'Включить подтверждение по электронной почте',
		'hint' => 'Если включено, пользователям нужно будет перейти по ссылке в электронном письме для завершения регистрации.',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[moderation]',
		'selected' => $__vars['option']['option_value']['moderation'],
		'label' => 'Включить ручную проверку',
		'hint' => 'Если включено, администратору придётся вручную проверять новых пользователей для завершения их регистрации.',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[requireDob]',
		'selected' => $__vars['option']['option_value']['requireDob'],
		'label' => 'Требовать дату рождения',
		'_type' => 'option',
	),
	array(
		'selected' => ($__vars['option']['option_value']['minimumAge'] ? true : false),
		'label' => 'Минимальный возраст' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formNumberBox(array(
		'name' => $__vars['inputName'] . '[minimumAge]',
		'value' => ($__vars['option']['option_value']['minimumAge'] ?: 13),
		'min' => '1',
		'units' => 'Лет',
	))),
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[requireEmailChoice]',
		'selected' => $__vars['option']['option_value']['requireEmailChoice'],
		'label' => 'Требовать выбор настроек рассылки электронной почты',
		'hint' => 'Если выбрано, то пользователи должны будут выбрать при регистрации, получать или не получать электронные письма с сайта. Значение по умолчанию зависит от <code>registrationDefaults</code>, и пользователи смогут позже менять свои настройки.',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[requireLocation]',
		'selected' => $__vars['option']['option_value']['requireLocation'],
		'label' => 'Требовать адрес местоположения',
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