<?php
// FROM HASH: 9de0e6addfee30fb4a2db3dd2eef8f36
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['welcome']) {
		$__finalCompiled .= '
	' . 'Добро пожаловать на ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '!' . '
';
	}
	$__finalCompiled .= '
' . 'К сожалению, контент, созданный вами до регистрации, не может быть размещён автоматически.';
	return $__finalCompiled;
}
);