<?php
// FROM HASH: 36956f93a2e21af109e886ae1a992535
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' прокомментировал(а) Ваше сообщение в профиле ' . $__templater->escape($__vars['content']['ProfilePost']['ProfileUser']['username']) . '.' . '
<push:url>' . $__templater->func('link', array('canonical:profile-posts/comments', $__vars['content'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);