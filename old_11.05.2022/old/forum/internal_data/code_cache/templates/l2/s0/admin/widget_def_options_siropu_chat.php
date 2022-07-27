<?php
// FROM HASH: 897e594e2c1a8e3e32860a3f7ef2a976
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[message_display_limit]',
		'value' => $__vars['options']['message_display_limit'],
		'min' => '1',
	), array(
		'label' => 'Ограничение отображения сообщений',
		'explain' => 'Установите количество сообщений, которые будут отображаться в чате во время загрузки чата.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[device][desktop]',
		'selected' => $__vars['options']['device']['desktop'],
		'label' => 'Компьютер',
		'_type' => 'option',
	),
	array(
		'name' => 'options[device][tablet]',
		'selected' => $__vars['options']['device']['tablet'],
		'label' => 'Планшет',
		'_type' => 'option',
	),
	array(
		'name' => 'options[device][mobile]',
		'selected' => $__vars['options']['device']['mobile'],
		'label' => 'Смартфон',
		'_type' => 'option',
	)), array(
		'label' => 'Устройства',
		'explain' => 'Выберите устройства, на которых будет отображаться чат.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[days][0]',
		'selected' => $__vars['options']['days']['0'],
		'label' => 'Воскресенье',
		'_type' => 'option',
	),
	array(
		'name' => 'options[days][1]',
		'selected' => $__vars['options']['days']['1'],
		'label' => 'Понедельник',
		'_type' => 'option',
	),
	array(
		'name' => 'options[days][2]',
		'selected' => $__vars['options']['days']['2'],
		'label' => 'Вторник',
		'_type' => 'option',
	),
	array(
		'name' => 'options[days][3]',
		'selected' => $__vars['options']['days']['3'],
		'label' => 'Среда',
		'_type' => 'option',
	),
	array(
		'name' => 'options[days][4]',
		'selected' => $__vars['options']['days']['4'],
		'label' => 'Четверг',
		'_type' => 'option',
	),
	array(
		'name' => 'options[days][5]',
		'selected' => $__vars['options']['days']['5'],
		'label' => 'Пятница',
		'_type' => 'option',
	),
	array(
		'name' => 'options[days][6]',
		'selected' => $__vars['options']['days']['6'],
		'label' => 'Суббота',
		'_type' => 'option',
	)), array(
		'label' => 'Включить чат в выбранные дни',
		'explain' => 'Этот параметр позволяет включить чат в определенные дни.',
	)) . '

' . $__templater->formSelectRow(array(
		'name' => 'options[hours]',
		'value' => $__templater->filter($__vars['options']['hours'], array(array('raw', array()),), false),
		'multiple' => 'true',
		'size' => '8',
		'style' => 'width: 200px',
	), array(array(
		'value' => '0',
		'label' => '0 ' . $__vars['xf']['language']['parenthesis_open'] . 'Полночь' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'label' => '1',
		'_type' => 'option',
	),
	array(
		'value' => '2',
		'label' => '2',
		'_type' => 'option',
	),
	array(
		'value' => '3',
		'label' => '3',
		'_type' => 'option',
	),
	array(
		'value' => '4',
		'label' => '4',
		'_type' => 'option',
	),
	array(
		'value' => '5',
		'label' => '5',
		'_type' => 'option',
	),
	array(
		'value' => '6',
		'label' => '6',
		'_type' => 'option',
	),
	array(
		'value' => '7',
		'label' => '7',
		'_type' => 'option',
	),
	array(
		'value' => '8',
		'label' => '8',
		'_type' => 'option',
	),
	array(
		'value' => '9',
		'label' => '9',
		'_type' => 'option',
	),
	array(
		'value' => '10',
		'label' => '10',
		'_type' => 'option',
	),
	array(
		'value' => '11',
		'label' => '11',
		'_type' => 'option',
	),
	array(
		'value' => '12',
		'label' => '12 ' . $__vars['xf']['language']['parenthesis_open'] . 'Полдень' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	),
	array(
		'value' => '13',
		'label' => '13',
		'_type' => 'option',
	),
	array(
		'value' => '14',
		'label' => '14',
		'_type' => 'option',
	),
	array(
		'value' => '15',
		'label' => '15',
		'_type' => 'option',
	),
	array(
		'value' => '16',
		'label' => '16',
		'_type' => 'option',
	),
	array(
		'value' => '17',
		'label' => '17',
		'_type' => 'option',
	),
	array(
		'value' => '18',
		'label' => '18',
		'_type' => 'option',
	),
	array(
		'value' => '19',
		'label' => '19',
		'_type' => 'option',
	),
	array(
		'value' => '20',
		'label' => '20',
		'_type' => 'option',
	),
	array(
		'value' => '21',
		'label' => '21',
		'_type' => 'option',
	),
	array(
		'value' => '22',
		'label' => '22',
		'_type' => 'option',
	),
	array(
		'value' => '23',
		'label' => '23',
		'_type' => 'option',
	)), array(
		'label' => 'Включить чат в указаное время',
		'explain' => 'Эта опция позволяет включить чат в определенное время.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[message]',
		'value' => $__vars['options']['message'],
	), array(
		'label' => 'Сообщение чата, когда он не доступен',
		'explain' => 'Включение этой опции позволит отобразить сообщение, когда чат недоступен.',
	));
	return $__finalCompiled;
}
);