<?php
// FROM HASH: f984506a2f7b884de97d4735537cbf5d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['welcome']) {
		$__finalCompiled .= '
	' . 'Добро пожаловать на ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '!' . '
';
	}
	$__finalCompiled .= '
';
	if ($__templater->method($__vars['content'], 'isFirstPost', array())) {
		$__finalCompiled .= '
	' . 'Ваша тема ' . ((((('<a href="' . $__templater->func('link', array('threads', $__vars['content']['Thread'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('thread', $__vars['content']['Thread'], ), true)) . $__templater->escape($__vars['content']['Thread']['title'])) . '</a>') . ' создана.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Ваш ответ на тему ' . ((((('<a href="' . $__templater->func('link', array('posts', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('thread', $__vars['content']['Thread'], ), true)) . $__templater->escape($__vars['content']['Thread']['title'])) . '</a>') . ' отправлен.' . '
';
	}
	return $__finalCompiled;
}
);