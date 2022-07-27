<?php
// FROM HASH: dca965b99ee9fcc14c01a60a29f3edc3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['comment']) {
		$__finalCompiled .= '
	' . 'Ваша последняя жалоба была решена: ' . $__templater->escape($__vars['extra']['title']) . ' - ' . $__templater->escape($__vars['extra']['comment']) . '' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Ваша последняя жалоба была решена: ' . $__templater->escape($__vars['extra']['title']) . '' . '
';
	}
	return $__finalCompiled;
}
);