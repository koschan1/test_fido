<?php
// FROM HASH: 752c0ccd0610577d7230a55b7a8948e9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтверждение отправки письма');
	$__finalCompiled .= '

';
	if ($__vars['tested']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">' . 'Тестовое письмо отправлено на адрес ' . $__templater->escape($__vars['xf']['visitor']['email']) . '.' . '</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . '
				<span role="presentation" aria-hidden="true">&middot;</span>
				<a href="' . $__templater->func('link', array('users/list', null, array('criteria' => $__vars['criteria'], ), ), true) . '">' . 'Посмотреть полный список' . '</a>
			', array(
		'label' => 'По заданным параметрам найдено пользователей',
	)) . '
			' . $__templater->formRow('
				' . $__templater->button('Протестировать', array(
		'type' => 'submit',
		'name' => 'test',
		'value' => '1',
		'class' => 'button',
	), '', array(
	)) . '
			', array(
		'label' => 'Тест',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Отправить',
	), array(
	)) . '
	</div>

	' . $__templater->formHiddenVal('json_criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
	)) . '

	' . $__templater->formHiddenVal('total', $__vars['total'], array(
	)) . '

	' . $__templater->formHiddenVal('from_name', $__vars['email']['from_name'], array(
	)) . '
	' . $__templater->formHiddenVal('from_email', $__vars['email']['from_email'], array(
	)) . '

	' . $__templater->formHiddenVal('email_title', $__vars['email']['email_title'], array(
	)) . '
	' . $__templater->formHiddenVal('email_format', $__vars['email']['email_format'], array(
	)) . '
	' . $__templater->formHiddenVal('email_body', $__vars['email']['email_body'], array(
	)) . '
	' . $__templater->formHiddenVal('email_wrapped', $__vars['email']['email_wrapped'], array(
	)) . '
	' . $__templater->formHiddenVal('email_unsub', $__vars['email']['email_unsub'], array(
	)) . '
', array(
		'action' => $__templater->func('link', array('users/email/send', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);