<?php
// FROM HASH: ef26d05351c0ce06c422e10223e2b48b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Изменение Вашего имени пользователя с ' . $__templater->escape($__vars['extra']['oldUsername']) . ' на ' . $__templater->escape($__vars['extra']['newUsername']) . ' одобрено.';
	return $__finalCompiled;
}
);