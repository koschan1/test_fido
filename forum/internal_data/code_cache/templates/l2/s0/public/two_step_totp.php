<?php
// FROM HASH: d52ec7d001f642bdcb337054a638d4fa
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['context'] == 'setup') {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'vendor/qrcode/jquery-qrcode.min.js',
		));
		$__finalCompiled .= '
	' . $__templater->formRow('
		' . 'Для получения кодов подтверждения через приложение, необходимо сначала установить одно из приложений, генерирующие эти коды на Ваш телефон. Например, <a href="https://www.authy.com" target="_blank">Authy</a> или <a href="https://support.google.com/accounts/answer/1066447?hl=ru" target="_blank">Google Authenticator</a>.<br />
			<br />
			После того, как Вы это сделаете, Вам нужно будет просканировать QR код в приложение и ввести сгенерированный код ниже, для подтверждения.' . '
		<div style="text-align: center"><span id="js-totpQrCode" style="display: inline-block; background: white; padding: 12px"></span></div>
		' . 'Кроме того, можно ввести секретный ключ непосредственно в приложении: ' . $__templater->escape($__vars['secret']) . '' . '
	', array(
			'label' => 'Настройки',
		)) . '
	';
		$__templater->inlineJs('
	jQuery(function($)
	{
		var $el = $(\'#js-totpQrCode\');
		$el.qrcode({
			text: \'' . $__templater->filter($__vars['otpUrl'], array(array('escape', array('js', )),), false) . '\'
		});
	});
	');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->formInfoRow('Пожалуйста, введите код подтверждения, сгенерированный приложением на Вашем телефоне.', array(
		)) . '
';
	}
	$__finalCompiled .= '

' . $__templater->formTextBoxRow(array(
		'name' => 'code',
		'autofocus' => 'autofocus',
		'inputmode' => 'numeric',
		'pattern' => '[0-9]*',
	), array(
		'label' => 'Код подтверждения',
	));
	return $__finalCompiled;
}
);