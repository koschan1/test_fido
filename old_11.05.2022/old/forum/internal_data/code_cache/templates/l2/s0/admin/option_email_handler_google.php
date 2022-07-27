<?php
// FROM HASH: 3b6ad8c677bd605f97eff5a328868403
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['option']['title']));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Вам нужно будет перейти в <a href="https://developers.google.com/console" target="_blank">консоль разработчика Google</a> и настроить новый проект с учетными данными OAuth 2.0 для веб-приложения. Если Вы используете G Suite, рекомендуется создать приложение с внутренним типом пользователя, чтобы избежать длительного процесса проверки. Во всех случаях Вам нужно будет убедиться, что учетные данные поддерживают перенаправление на следующий URL-адрес' . $__vars['xf']['language']['label_separator'] . '
				<div><code>' . $__templater->escape($__vars['redirectUri']) . '</code></div>
			', array(
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'client_id',
		'value' => $__vars['option']['option_value']['oauth']['client_id'],
		'required' => 'required',
	), array(
		'label' => 'ID клиента (Client ID)',
		'explain' => 'Вы можете получить ID клиента через <a href="https://developers.google.com/console" target="_blank">консоль разработчика Google</a>',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'client_secret',
		'required' => 'required',
	), array(
		'label' => 'Секретная фраза (Client secret)',
		'explain' => 'Секрет, соответствующий указанному выше ID клиента Google.',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'type',
		'value' => ($__vars['option']['option_value']['type'] ?: 'pop3'),
	), array(array(
		'value' => 'pop3',
		'label' => 'POP3',
		'_type' => 'option',
	),
	array(
		'value' => 'imap',
		'label' => 'IMAP',
		'_type' => 'option',
	)), array(
		'label' => 'Тип соединения',
	)) . '

			' . $__templater->formInfoRow('
				' . 'Если продолжить, Вы будете перенаправлены в Google для подтверждения учетной записи, с помощью которой хотите подключиться.' . '
			', array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'submit' => 'Продолжить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('options/email-handler-oauth', $__vars['option'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);