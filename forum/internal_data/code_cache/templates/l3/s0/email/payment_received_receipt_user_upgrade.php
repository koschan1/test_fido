<?php
// FROM HASH: dd2d0ca7037c79ab92f25a642d4648b2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>' . 'Квитанция о платном повышении Вашей учётной записи на сайте ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '' . '</mail:subject>

<p>' . 'Спасибо за покупку повышения прав на сайте <a href="' . $__templater->func('link', array('canonical:index', ), true) . '">' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '</a>.' . '</p>

<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td><b>' . 'Приобретённый товар' . '</b></td>
	<td align="right"><b>' . 'Цена' . '</b></td>
</tr>
<tr>
	<td><a href="' . $__templater->func('link', array('canonical:account/upgrades', ), true) . '">' . $__templater->escape($__vars['purchasable']['title']) . '</a></td>
	<td align="right">' . $__templater->escape($__vars['purchasable']['purchasable']['cost_phrase']) . '</td>
</tr>
</table>

<p><a href="' . $__templater->func('link', array('canonical:account/upgrades', ), true) . '" class="button">' . 'Управление обновлениями Вашей учётной записи' . '</a></p>

';
	if ($__templater->method($__vars['xf']['toUser'], 'canUseContactForm', array())) {
		$__finalCompiled .= '
	<p>' . 'Спасибо за покупку! Если у Вас остались вопросы, пожалуйста, <a href="' . $__templater->func('link', array('canonical:misc/contact', ), true) . '">свяжитесь с нами</a>.' . '</p>
';
	} else {
		$__finalCompiled .= '
	<p>' . 'Спасибо за покупку.' . '</p>
';
	}
	return $__finalCompiled;
}
);