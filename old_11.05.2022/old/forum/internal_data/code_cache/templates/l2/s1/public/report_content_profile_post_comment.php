<?php
// FROM HASH: 64911f3436a362f770ea4a0a0bca9e71
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-row block-row--separated">
	' . $__templater->func('bb_code', array($__vars['report']['content_info']['message'], 'profile_post_comment', ($__vars['content'] ?: $__vars['report']['User']), ), true) . '
</div>

';
	if ($__vars['report']['content_info']['user']) {
		$__finalCompiled .= '
	';
		if ($__vars['report']['content_info']['user']['user_id'] != $__vars['report']['content_info']['profileUser']['user_id']) {
			$__finalCompiled .= '
		<div class="block-row block-row--separated block-row--minor">
			<dl class="pairs pairs--inline">
				<dt>' . 'Сообщение в профиле' . '</dt>
				<dd><a href="' . $__templater->func('link', array('profile-posts', $__vars['report']['content_info'], ), true) . '">' . 'Сообщение в профиле ' . $__templater->escape($__vars['report']['content_info']['profileUser']['username']) . '' . '</a></dd>
			</dl>
		</div>
	';
		}
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	<div class="block-row block-row--separated block-row--minor">
		<dl class="pairs pairs--inline">
			<dt>' . 'Сообщение в профиле' . '</dt>
			<dd><a href="' . $__templater->func('link', array('profile-posts', $__vars['report']['content_info'], ), true) . '">' . 'Сообщение в профиле ' . $__templater->escape($__vars['report']['content_info']['profile_username']) . '' . '</a></dd>
		</dl>
	</div>
';
	}
	return $__finalCompiled;
}
);