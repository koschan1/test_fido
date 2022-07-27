<?php
// FROM HASH: 1b959e9e484976557da829a7369c10ca
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['xf']['visitor']['user_id'] == $__vars['content']['ProfileUser']['user_id']) {
		$__finalCompiled .= '
	' . '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' отреагировал(а) на Ваш статус. Реакция: ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '' . '
';
	} else {
		$__finalCompiled .= '
	' . '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' отреагировал(а) на Ваше сообщение в профиле ' . $__templater->escape($__vars['content']['ProfileUser']['username']) . '. Реакция: ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '' . '
';
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('link', array('canonical:profile-posts', $__vars['content'], ), true) . '</push:url>
<push:tag>profile_post_reaction_' . $__templater->escape($__vars['content']['profile_post_id']) . '_' . $__templater->escape($__vars['extra']['reaction_id']) . '</push:tag>';
	return $__finalCompiled;
}
);