<?php
// FROM HASH: bcf2a877018318c08947bbb76fac6ec2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['comment']) {
		$__finalCompiled .= '
	' . 'К сожалению, Ваша недавняя жалоба была отклонена: ' . $__templater->escape($__vars['extra']['title']) . ' - ' . $__templater->escape($__vars['extra']['comment']) . '' . '
';
	} else {
		$__finalCompiled .= '
	' . 'К сожалению, Ваша недавняя жалобы была отклонена: \'' . $__templater->escape($__vars['extra']['title']) . '\'' . '
';
	}
	return $__finalCompiled;
}
);