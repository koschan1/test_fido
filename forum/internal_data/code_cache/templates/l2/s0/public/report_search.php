<?php
// FROM HASH: 9d2daf570ef423e9f5ed10f7f0e916f5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Жалобы пользователя ' . $__templater->escape($__vars['user']['username']) . '');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Жалобы'), $__templater->func('link', array('reports', ), false), array(
	));
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			<div class="structItemContainer">
				';
	if ($__templater->isTraversable($__vars['reports'])) {
		foreach ($__vars['reports'] AS $__vars['report']) {
			$__finalCompiled .= '
					' . $__templater->callMacro('report_list_macros', 'item', array(
				'report' => $__vars['report'],
			), $__vars) . '
				';
		}
	}
	$__finalCompiled .= '
			</div>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);