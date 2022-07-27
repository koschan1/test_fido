<?php
// FROM HASH: 815417d69d9aa3edba05b7a8327945f6
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
	' . 'Ваше сообщение в профиле для пользователя ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['profileLink'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['profileUser'])) . '</a>') . ' было удалено.' . '
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