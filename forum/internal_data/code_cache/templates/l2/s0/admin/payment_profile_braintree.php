<?php
// FROM HASH: 973030a140575c5977128d1469754b1b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[merchant_id]',
		'value' => $__vars['profile']['options']['merchant_id'],
	), array(
		'label' => 'Merchant ID',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[public_key]',
		'value' => $__vars['profile']['options']['public_key'],
	), array(
		'label' => 'Открытый ключ (Public key)',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[private_key]',
		'value' => $__vars['profile']['options']['private_key'],
	), array(
		'label' => 'Закрытый ключ',
		'explain' => 'Пожалуйста, укажите свои API-ключ и ID мерчанта, которые можно получить на сайте <a href="https://www.braintreegateway.com/" target="_blank">Braintree</a>, перейдя по пути: Account > My User > API Keys, Tokenization Keys, Encryption Keys > View Authorizations.<br />
<br />
Если Вы хотите активировать поддержку PayPal, следуйте <a href="https://articles.braintreepayments.com/guides/paypal/setup-guide#enter-your-paypal-credentials-in-the-braintree-control-panel" target="_blank">этой инструкции</a>.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[merchant_account]',
		'value' => $__vars['profile']['options']['merchant_account'],
	), array(
		'label' => 'Merchant account ID',
		'explain' => 'Merchant ID указан на странице Settings > Processing.<br />
<br />
<b>Примечание:</b> по умолчанию Braintree не поддерживает несколько валют. Валюты, которое Вы выберите для своих товаров <b><i>могут быть проигнорированы</i></b>.<br />
<br />
Для поддержки нескольких валют потребуется <a href="mailto:support@braintreepayments.com">связаться с Braintree</a> и попросить их создать multiple Merchant Account. Merchant Account определяет, какие валютные транзакции будут обработаны. Вам необходимо указать ID того Merchant Account, который будет здесь использоваться.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'checked' => $__vars['profile']['options']['plan_id'],
		'label' => 'Поддержка повторного выставления счетов с помощью следующего ID тарифа' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'options[plan_id]',
		'value' => $__vars['profile']['options']['plan_id'],
	))),
		'_type' => 'option',
	)), array(
		'explain' => 'Если Вы хотите включить поддержку повторного выставления счетов для приобретаемого товара, то активируйте данную опцию, и укажите идентификатор плана, который хотите использовать для любых покупок, сделанных с этим профилем, в своём <a href="https://www.braintreegateway.com/" target="_blank">аккаунте Braintree</a>.<br />
<br />
Для поддержки повторного выставления счетов и автоматической отмены покупки при открытии спора о платеже, убедитесь, что Вы включили Webhooks со следующим URL-адресом, иначе Вам придётся контролировать и управлять этим процессом вручную:<br />
<br />
' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/payment_callback.php?_xfProvider=braintree',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[apple_pay_enable]',
		'selected' => $__vars['profile']['options']['apple_pay_enable'],
		'label' => '
		' . 'Включить поддержку Apple Pay' . '
	',
		'_type' => 'option',
	)), array(
		'explain' => 'Требуется аккаунт разработчика Apple и дополнительные настройки в личном кабинете Braintree.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[paypal_enable]',
		'selected' => $__vars['profile']['options']['paypal_enable'],
		'label' => '
		' . 'Включить поддержку PayPal' . '
	',
		'_type' => 'option',
	)), array(
		'explain' => 'Требуется бизнес-аккаунт в PayPal и дополнительные настройки в личном кабинете Braintree.',
	));
	return $__finalCompiled;
}
);