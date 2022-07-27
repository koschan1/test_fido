<?php
// FROM HASH: 83637995ac062d1d5553889cd03b5046
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'В данный момент Ваша учётная запись ожидает подтверждения. Письмо с подтверждением было отправлено на адрес: ' . $__templater->escape($__vars['xf']['visitor']['email']) . '.' . '
';
	if ($__vars['xf']['session']['hasPreRegActionPending']) {
		$__finalCompiled .= '
	' . 'Как только Ваша регистрация будет завершена, Ваш контент будет автоматически опубликован.' . '
';
	}
	$__finalCompiled .= '<br />
<a href="' . $__templater->func('link', array('account-confirmation/resend', ), true) . '" data-xf-click="overlay">' . 'Отправить письмо с подтверждением ещё раз' . '</a>';
	return $__finalCompiled;
}
);