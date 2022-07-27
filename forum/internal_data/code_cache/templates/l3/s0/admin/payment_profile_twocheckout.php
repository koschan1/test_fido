<?php
// FROM HASH: b6fc7727f153d640e390054283dd3d8f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[account_number]',
		'value' => $__vars['profile']['options']['account_number'],
	), array(
		'label' => 'Номер аккаунта',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[secret_word]',
		'value' => $__vars['profile']['options']['secret_word'],
	), array(
		'label' => 'Секретное слово',
		'explain' => 'Номер аккаунта Вы можете увидеть в своём аккаунте <a href="https://www.2checkout.com/login" target="_blank">2Checkout</a>. После входа в свой аккаунт, Вы можете сами установить секретное слово, перейдя по пути: Account > Site Management.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[api_username]',
		'value' => $__vars['profile']['options']['api_username'],
	), array(
		'label' => 'Имя пользователя API',
		'hint' => 'Не обязательно',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[api_password]',
		'value' => $__vars['profile']['options']['api_password'],
	), array(
		'label' => 'Пароль API',
		'hint' => 'Не обязательно',
		'explain' => 'Поля "Пароль API" и "Имя пользователя API " являются обязательными только в том случае, если Вы хотите разрешить пользователям отменять автоматическое продление подписок.<br /><br />Если оставить эти поля пустыми, то автоматическое продление подписок может быть отменено только через Ваш аккаунт на сайте <a href="https://www.2checkout.com/login"  target="_blank">2Checkout</a>.',
	));
	return $__finalCompiled;
}
);