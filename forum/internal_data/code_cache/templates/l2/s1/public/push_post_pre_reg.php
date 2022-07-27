<?php
// FROM HASH: b0cde2c48ed2099889d3b942a759b303
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
	' . 'Ваша тема ' . ($__templater->func('prefix', array('thread', $__vars['content']['Thread'], 'plain', ), true) . $__templater->escape($__vars['content']['Thread']['title'])) . ' создана.' . '
	<push:url>' . $__templater->func('link', array('canonical:threads', $__vars['content']['Thread'], ), true) . '</push:url>
';
	} else {
		$__finalCompiled .= '
	' . 'Ваш ответ на тему ' . ($__templater->func('prefix', array('thread', $__vars['content']['Thread'], 'plain', ), true) . $__templater->escape($__vars['content']['Thread']['title'])) . ' отправлен.' . '
	<push:url>' . $__templater->func('link', array('canonical:posts', $__vars['content'], ), true) . '</push:url>
';
	}
	return $__finalCompiled;
}
);