<?php
// FROM HASH: 72ba94f72626a9f59de533269bc28c45
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[consumer_key]',
		'value' => $__vars['options']['consumer_key'],
	), array(
		'label' => 'Ключ приложения (Consumer key)',
		'hint' => 'Обязательное поле',
		'explain' => 'Чтобы разрешить пользователям авторизовываться через Twitter, необходимо создать <a href="https://developer.twitter.com/" target="_blank">приложение</a> и ввести ключ (Consumer key) и секретную фразу (Consumer secret).',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[consumer_secret]',
		'value' => $__vars['options']['consumer_secret'],
	), array(
		'label' => 'Секретная фраза (Consumer secret)',
		'hint' => 'Обязательное поле',
		'explain' => 'Если Вы создали приложение Twitter, укажите здесь его секретную фразу (Consumer secret).',
	));
	return $__finalCompiled;
}
);