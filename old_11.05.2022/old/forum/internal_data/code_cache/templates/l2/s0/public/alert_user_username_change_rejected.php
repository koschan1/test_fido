<?php
// FROM HASH: 4604b286f843df671a79323ffbfdf7dc
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Изменение Вашего имени пользователя на ' . $__templater->escape($__vars['extra']['rejectedUsername']) . ' было отклонено.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
}
);