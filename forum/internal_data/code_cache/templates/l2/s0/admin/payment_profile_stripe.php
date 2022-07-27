<?php
// FROM HASH: b0f2689fd46f32ce612fe6290c410f47
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[live_publishable_key]',
		'value' => $__vars['profile']['options']['live_publishable_key'],
	), array(
		'label' => 'Публичный ключ',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[live_secret_key]',
		'value' => $__vars['profile']['options']['live_secret_key'],
	), array(
		'label' => 'Секретный ключ',
		'explain' => 'Укажите действующие secret и publishable ключи своего <a href="https://dashboard.stripe.com/account/apikeys" target="_blank">аккаунта Stripe</a>.<br />
<br />
Вам также необходимо настроить webhook endpoint на <a href="https://dashboard.stripe.com/account/webhooks">этой странице</a>.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formTextBoxRow(array(
		'name' => 'options[test_publishable_key]',
		'value' => $__vars['profile']['options']['test_publishable_key'],
	), array(
		'label' => 'Публичный ключ для тестирования',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[test_secret_key]',
		'value' => $__vars['profile']['options']['test_secret_key'],
	), array(
		'label' => 'Секретный ключ для тестирования',
		'explain' => 'Тестовые ключи используются только в том случае, если параметр <code>enableLivePayments</code> в файле <code>config.php</code> имеет значение false.<br />
<br /><b>Примечание:</b> перед тем, как начать принимать реальные платежи, Вам необходимо активировать свой аккаунт в панели управления Stripe.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formTextBoxRow(array(
		'name' => 'options[statement_descriptor]',
		'value' => $__vars['profile']['options']['statement_descriptor'],
		'minlength' => '5',
		'maxlength' => '22',
	), array(
		'label' => 'Дескриптор выписки',
		'explain' => 'Дескрипторы выписки используются в описании расходов или платежей в банковских выписках. Если оставить это поле пустым, будет использоваться название форума. Если Вы хотите установить собственный дескриптор, он должен соответствовать формату, <a href="https://stripe.com/docs/statement-descriptors#requirements" target="_blank">описанному в документации Stripe</a>.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formRow('
	<div class="formRow-explain">
		' . '<strong>Примечание:</strong> Не забудьте настроить URL оповещения на странице <a href="https://dashboard.stripe.com/account/webhooks">Developers > Webhooks</a>. Он должен быть таким: <pre><code>' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/payment_callback.php?_xfProvider=stripe</code></pre>

Для дополнительной безопасности рекомендуется указать свой "Signing secret" ниже.' . '
	</div>
', array(
		'label' => '',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'label' => 'Проверять webhook вместе с секретом подписи' . $__vars['xf']['language']['label_separator'],
		'selected' => $__vars['profile']['options']['signing_secret'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'options[signing_secret]',
		'value' => $__vars['profile']['options']['signing_secret'],
	))),
		'_type' => 'option',
	)), array(
		'explain' => 'Для проверки подписи входящих webhook и предотвращения атак необходимо указать &quot;Signing secret&quot; из панели управления Stripe <a href="https://dashboard.stripe.com/account/webhooks">на этой странице</a>.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[payment_request_api_enable]',
		'selected' => $__vars['profile']['options']['payment_request_api_enable'],
		'label' => '
		' . 'Включить поддержку API запросов на оплату' . '
	',
		'_type' => 'option',
	)), array(
		'explain' => '<a href="https://w3c.github.io/payment-request/" target="_blank">API запроса платежа</a> это стандарт браузера, который позволяет пользователям с совместимым браузером оплачивать товары и услуги без необходимости повторного ввода своих платёжных данных.<br />
<br />
Если включено, пользователи смогут расплачиваться с помощью Apple Pay, Android Pay, Google Pay и Microsoft Pay в дополнение к действительной кредитной/дебетовой карте.  Apple Pay требует <a href="https://dashboard.stripe.com/account/apple_pay" target="_blank">дополнительной настройки</a> в панели управления Stripe.',
	)) . '

' . $__templater->formHiddenVal('options[stripe_country]', $__vars['profile']['options']['stripe_country'], array(
	));
	return $__finalCompiled;
}
);