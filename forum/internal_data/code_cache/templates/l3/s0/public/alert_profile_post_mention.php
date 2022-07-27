<?php
// FROM HASH: 4ee44e0b920c72f80360fc39804d5c8f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' упомянул(а) Вас в <a ' . (('href="' . $__templater->func('link', array('profile-posts', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>сообщении</a> в профиле ' . $__templater->escape($__vars['content']['ProfileUser']['username']) . '.';
	return $__finalCompiled;
}
);