<?php
// FROM HASH: ccf7e152784356be764301b6fbe2b9f6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Сбросить пароль');
	$__finalCompiled .= '

<div class="blockMessage blockMessage--important">
	' . 'Чтобы обеспечить безопасность Вашей учетной записи требуется сменить пароль, прежде чем Вы сможете продолжить использование сайта.' . '
</div>

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow($__templater->escape($__vars['user']['username']), array(
		'label' => 'Имя пользователя',
	)) . '

			' . $__templater->formPasswordBoxRow(array(
		'name' => 'password',
		'autocomplete' => 'new-password',
		'checkstrength' => 'true',
	), array(
		'label' => 'Новый пароль',
	)) . '

			' . $__templater->formPasswordBoxRow(array(
		'name' => 'password_confirm',
		'autocomplete' => 'new-password',
	), array(
		'label' => 'Подтвердить новый пароль',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('security-lock/reset', $__vars['user'], array('c' => $__vars['c'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);