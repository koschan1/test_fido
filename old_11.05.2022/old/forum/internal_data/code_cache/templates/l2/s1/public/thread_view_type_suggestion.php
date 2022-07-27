<?php
// FROM HASH: 82006603ca9f81c9c1f1e6f03684eac8
return array(
'extends' => function($__templater, array $__vars) { return 'thread_view'; },
'extensions' => array('pinned_outer_after' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
		$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['suggestionInfo']['implemented']) {
		$__compilerTemp1 .= '
						' . 'Это предложение реализовано. Голоса больше не принимаются.' . '
					';
	} else if ($__vars['suggestionInfo']['closed']) {
		$__compilerTemp1 .= '
						' . 'Это предложение закрыто. Голоса больше не принимаются.' . '
					';
	} else if ($__vars['thread']['type_data']['allow_voting'] === 'paused') {
		$__compilerTemp1 .= '
						' . 'Голосование по этому предложению приостановлено.' . '
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="block-outer block-outer--after">
			<div class="blockStatus">
				<div class="blockStatus-message blockStatus-message--locked">
				' . $__compilerTemp1 . '
				</div>
			</div>
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . $__templater->renderExtension('pinned_outer_after', $__vars, $__extensions);
	return $__finalCompiled;
}
);