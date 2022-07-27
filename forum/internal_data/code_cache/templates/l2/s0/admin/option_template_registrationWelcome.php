<?php
// FROM HASH: a3cde8155e93090ef7b2d0af9d1c3d7a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__vars['option']['option_value']['messageParticipants'] AND $__templater->func('is_array', array($__vars['option']['option_value']['messageParticipants'], ), false)) {
		$__compilerTemp1 .= '
				';
		$__vars['users'] = $__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:User', )), 'getUsersByIdsOrdered', array($__vars['option']['option_value']['messageParticipants'], ));
		$__compilerTemp1 .= '
				';
		$__vars['value'] = $__templater->filter($__templater->method($__vars['users'], 'pluckNamed', array('username', )), array(array('join', array(', ', )),), false);
		$__compilerTemp1 .= '
			';
	} else {
		$__compilerTemp1 .= '
				';
		$__vars['value'] = $__templater->preEscaped($__templater->escape($__vars['xf']['visitor']['username']));
		$__compilerTemp1 .= '
			';
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['inputName'] . '[messageEnabled]',
		'selected' => $__vars['option']['option_value']['messageEnabled'],
		'data-hide' => 'true',
		'label' => 'Создавать личную переписку с приветствием после регистрации',
		'_dependent' => array('
			<div>' . 'Остальные участники' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__compilerTemp1 . '
			' . $__templater->formTokenInput(array(
		'name' => $__vars['inputName'] . '[messageParticipants]',
		'value' => $__vars['value'],
		'href' => $__templater->func('link', array('users/find', ), false),
	)) . '
		', '
			<div>' . 'Заголовок переписки' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[messageTitle]',
		'value' => $__vars['option']['option_value']['messageTitle'],
		'placeholder' => 'Заголовок переписки' . $__vars['xf']['language']['ellipsis'],
		'maxlength' => '100',
	)) . '
		', '
			<div>' . 'Сообщение в переписке' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextArea(array(
		'name' => $__vars['inputName'] . '[messageBody]',
		'value' => $__vars['option']['option_value']['messageBody'],
		'rows' => '5',
		'autosize' => 'true',
	)) . '
			<p class="formRow-explain">' . 'В тексте письма будут заменены следующие макросы: {name}, {email}, {id}.' . ' ' . 'Также можно использовать шаблон {phrase:имя_фразы}, в котором фраза будет заменена языком, выбранным у получателя.' . '</p>
		', '
			<div>' . 'Настройки личной переписки' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formCheckBox(array(
	), array(array(
		'name' => $__vars['inputName'] . '[messageOpenInvite]',
		'value' => '1',
		'selected' => $__vars['option']['option_value']['messageOpenInvite'],
		'label' => '
					' . 'Разрешить участникам приглашать в переписку других пользователей' . '
				',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[messageLocked]',
		'value' => '1',
		'selected' => $__vars['option']['option_value']['messageLocked'],
		'label' => '
					' . 'Закрыть переписку (нельзя будет больше отвечать)' . '
				',
		'_type' => 'option',
	))) . '
		', '
			<div>' . 'Обработка новых ответов' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formRadio(array(
		'name' => $__vars['inputName'] . '[messageDelete]',
	), array(array(
		'value' => 'delete',
		'selected' => (!$__vars['option']['option_value']['messageDelete']) OR ($__vars['option']['option_value']['messageDelete'] == 'delete'),
		'label' => 'Покинуть переписку, но получать новые сообщения',
		'explain' => 'Если появятся новые ответы, то переписка будет восстановлена у Вас во входящих.',
		'_type' => 'option',
	),
	array(
		'value' => 'delete_ignore',
		'selected' => $__vars['option']['option_value']['messageDelete'] == 'delete_ignore',
		'label' => 'Покинуть переписку и игнорировать новые сообщения',
		'explain' => 'Вы не будете получать уведомления о новых ответах, а переписка будет оставаться удалённой.',
		'_type' => 'option',
	),
	array(
		'value' => 'no_delete',
		'selected' => $__vars['option']['option_value']['messageDelete'] == 'no_delete',
		'label' => 'Не покидать переписку',
		'explain' => 'Переписка останется у Вас во входящих и Вы будете получать уведомления об ответах.',
		'_type' => 'option',
	))) . '
		'),
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[emailEnabled]',
		'selected' => $__vars['option']['option_value']['emailEnabled'],
		'data-hide' => 'true',
		'label' => 'Отправлять электронное письмо с приветствием после регистрации',
		'_dependent' => array('
			<div>' . 'Имя отправителя' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[emailFromName]',
		'value' => ($__vars['option']['option_value']['emailFromName'] ? $__vars['option']['option_value']['emailFromName'] : $__vars['xf']['options']['boardTitle']),
	)) . '
		', '
			<div>' . 'Адрес отправителя' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[emailFromEmail]',
		'value' => ($__vars['option']['option_value']['emailFromEmail'] ? $__vars['option']['option_value']['emailFromEmail'] : $__vars['xf']['options']['defaultEmailAddress']),
		'type' => 'email',
	)) . '
		', '
			<div>' . 'Тема электронного письма' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[emailTitle]',
		'value' => $__vars['option']['option_value']['emailTitle'],
	)) . '
		', '
			<div>' . 'Формат письма' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formRadio(array(
		'name' => $__vars['inputName'] . '[emailFormat]',
		'value' => $__vars['option']['option_value']['emailFormat'],
	), array(array(
		'value' => 'plain',
		'label' => 'Простой текст',
		'selected' => (!$__vars['option']['option_value']['emailFormat']) OR ($__vars['option']['option_value']['emailFormat'] == 'plain'),
		'_type' => 'option',
	),
	array(
		'value' => 'html',
		'label' => 'HTML',
		'_type' => 'option',
	))) . '
			<p class="formRow-explain">' . 'Имейте в виду, что почтовые клиенты обрабатывают HTML по-разному. Пожалуйста, проведите тестирование перед рассылкой писем в формате HTML. В текстовой версии письма все HTML-теги будут удалены.' . '</p>
		', '
			<div>' . 'Текст письма' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextArea(array(
		'name' => $__vars['inputName'] . '[emailBody]',
		'value' => $__vars['option']['option_value']['emailBody'],
		'rows' => '5',
		'autosize' => 'true',
	)) . '
			<p class="formRow-explain">' . 'В сообщении будут заменены следующие переменные: {name}, {email}, {id}.' . ' ' . 'Также можно использовать шаблон {phrase:имя_фразы}, в котором фраза будет заменена языком, выбранным у получателя.' . '</p>
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