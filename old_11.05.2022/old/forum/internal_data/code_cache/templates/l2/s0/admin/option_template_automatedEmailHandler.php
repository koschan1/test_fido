<?php
// FROM HASH: 7c878318db0c350db441b4b7dae01379
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['inputName'] . '[enabled]',
		'value' => '1',
		'selected' => $__vars['option']['option_value']['enabled'],
		'label' => 'Включить автоматическую обработку',
		'data-hide' => 'true',
		'_dependent' => array('
			<div class="inputChoices-spacer">' . 'Тип соединения' . '</div>
			' . $__templater->formRadio(array(
		'name' => $__vars['inputName'] . '[type]',
		'value' => ($__vars['option']['option_value']['type'] ? $__vars['option']['option_value']['type'] : 'pop3'),
	), array(array(
		'value' => 'pop3',
		'label' => 'POP3',
		'_type' => 'option',
	),
	array(
		'value' => 'imap',
		'label' => 'IMAP',
		'_type' => 'option',
	))) . '

			<div class="inputChoices-spacer">' . 'Хост' . '</div>
			<div class="inputGroup">
				' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[host]',
		'value' => $__vars['option']['option_value']['host'],
		'placeholder' => 'Хост',
		'size' => '40',
		'id' => $__vars['inputName'] . '_host',
	)) . '
				<span class="inputGroup-text">:</span>
				' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[port]',
		'value' => $__vars['option']['option_value']['port'],
		'placeholder' => 'Порт',
		'size' => '5',
	)) . '
			</div>

			<div class="inputChoices-spacer">' . 'Имя пользователя и пароль' . '</div>
			<div class="inputGroup">
				' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[username]',
		'value' => $__vars['option']['option_value']['username'],
		'placeholder' => 'Имя пользователя',
		'size' => '15',
		'id' => $__vars['inputName'] . '_username',
	)) . '
				<span class="inputGroup-splitter"></span>
				' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[password]',
		'value' => $__vars['option']['option_value']['password'],
		'type' => 'password',
		'size' => '15',
	)) . '
			</div>

			<div class="inputChoices-spacer">' . 'Шифрование' . '</div>
			' . $__templater->formRadio(array(
		'name' => $__vars['inputName'] . '[encryption]',
		'value' => ($__vars['option']['option_value']['encryption'] ? $__vars['option']['option_value']['encryption'] : ''),
	), array(array(
		'label' => 'Нет',
		'_type' => 'option',
	),
	array(
		'value' => 'tls',
		'label' => 'TLS',
		'_type' => 'option',
	),
	array(
		'value' => 'ssl',
		'label' => 'SSL',
		'_type' => 'option',
	))) . '
		'),
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