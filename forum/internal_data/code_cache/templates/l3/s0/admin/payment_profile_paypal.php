<?php
// FROM HASH: 80205a50dec1a0ed4e011788e99726d6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[primary_account]',
		'value' => $__vars['profile']['options']['primary_account'],
		'type' => 'email',
	), array(
		'label' => 'Основной аккаунт PayPal',
		'hint' => 'Обязательное поле',
		'explain' => '
		' . 'Это основной email для Вашего аккаунта PayPal. Если он некорректен, то гарантировать удачный процесс оплаты невозможно. Имейте в виду, что аккаунт PayPal должен иметь статус Premier или Business, а опция IPN (Instant Payment Notifications) должна быть включена.' . '
	',
	)) . '

' . $__templater->formTextAreaRow(array(
		'name' => 'options[alternate_accounts]',
		'value' => $__vars['profile']['options']['alternate_accounts'],
		'autosize' => 'true',
	), array(
		'label' => 'Альтернативные аккаунты PayPal',
		'explain' => 'Альтернативные аккаунты PayPal, на которые могут приходить платежи от пользователей за повышения прав. Это может быть полезно, если основной аккаунт PayPal изменится, а регулярные платежи продолжают поступать на старый аккаунт PayPal. Если старый аккаунт не будет указан здесь в качестве альтернативы, то такие платежи не будут приняты. Вводите по одному аккаунту в каждой строке.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[require_address]',
		'selected' => $__vars['profile']['options']['require_address'],
		'label' => 'Требовать адрес',
		'hint' => 'Если включён, платёжная система будет требовать указания адреса плательщика при оплате.',
		'_type' => 'option',
	)), array(
	)) . '

' . $__templater->formHiddenVal('options[legacy]', ($__vars['profile']['options']['legacy'] ? 1 : 0), array(
	));
	return $__finalCompiled;
}
);