<?php
// FROM HASH: 1944db8996cad198c3464d098cc8deee
return array(
'macros' => array('answer' => array(
'extends' => 'post_macros::post',
'extensions' => array('extra_classes' => function($__templater, array $__vars, $__extensions = null)
{
	return 'message--post ' . ($__vars['post']['is_question_solution'] ? 'message--solution' : '');
},
'main_cell' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
		$__finalCompiled .= '
		' . $__templater->renderExtensionParent($__vars, null, $__extensions) . '

		';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__templater->method($__vars['post'], 'isContentVotingSupported', array())) {
		$__compilerTemp1 .= '
						' . $__templater->callMacro('content_vote_macros', 'vote_control', array(
			'link' => 'posts/vote',
			'content' => $__vars['post'],
		), $__vars) . '
					';
	}
	$__compilerTemp1 .= '

					';
	if ($__templater->method($__vars['post'], 'canMarkAsQuestionSolution', array())) {
		$__compilerTemp1 .= '
						';
		$__vars['isSolutionText'] = 'Снять отметку как решение';
		$__compilerTemp1 .= '
						';
		$__vars['makeSolutionText'] = 'Отметить как решение';
		$__compilerTemp1 .= '

						<a href="' . $__templater->func('link', array('posts/mark-solution', $__vars['post'], ), true) . '"
							class="solutionIcon ' . ($__vars['post']['is_question_solution'] ? 'is-solution' : '') . ' js-solutionControl"
							data-xf-click="solution-edit"
							data-sk-marked="addClass:is-solution, titleAttr:sync, ' . $__templater->filter($__vars['isSolutionText'], array(array('for_attr', array()),), true) . '"
							data-sk-removed="removeClass:is-solution, titleAttr:sync, ' . $__templater->filter($__vars['makeSolutionText'], array(array('for_attr', array()),), true) . '"
							data-label=".u-srOnly"
							data-xf-init="tooltip"
							title="' . ($__vars['post']['is_question_solution'] ? $__templater->escape($__vars['isSolutionText']) : $__templater->escape($__vars['makeSolutionText'])) . '">
							<span class="u-srOnly">' . ($__vars['post']['is_question_solution'] ? $__templater->escape($__vars['isSolutionText']) : $__templater->escape($__vars['makeSolutionText'])) . '</span>
						</a>
					';
	} else if ($__vars['post']['is_question_solution']) {
		$__compilerTemp1 .= '
						<span class="solutionIcon is-solution" data-xf-init="tooltip" title="' . $__templater->filter('Решение', array(array('for_attr', array()),), true) . '">
							<span class="u-srOnly">' . 'Решение' . '</span>
						</span>
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
			<div class="message-cell message-cell--vote">
				<div class="message-column">
				' . $__compilerTemp1 . '
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
	' . '

	' . $__templater->renderExtension('main_cell', $__vars, $__extensions) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);