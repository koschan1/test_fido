<?php
// FROM HASH: 95457daa9a83a5c860195f22b557991f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['profileUserId'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
	' . 'Ваш <a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true) . '">статус</a> был отредактирован.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Ваше сообщение в профиле ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['profileUser'])) . '</a>') . ' было отредактировано.' . '
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