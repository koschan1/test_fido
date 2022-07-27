<?php
// FROM HASH: 3f31443eda0c629ff6fcf8d43756cd02
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтверждение пароля');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Для доступа к этой странице, Вам необходимо подтвердить свой пароль.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['username']), array(
		'label' => 'Имя пользователя',
	)) . '

			' . $__templater->formPasswordBoxRow(array(
		'name' => 'password',
	), array(
		'label' => 'Пароль',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Подтвердить',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(($__vars['redirect'] ?: $__vars['xf']['uri']), null, true)) . '
', array(
		'action' => $__templater->func('link', array('login/password-confirm', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);