<?php
// FROM HASH: 96b7808a8eac0e3d902ba3f5802ab2ee
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['profileUserId'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
	' . 'Ваш статус был удалён.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Ваше сообщение в профиле для пользователя ' . $__templater->escape($__vars['extra']['profileUser']) . ' было удалено.' . '
	<push:url>' . $__templater->func('base_url', array($__vars['extra']['profileLink'], 'canonical', ), true) . '</push:url>
';
	}
	$__finalCompiled .= '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
}
);