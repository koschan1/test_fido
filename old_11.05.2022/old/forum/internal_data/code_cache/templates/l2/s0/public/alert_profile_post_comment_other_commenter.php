<?php
// FROM HASH: 48d8325552deae3facad57d908fb75b4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['content']['ProfilePost']['ProfileUser']['user_id'] == $__vars['content']['ProfilePost']['user_id']) {
		$__finalCompiled .= '
	' . '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' также прокомментировал(а) <a ' . (('href="' . $__templater->func('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>статус ' . $__templater->escape($__vars['content']['ProfilePost']['username']) . '</a>' . '
';
	} else {
		$__finalCompiled .= '
	' . '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' также прокомментировал(а) <a ' . (('href="' . $__templater->func('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>сообщение в профиле</a>, написанное ' . $__templater->escape($__vars['content']['ProfilePost']['username']) . '' . '
';
	}
	return $__finalCompiled;
}
);