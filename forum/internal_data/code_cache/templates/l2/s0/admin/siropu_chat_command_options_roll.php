<?php
// FROM HASH: 50f79768cfda8ccbcbc3d1322bbf815f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formNumberBoxRow(array(
		'name' => 'command_options[default_dice_count]',
		'value' => ($__vars['command']['command_options']['default_dice_count'] ?: 1),
		'min' => '1',
	), array(
		'label' => 'Количество кубиков',
		'explain' => 'Укажите количество кубиков по умолчанию.',
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'command_options[default_dice_sides]',
		'value' => ($__vars['command']['command_options']['default_dice_sides'] ?: 6),
		'min' => '2',
	), array(
		'label' => 'Количество сторон кубика',
		'explain' => 'Укажите количество сторон кубика по умолчанию.',
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'command_options[max_dice_count]',
		'value' => ($__vars['command']['command_options']['max_dice_count'] ?: 1),
		'min' => '1',
	), array(
		'label' => 'Максимальное количество кубиков',
		'explain' => 'Максимальное количество кубиков, которые пользователь может бросить.',
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'command_options[max_dice_sides]',
		'value' => ($__vars['command']['command_options']['max_dice_sides'] ?: 6),
		'min' => '2',
	), array(
		'label' => 'Максимум количество сторон кубика',
		'explain' => 'Максимальное количество сторон кубика, которые пользователь может бросить.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'command_options[dice_sum]',
		'value' => '1',
		'label' => 'Sum the result of multiple dices',
		'checked' => ($__vars['command']['command_options']['dice_sum'] == 1),
		'_type' => 'option',
	)), array(
	));
	return $__finalCompiled;
}
);