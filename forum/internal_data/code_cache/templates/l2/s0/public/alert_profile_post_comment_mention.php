<?php
// FROM HASH: 7ec519ffd2f021b2dc7d31cbe72e7ba9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' упомянул(а) Вас в <a ' . (('href="' . $__templater->func('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>комментарии</a> в профиле ' . $__templater->escape($__vars['content']['ProfilePost']['ProfileUser']['username']) . '.';
	return $__finalCompiled;
}
);