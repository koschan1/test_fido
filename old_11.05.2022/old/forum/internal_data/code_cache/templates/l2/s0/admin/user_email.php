<?php
// FROM HASH: 07afa7dccd2c1b9fe3a49db59ec81a43
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Разослать письма');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Вы можете использовать эту форму для массовой отправки писем по электронной почте пользователям, удовлетворяющим критериям, указанным ниже.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['sent']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'Письма были отправлены следующему количеству пользователей: ' . $__templater->filter($__vars['sent'], array(array('number', array()),), true) . '.' . '
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'list_only',
		'label' => 'Только сгенерировать список адресов электронной почты',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'from_name',
		'value' => ($__vars['xf']['options']['emailSenderName'] ? $__vars['xf']['options']['emailSenderName'] : $__vars['xf']['options']['boardTitle']),
	), array(
		'label' => 'Имя отправителя',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'from_email',
		'value' => $__vars['xf']['options']['defaultEmailAddress'],
		'type' => 'email',
	), array(
		'label' => 'Адрес отправителя',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'email_title',
	), array(
		'label' => 'Тема электронного письма',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'email_format',
	), array(array(
		'value' => '',
		'selected' => true,
		'label' => 'Простой текст',
		'_type' => 'option',
	),
	array(
		'value' => 'html',
		'label' => 'HTML',
		'hint' => 'Имейте в виду, что почтовые клиенты обрабатывают HTML по-разному. Пожалуйста, проведите тестирование перед рассылкой писем в формате HTML. В текстовой версии письма все HTML-теги будут удалены.',
		'_type' => 'option',
	)), array(
		'label' => 'Формат письма',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'email_body',
		'mode' => 'html',
		'data-line-wrapping' => 'true',
		'class' => 'codeEditor--autoSize codeEditor--proportional',
	), array(
		'label' => 'Текст письма',
		'explain' => ' ' . 'В тексте письма будут заменены следующие макросы: {name}, {email}, {id}, {unsub}.' . ' ' . 'Также можно использовать шаблон {phrase:имя_фразы}, в котором фраза будет заменена языком, выбранным у получателя.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'email_wrapped',
		'selected' => true,
		'label' => 'Включить оформление электронных писем по умолчанию',
		'hint' => 'Если выбрано, то содержание электронного письма будет оформлено в стандартный верхний и нижний колонтитулы, которые используются в электронных письмах, отправляемых XenForo.',
		'_type' => 'option',
	),
	array(
		'name' => 'email_unsub',
		'selected' => true,
		'label' => 'Автоматически добавлять ссылку для отмены подписки на рассылку',
		'hint' => 'Если выбрано, то внизу этого письма будет автоматически добавлена ссылка для отмены подписки на рассылку. Если Вы используете токен \'unsub\' в теле письма, то этот параметр будет проигнорирован.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>

		<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Критерии пользователя' . '</span></h2>
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'criteria[Option][receive_admin_email]',
		'selected' => true,
		'label' => '
					' . 'Отправлять письма о новостях и обновлениях только пользователям, желающим получать такие рассылки' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->includeTemplate('helper_user_search_criteria', $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить' . $__vars['xf']['language']['ellipsis'],
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/email/confirm', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);