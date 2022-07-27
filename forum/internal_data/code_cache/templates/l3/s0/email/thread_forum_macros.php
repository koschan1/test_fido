<?php
// FROM HASH: 9e173f4dd5c156b176a1f60236a89888
return array(
'macros' => array('go_thread_bar' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'thread' => '!',
		'watchType' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<table cellpadding="10" cellspacing="0" border="0" width="100%" class="linkBar">
	<tr>
		<td>
			<a href="' . $__templater->func('link', array('canonical:threads/unread', $__vars['thread'], array('new' => 1, ), ), true) . '" class="button">' . 'Посмотреть эту тему' . '</a>
		</td>
		<td align="' . ($__vars['xf']['isRtl'] ? 'left' : 'right') . '">
			';
	if ($__vars['watchType'] == 'threads') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/threads', ), true) . '" class="buttonFake">' . 'Отслеживаемые темы' . '</a>
			';
	} else if ($__vars['watchType'] == 'forums') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/forums', ), true) . '" class="buttonFake">' . 'Отслеживаемые разделы' . '</a>
			';
	}
	$__finalCompiled .= '
		</td>
	</tr>
	</table>
';
	return $__finalCompiled;
}
),
'watched_forum_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'thread' => '!',
		'forum' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '<p class="minorText">Пожалуйста, не отвечайте на это сообщение. Вы должны посетить форум, чтобы ответить.</p>

<p class="minorText">Это сообщение было отправлено Вам с сайта ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ', так как Вы подписаны на получение уведомлений о новых темах или сообщениях в разделе "' . $__templater->escape($__vars['forum']['title']) . '" с помощью электронной почты. Вы больше не будете получать уведомления до тех пор, пока не прочитаете новые сообщения.</p>

<p class="minorText">Если Вы больше не хотите получать эти уведомления, Вы можете <a href="' . $__templater->func('link', array('canonical:email-stop/content', $__vars['xf']['toUser'], array('t' => 'forum', 'id' => $__vars['forum']['node_id'], ), ), true) . '">отключить их для этого раздела</a> или <a href="' . $__templater->func('link', array('canonical:email-stop/all', $__vars['xf']['toUser'], ), true) . '">отключить все уведомления на электронную почту</a>.</p>' . '
';
	return $__finalCompiled;
}
),
'watched_thread_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'thread' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '<p class="minorText">Пожалуйста, не отвечайте на это сообщение. Вы должны посетить форум, чтобы ответить.</p>

<p class="minorText">Это сообщение было отправлено Вам с сайта ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ', так как Вы подписаны на получение уведомлений о новых ответах в теме "' . (((('<a href="' . $__templater->func('link', array('canonical:threads', $__vars['thread'], ), true)) . '">') . $__templater->escape($__vars['thread']['title'])) . '</a>') . '" с помощью электронной почты. Вы больше не будете получать уведомления до тех пор, пока не прочитаете новые сообщения.</p>

<p class="minorText">Если Вы больше не хотите получать эти уведомления, Вы можете <a href="' . $__templater->func('link', array('canonical:email-stop/content', $__vars['xf']['toUser'], array('t' => 'thread', 'id' => $__vars['thread']['thread_id'], ), ), true) . '">отключить их для этой темы</a> или <a href="' . $__templater->func('link', array('canonical:email-stop/all', $__vars['xf']['toUser'], ), true) . '">отключить все уведомления на электронную почту</a>.</p>' . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

';
	return $__finalCompiled;
}
);