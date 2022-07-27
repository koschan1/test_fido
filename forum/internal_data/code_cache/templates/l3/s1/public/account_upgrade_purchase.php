<?php
// FROM HASH: a1deabe2fc0be951f32f68089f0d152e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Спасибо за покупку!');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

<div class="blockMessage">' . 'Спасибо за покупку этого повышения.<br />
<br />
После подтверждения платежа, Ваша учётная запись будет обновлена.' . '</div>';
	return $__finalCompiled;
}
);