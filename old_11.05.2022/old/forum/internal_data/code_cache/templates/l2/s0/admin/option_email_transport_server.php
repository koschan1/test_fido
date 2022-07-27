<?php
// FROM HASH: 1b3d7879c9562da9c9d4a8118924e133
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['option']['title']));
	$__finalCompiled .= '

';
	$__vars['values'] = (($__vars['type'] == $__vars['option']['option_value']['emailTransport']) ? $__vars['option']['option_value'] : array());
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->filter($__vars['type'], array(array('to_upper', array()),), true) . '
				' . $__templater->formHiddenVal('emailTransport', $__vars['type'], array(
	)) . '
			', array(
		'label' => 'Тип соединения',
	)) . '

			' . '' . '

			' . $__templater->formRow('
				<div class="inputGroup">
					' . $__templater->formTextBox(array(
		'name' => 'smtpHost',
		'value' => $__vars['values']['smtpHost'],
		'placeholder' => 'Хост',
		'size' => '40',
		'required' => 'required',
	)) . '
					<span class="inputGroup-text">:</span>
					' . $__templater->formTextBox(array(
		'name' => 'smtpPort',
		'value' => $__vars['values']['smtpPort'],
		'placeholder' => 'Порт',
		'size' => '5',
		'required' => 'required',
	)) . '
				</div>
			', array(
		'label' => 'Хост',
		'rowtype' => 'input',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'smtpAuth',
		'value' => ($__vars['values']['smtpAuth'] ?: 'none'),
	), array(array(
		'value' => 'none',
		'label' => 'Нет',
		'_type' => 'option',
	),
	array(
		'value' => 'login',
		'label' => 'Имя пользователя и пароль',
		'_dependent' => array('
						<div class="inputGroup">
							' . $__templater->formTextBox(array(
		'name' => 'smtpLoginUsername',
		'value' => $__vars['values']['smtpLoginUsername'],
		'placeholder' => 'Имя пользователя',
		'size' => '15',
	)) . '
							<span class="inputGroup-splitter"></span>
							' . $__templater->formTextBox(array(
		'name' => 'smtpLoginPassword',
		'placeholder' => 'Пароль',
		'type' => 'password',
		'size' => '15',
	)) . '
						</div>
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Аутентификация',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'smtpEncrypt',
		'value' => ($__vars['values']['smtpEncrypt'] ?: 'none'),
	), array(array(
		'value' => 'none',
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
		'action' => $__templater->func('link', array('options/email-transport-server', $__vars['option'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);