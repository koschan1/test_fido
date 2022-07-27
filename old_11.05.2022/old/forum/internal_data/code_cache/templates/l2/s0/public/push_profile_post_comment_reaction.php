<?php
// FROM HASH: 23123df307c7633e4d5f3223b0a4af9f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['xf']['visitor']['user_id'] == $__vars['content']['ProfilePost']['user_id']) {
		$__finalCompiled .= '
	' . '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' отреагировал(а) на Ваш комментарий в Вашем профиле ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '. Реакция: ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '' . '
';
	} else {
		$__finalCompiled .= '
	' . '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' отреагировал(а) на Ваш комментарий в профиле ' . $__templater->escape($__vars['content']['ProfilePost']['username']) . '. Реакция: ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '' . '
';
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('link', array('canonical:profile-posts', $__vars['content'], ), true) . '</push:url>
<push:tag>profile_post_comment_reaction_' . $__templater->escape($__vars['content']['profile_post_comment_id']) . '_' . $__templater->escape($__vars['extra']['reaction_id']) . '</push:tag>';
	return $__finalCompiled;
}
);