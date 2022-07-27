<?php
// FROM HASH: 250c67aedbd9033aa4d4d96d3cb52aee
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['comment']) {
		$__finalCompiled .= '
	' . 'Ваша последняя жалоба была решена: ' . $__templater->filter($__vars['extra']['title'], array(array('strip_tags', array()),), true) . ' - ' . $__templater->escape($__vars['extra']['comment']) . '' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Ваша последняя жалоба была решена: ' . $__templater->filter($__vars['extra']['title'], array(array('strip_tags', array()),), true) . '' . '
';
	}
	return $__finalCompiled;
}
);