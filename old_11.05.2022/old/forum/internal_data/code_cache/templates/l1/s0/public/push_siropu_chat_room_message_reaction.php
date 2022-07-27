<?php
// FROM HASH: aa86af430ff54e65940b77257f4ed213
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' reacted to your chat room message ' . $__templater->func('snippet', array($__vars['content']['message'], 50, array('stripBbCode' => true, ), ), true) . ' with ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '.' . '

<push:url>' . $__templater->func('link', array('canonocal:chat/message/view', $__vars['content'], ), true) . '</push:url>
<push:tag>siropu_chat_room_message_reaction_' . $__templater->escape($__vars['content']['message_id']) . '_' . $__templater->escape($__vars['extra']['reaction_id']) . '</push:tag>';
	return $__finalCompiled;
}
);