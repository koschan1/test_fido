<?php
// FROM HASH: e51fcc5ceaf8909f660467d75c29364c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Попытка отправки письма на ' . $__templater->escape($__vars['xf']['visitor']['email']) . ' не удалась. Пожалуйста, обновите Ваш email.' . '<br />
<a href="' . $__templater->func('link', array('account/email', ), true) . '">' . 'Обновите контактные данные' . '</a>';
	return $__finalCompiled;
}
);