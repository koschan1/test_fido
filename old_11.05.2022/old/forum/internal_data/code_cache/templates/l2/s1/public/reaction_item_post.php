<?php
// FROM HASH: 4eef1fc81517693094d4aee8d4851a14
return array(
'macros' => array('reaction_snippet' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'reactionUser' => '!',
		'reactionId' => '!',
		'post' => '!',
		'date' => '!',
		'fallbackName' => 'Неизвестный пользователь',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="contentRow-title">
		';
	if ($__vars['post']['user_id'] AND ($__vars['post']['user_id'] == $__vars['xf']['visitor']['user_id'])) {
		$__finalCompiled .= '
			' . '' . $__templater->func('username_link', array($__vars['reactionUser'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' отреагировал на <a ' . (('href="' . $__templater->func('link', array('posts', $__vars['post'], ), true)) . '"') . '>Ваше сообщение</a> в теме ' . ((((('<a href="' . $__templater->func('link', array('threads', $__vars['post']['Thread'], ), true)) . '">') . $__templater->func('prefix', array('thread', $__vars['post']['Thread'], ), true)) . $__templater->escape($__vars['post']['Thread']['title'])) . '</a>') . '. Реакция: ' . $__templater->filter($__templater->func('alert_reaction', array($__vars['reactionId'], 'medium', ), false), array(array('preescaped', array()),), true) . '' . '
		';
	} else {
		$__finalCompiled .= '
			' . '' . $__templater->func('username_link', array($__vars['reactionUser'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' отреагировал на <a ' . (('href="' . $__templater->func('link', array('posts', $__vars['post'], ), true)) . '"') . '>сообщение ' . $__templater->escape($__vars['post']['username']) . '</a> в теме ' . ((((('<a href="' . $__templater->func('link', array('threads', $__vars['post']['Thread'], ), true)) . '">') . $__templater->func('prefix', array('thread', $__vars['post']['Thread'], ), true)) . $__templater->escape($__vars['post']['Thread']['title'])) . '</a>') . '. Реакция: ' . $__templater->filter($__templater->func('alert_reaction', array($__vars['reactionId'], 'medium', ), false), array(array('preescaped', array()),), true) . '' . '
		';
	}
	$__finalCompiled .= '
	</div>

	<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['post']['message'], $__vars['xf']['options']['newsFeedMessageSnippetLength'], array('stripQuote' => true, ), ), true) . '</div>

	<div class="contentRow-minor">' . $__templater->func('date_dynamic', array($__vars['date'], array(
	))) . '</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . $__templater->callMacro(null, 'reaction_snippet', array(
		'reactionUser' => $__vars['reaction']['ReactionUser'],
		'reactionId' => $__vars['reaction']['reaction_id'],
		'post' => $__vars['content'],
		'date' => $__vars['reaction']['reaction_date'],
	), $__vars);
	return $__finalCompiled;
}
);