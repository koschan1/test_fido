<?php
// FROM HASH: 938eb80c602758e5844b4b717efb9c36
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['formBaseKey'] . '[register_date]',
		'selected' => $__vars['property']['property_value']['register_date'],
		'label' => '
		' . 'Дата регистрации' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[message_count]',
		'selected' => $__vars['property']['property_value']['message_count'],
		'label' => '
		' . 'Всего сообщений' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[solutions]',
		'selected' => $__vars['property']['property_value']['solutions'],
		'label' => '
		' . 'Решения' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[reaction_score]',
		'selected' => $__vars['property']['property_value']['reaction_score'],
		'label' => '
		' . 'Реакции' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[trophy_points]',
		'selected' => $__vars['property']['property_value']['trophy_points'],
		'label' => '
		' . 'Баллы' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[age]',
		'selected' => $__vars['property']['property_value']['age'],
		'label' => '
		' . 'Возраст' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[location]',
		'selected' => $__vars['property']['property_value']['location'],
		'label' => '
		' . 'Местоположение' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[website]',
		'selected' => $__vars['property']['property_value']['website'],
		'label' => '
		' . 'Сайт' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[custom_fields]',
		'selected' => $__vars['property']['property_value']['custom_fields'],
		'label' => '
		' . 'Дополнительные поля' . '
	',
		'_type' => 'option',
	)), array(
		'rowclass' => $__vars['rowClass'],
		'label' => $__templater->escape($__vars['titleHtml']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['property']['description']),
	));
	return $__finalCompiled;
}
);