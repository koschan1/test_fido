<?php
// FROM HASH: a426295e0e02d3b6722ee97847c49331
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' прокомментировал(а) <a ' . (('href="' . $__templater->func('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>Ваше сообщение</a> в профиле ' . $__templater->escape($__vars['content']['ProfilePost']['ProfileUser']['username']) . '.';
	return $__finalCompiled;
}
);