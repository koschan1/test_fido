<?php
// FROM HASH: 408afe40ae30efaa6c8ddff0c95046c9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['profileUserId'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
	' . 'Обновление Вашего статуса было отредактировано.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Ваше сообщение в профиле ' . $__templater->escape($__vars['extra']['profileUser']) . ' было отредактировано.' . '
';
	}
	$__finalCompiled .= '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('base_url', array($__vars['extra']['link'], 'canonical', ), true) . '</push:url>';
	return $__finalCompiled;
}
);