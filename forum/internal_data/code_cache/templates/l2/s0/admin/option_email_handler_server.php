<?php
// FROM HASH: 5cf9284ce8ac9c534fd5a4808436410e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['option']['title']));
	$__finalCompiled .= '

';
	$__vars['values'] = (($__vars['type'] == $__vars['option']['option_value']['type']) ? $__vars['option']['option_value'] : array());
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->filter($__vars['type'], array(array('to_upper', array()),), true) . '
				' . $__templater->formHiddenVal('type', $__vars['type'], array(
	)) . '
			', array(
		'label' => 'Тип соединения',
	)) . '

			' . '' . '

			' . $__templater->formRow('
				<div class="inputGroup">
					' . $__templater->formTextBox(array(
		'name' => 'host',
		'value' => $__vars['values']['host'],
		'placeholder' => 'Хост',
		'size' => '40',
		'required' => 'required',
	)) . '
					<span class="inputGroup-text">:</span>
					' . $__templater->formTextBox(array(
		'name' => 'port',
		'value' => $__vars['values']['port'],
		'placeholder' => 'Порт',
		'size' => '5',
		'required' => 'required',
	)) . '
				</div>
			', array(
		'label' => 'Хост',
		'rowtype' => 'input',
	)) . '

			' . $__templater->formRow('
				<div class="inputGroup">
					' . $__templater->formTextBox(array(
		'name' => 'username',
		'value' => $__vars['values']['username'],
		'placeholder' => 'Имя пользователя',
		'size' => '15',
	)) . '
					<span class="inputGroup-splitter"></span>
					' . $__templater->formTextBox(array(
		'name' => 'password',
		'placeholder' => 'Пароль',
		'autocomplete' => 'new-password',
		'type' => 'password',
		'size' => '15',
	)) . '
				</div>
			', array(
		'label' => 'Имя пользователя и пароль',
		'rowtype' => 'input',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'encryption',
		'value' => ($__vars['values']['encryption'] ?: ''),
	), array(array(
		'value' => '',
		'label' => 'Нет',
		'_type' => 'option',
	),
	array(
		'value' => 'tls',
		'disabled' => (!$__templater->func('in_array', array('tls', $__vars['transports'], ), false)),
		'label' => 'TLS',
		'_type' => 'option',
	),
	array(
		'value' => 'ssl',
		'disabled' => (!$__templater->func('in_array', array('ssl', $__vars['transports'], ), false)),
		'label' => 'SSL',
		'_type' => 'option',
	)), array(
		'label' => 'Шифрование',
		'explain' => 'PHP-расширение <a href="https://www.php.net/manual/ru/book.openssl.php" target="_blank"><code>openssl</code></a> необходимо для использования TLS или SSL шифрования.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('options/email-handler-server', $__vars['option'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);