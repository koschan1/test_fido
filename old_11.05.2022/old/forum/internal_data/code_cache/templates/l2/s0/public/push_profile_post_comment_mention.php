<?php
// FROM HASH: b9ac6b3903ce8ab73cfbec1a306815cf
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' упомянул(а) Вас в комментарии в профиле ' . $__templater->escape($__vars['content']['ProfilePost']['ProfileUser']['username']) . '.' . '
<push:url>' . $__templater->func('link', array('canonical:profile-posts/comments', $__vars['content'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);