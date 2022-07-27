<?php
// FROM HASH: b245aa867487f8e77f5c8da0faa7ca64
return array(
'macros' => array('poll_block' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'poll' => '!',
		'showVoteBlock' => false,
		'simpleDisplay' => false,
		'forceTitle' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__vars['simpleDisplay']) {
		$__compilerTemp1 .= '
					<a href="' . $__templater->escape($__templater->method($__vars['poll'], 'getLink', array('content', ))) . '">' . ($__templater->escape($__vars['forceTitle']) ?: $__templater->escape($__vars['poll']['question'])) . '</a>
				';
	} else {
		$__compilerTemp1 .= '
					' . $__templater->fontAwesome('fa-chart-bar', array(
		)) . ' ' . ($__templater->escape($__vars['forceTitle']) ?: $__templater->escape($__vars['poll']['question'])) . '
					';
		if ($__templater->method($__vars['poll'], 'canEdit', array())) {
			$__compilerTemp1 .= '
						' . $__templater->button('', array(
				'href' => $__templater->method($__vars['poll'], 'getLink', array('edit', )),
				'class' => 'button--link button--small u-pullRight',
				'overlay' => 'true',
				'icon' => 'edit',
			), '', array(
			)) . '
					';
		}
		$__compilerTemp1 .= '
				';
	}
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['poll'], 'canVote', array()) AND ($__vars['showVoteBlock'] OR (!$__templater->method($__vars['poll'], 'hasVoted', array())))) {
		$__compilerTemp2 .= '
				' . $__templater->callMacro(null, 'vote', array(
			'poll' => $__vars['poll'],
		), $__vars) . '
			';
	} else {
		$__compilerTemp2 .= '
				' . $__templater->callMacro(null, 'result', array(
			'poll' => $__vars['poll'],
			'simpleDisplay' => $__vars['simpleDisplay'],
		), $__vars) . '
			';
	}
	$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<h2 class="' . ($__vars['simpleDisplay'] ? 'block-minorHeader' : 'block-header') . '">
				' . $__compilerTemp1 . '
			</h2>
			' . $__compilerTemp2 . '
		</div>
		' . $__templater->formHiddenVal('simple_display', $__vars['simpleDisplay'], array(
	)) . '
	', array(
		'action' => $__templater->method($__vars['poll'], 'getLink', array('vote', )),
		'ajax' => 'true',
		'class' => 'block js-pollContainer-' . $__vars['poll']['poll_id'],
		'data-xf-init' => 'poll-block',
	)) . '
';
	return $__finalCompiled;
}
),
'vote' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'poll' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="block-body">
		<div class="block-row">
			';
	if ($__vars['poll']['max_votes'] == 1) {
		$__finalCompiled .= '
				';
		$__compilerTemp1 = array();
		if ($__templater->isTraversable($__vars['poll']['responses'])) {
			foreach ($__vars['poll']['responses'] AS $__vars['responseId'] => $__vars['response']) {
				$__compilerTemp1[] = array(
					'value' => $__vars['responseId'],
					'label' => $__templater->filter($__vars['response']['response'], array(array('censor', array()),), true),
					'_type' => 'option',
				);
			}
		}
		$__finalCompiled .= $__templater->formRadio(array(
			'name' => 'responses[]',
		), $__compilerTemp1) . '
			';
	} else {
		$__finalCompiled .= '
				';
		$__compilerTemp2 = array();
		if ($__templater->isTraversable($__vars['poll']['responses'])) {
			foreach ($__vars['poll']['responses'] AS $__vars['responseId'] => $__vars['response']) {
				$__compilerTemp2[] = array(
					'value' => $__vars['responseId'],
					'label' => $__templater->filter($__vars['response']['response'], array(array('censor', array()),), true),
					'_type' => 'option',
				);
			}
		}
		$__finalCompiled .= $__templater->formCheckBox(array(
			'name' => 'responses[]',
		), $__compilerTemp2) . '
			';
	}
	$__finalCompiled .= '
		</div>
		';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
					';
	if ($__vars['poll']['close_date']) {
		$__compilerTemp3 .= '
						';
		if (!$__templater->method($__vars['poll'], 'isClosed', array())) {
			$__compilerTemp3 .= '
							<li>' . 'Этот опрос будет закрыт' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['poll']['close_date'], array(
			))) . '.</li>
						';
		} else {
			$__compilerTemp3 .= '
							<li>' . 'Опрос закрыт' . ' ' . $__templater->func('date_dynamic', array($__vars['poll']['close_date'], array(
			))) . '.</li>
						';
		}
		$__compilerTemp3 .= '
					';
	}
	$__compilerTemp3 .= '
					';
	if ($__vars['poll']['max_votes'] != 1) {
		$__compilerTemp3 .= '
						<li>' . 'Можно выбрать несколько вариантов.' . '</li>
					';
	}
	$__compilerTemp3 .= '
					';
	if ($__vars['poll']['public_votes']) {
		$__compilerTemp3 .= '
						<li>' . 'Другие смогут видеть, как Вы проголосовали.' . '</li>
					';
	}
	$__compilerTemp3 .= '
				';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
			<hr class="block-separator" />
			<div class="block-row block-row--minor">
				<ul class="listInline">
				' . $__compilerTemp3 . '
				</ul>
			</div>
		';
	}
	$__finalCompiled .= '
	</div>
	<div class="block-footer">
		<span class="block-footer-controls">
			' . $__templater->button('Проголосовать', array(
		'type' => 'submit',
		'class' => 'button--primary',
		'icon' => 'vote',
	), '', array(
	)) . '
			';
	if ($__templater->method($__vars['poll'], 'canViewResults', array())) {
		$__finalCompiled .= '
				' . $__templater->button('Результаты', array(
			'href' => $__templater->method($__vars['poll'], 'getLink', array('results', )),
			'overlay' => 'true',
			'icon' => 'result',
			'rel' => 'nofollow',
		), '', array(
		)) . '
			';
	}
	$__finalCompiled .= '
		</span>
	</div>
';
	return $__finalCompiled;
}
),
'result' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'poll' => '!',
		'simpleDisplay' => false,
		'showFooter' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->includeCss('poll.less');
	$__finalCompiled .= '
	';
	$__vars['canViewResults'] = $__templater->method($__vars['poll'], 'canViewResults', array());
	$__finalCompiled .= '

	<div class="block-body">
		<ul class="listPlain">
		';
	if ($__templater->isTraversable($__vars['poll']['responses'])) {
		foreach ($__vars['poll']['responses'] AS $__vars['responseId'] => $__vars['response']) {
			$__finalCompiled .= '
			<li>
				';
			$__vars['canShowVoters'] = ($__vars['canViewResults'] AND ($__vars['poll']['public_votes'] AND ($__vars['response']['response_vote_count'] AND (!$__vars['simpleDisplay']))));
			$__finalCompiled .= '
				<div class="' . ($__vars['canShowVoters'] ? 'fauxBlockLink' : '') . '">
					<div class="pollResult ' . ($__vars['simpleDisplay'] ? 'pollResult--simple' : '') . ' ' . ($__templater->method($__vars['poll'], 'hasVoted', array($__vars['responseId'], )) ? 'pollResult--voted' : '') . ' ' . ($__vars['canShowVoters'] ? 'pollResult--showVoters' : '') . '">
						<h3 class="pollResult-response">' . $__templater->filter($__vars['response']['response'], array(array('censor', array()),), true) . '</h3>
						';
			if ($__vars['canViewResults']) {
				$__finalCompiled .= '
							<span class="pollResult-votes">
								';
				if ($__vars['canShowVoters']) {
					$__finalCompiled .= '
									<a class="fauxBlockLink-blockLink"
										data-xf-click="toggle"
										data-target=".js-pollResultVoters-' . $__templater->escape($__vars['responseId']) . '"
										role="button"
										tabindex="0">
										<span class="u-muted">' . 'Голосов' . $__vars['xf']['language']['label_separator'] . '</span> ' . $__templater->filter($__vars['response']['response_vote_count'], array(array('number', array()),), true) . '
									</a>
								';
				} else {
					$__finalCompiled .= '
									<span class="u-muted">' . 'Голосов' . $__vars['xf']['language']['label_separator'] . '</span> ' . $__templater->filter($__vars['response']['response_vote_count'], array(array('number', array()),), true) . '
								';
				}
				$__finalCompiled .= '
							</span>
							<span class="pollResult-percentage">
								' . $__templater->filter($__templater->method($__vars['poll'], 'getVotePercentage', array($__vars['response']['response_vote_count'], )), array(array('number', array(1, )),), true) . '%
							</span>
							<span class="pollResult-graph" aria-hidden="true">
								<span class="pollResult-bar">';
				if ($__vars['response']['response_vote_count']) {
					$__finalCompiled .= '
									<i style="width: ' . $__templater->escape($__templater->method($__vars['poll'], 'getVotePercentage', array($__vars['response']['response_vote_count'], ))) . '%"></i>
								';
				}
				$__finalCompiled .= '</span>
							</span>
						';
			}
			$__finalCompiled .= '
					</div>
				</div>
				';
			if ($__vars['canShowVoters']) {
				$__finalCompiled .= '
					<div class="pollResult-voters js-pollResultVoters-' . $__templater->escape($__vars['responseId']) . ' toggleTarget"
						data-href="' . $__templater->escape($__templater->method($__vars['poll'], 'getLink', array('results', array('response' => $__vars['responseId'], ), ))) . '"
						data-load-selector=".js-pollVoters"></div>
				';
			}
			$__finalCompiled .= '
			</li>
		';
		}
	}
	$__finalCompiled .= '
		</ul>
		';
	if (!$__vars['canViewResults']) {
		$__finalCompiled .= '
			<hr class="block-separator" />
			<div class="block-row block-row--minor">
				<span class="u-muted">' . 'Результаты видны после голосования.' . '</span>
			</div>
		';
	} else if (!$__vars['simpleDisplay']) {
		$__finalCompiled .= '
			<hr class="block-separator" />
			<div class="block-row block-row--minor">
				<ul class="listInline listInline--bullet">
					<li>
						<dl class="pairs pairs--inline">
							<dt>' . 'Всего проголосовало' . '</dt>
							<dd>' . $__templater->filter($__vars['poll']['voter_count'], array(array('number', array()),), true) . '</dd>
						</dl>
					</li>
					';
		if ($__vars['poll']['close_date']) {
			$__finalCompiled .= '
						';
			if (!$__templater->method($__vars['poll'], 'isClosed', array())) {
				$__finalCompiled .= '
							<li>' . 'Этот опрос будет закрыт' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['poll']['close_date'], array(
				))) . '.</li>
						';
			} else {
				$__finalCompiled .= '
							<li>' . 'Опрос закрыт' . ' ' . $__templater->func('date_dynamic', array($__vars['poll']['close_date'], array(
				))) . '.</li>
						';
			}
			$__finalCompiled .= '
					';
		}
		$__finalCompiled .= '
				</ul>
			</div>
		';
	}
	$__finalCompiled .= '
	</div>
	';
	if ($__vars['showFooter']) {
		$__finalCompiled .= '
		';
		$__compilerTemp1 = '';
		$__compilerTemp1 .= '
				';
		if ($__vars['simpleDisplay']) {
			$__compilerTemp1 .= '
					<a href="' . $__templater->escape($__templater->method($__vars['poll'], 'getLink', array('content', ))) . '">' . 'Смотреть обсуждение' . $__vars['xf']['language']['ellipsis'] . '</a>
				';
		} else {
			$__compilerTemp1 .= '
					';
			if ($__templater->method($__vars['poll'], 'canVote', array()) AND $__templater->method($__vars['poll'], 'hasVoted', array())) {
				$__compilerTemp1 .= '
						<span class="block-footer-controls">' . $__templater->button('
							' . 'Изменить голос' . '
						', array(
					'href' => $__templater->method($__vars['poll'], 'getLink', array('vote', )),
					'data-xf-click' => 'inserter',
					'data-replace' => '.js-pollContainer-' . $__vars['poll']['poll_id'],
				), '', array(
				)) . '</span>
					';
			}
			$__compilerTemp1 .= '
				';
		}
		$__compilerTemp1 .= '
			';
		if (strlen(trim($__compilerTemp1)) > 0) {
			$__finalCompiled .= '
			<div class="block-footer">
			' . $__compilerTemp1 . '
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'add_edit_inputs' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'poll' => null,
		'draft' => array(),
		'rowType' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ((!$__vars['poll']) OR $__templater->method($__vars['poll'], 'canEditDetails', array())) {
		$__finalCompiled .= '
		' . $__templater->formTextBoxRow(array(
			'name' => 'poll[question]',
			'value' => ($__vars['draft']['question'] ?: $__vars['poll']['question']),
			'maxlength' => $__templater->func('max_length', array('XF:Poll', 'question', ), false),
		), array(
			'rowtype' => $__vars['rowType'] . '}',
			'label' => 'Вопрос',
		)) . '

	';
	} else {
		$__finalCompiled .= '
		' . $__templater->formRow($__templater->escape($__vars['poll']['question']), array(
			'label' => 'Вопрос',
			'rowtype' => $__vars['rowType'] . '}',
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	$__vars['responsesId'] = $__templater->func('unique_id', array(), false);
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__vars['poll']) {
		$__compilerTemp1 .= '
				';
		if ($__templater->isTraversable($__vars['poll']['Responses'])) {
			foreach ($__vars['poll']['Responses'] AS $__vars['response']) {
				$__compilerTemp1 .= '
					<li>
						';
				if ($__templater->method($__vars['poll'], 'canEditDetails', array())) {
					$__compilerTemp1 .= '
							' . $__templater->formTextBox(array(
						'name' => 'poll[existing_responses][' . $__vars['response']['poll_response_id'] . ']',
						'value' => $__vars['response']['response'],
						'maxlength' => $__templater->func('max_length', array('XF:PollResponse', 'response', ), false),
						'aria-label' => $__templater->filter('Вариант ответа', array(array('for_attr', array()),), false),
						'placeholder' => $__templater->filter('Вариант ответа' . $__vars['xf']['language']['ellipsis'], array(array('for_attr', array()),), false),
					)) . '
						';
				} else {
					$__compilerTemp1 .= '
							' . $__templater->escape($__vars['response']['response']) . '
						';
				}
				$__compilerTemp1 .= '
					</li>
				';
			}
		}
		$__compilerTemp1 .= '
				';
		$__vars['remainingResponses'] = ($__vars['xf']['options']['pollMaximumResponses'] - $__templater->func('count', array($__vars['poll']['responses'], ), false));
		$__compilerTemp1 .= '
			';
	} else if ($__vars['draft']) {
		$__compilerTemp1 .= '
				';
		$__vars['count'] = 0;
		if ($__templater->isTraversable($__vars['draft']['new_responses'])) {
			foreach ($__vars['draft']['new_responses'] AS $__vars['response']) {
				if ($__vars['response']) {
					$__vars['count']++;
					$__compilerTemp1 .= '
					<li>
						' . $__templater->formTextBox(array(
						'name' => 'poll[new_responses][]',
						'value' => $__vars['response'],
						'maxlength' => $__templater->func('max_length', array('XF:PollResponse', 'response', ), false),
						'aria-label' => $__templater->filter('Вариант ответа', array(array('for_attr', array()),), false),
						'placeholder' => $__templater->filter('Вариант ответа' . $__vars['xf']['language']['ellipsis'], array(array('for_attr', array()),), false),
					)) . '
					</li>
				';
				}
			}
		}
		$__compilerTemp1 .= '
				';
		$__vars['remainingResponses'] = ($__vars['xf']['options']['pollMaximumResponses'] - $__vars['count']);
		$__compilerTemp1 .= '
			';
	} else {
		$__compilerTemp1 .= '
				';
		$__vars['remainingResponses'] = $__vars['xf']['options']['pollMaximumResponses'];
		$__compilerTemp1 .= '
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['remainingResponses'] > 0) {
		$__compilerTemp2 .= '
				<li data-xf-init="field-adder" data-remaining="' . ($__vars['remainingResponses'] - 1) . '">
					' . $__templater->formTextBox(array(
			'name' => 'poll[new_responses][]',
			'value' => '',
			'maxlength' => $__templater->func('max_length', array('XF:PollResponse', 'response', ), false),
			'aria-label' => $__templater->filter('Вариант ответа', array(array('for_attr', array()),), false),
			'placeholder' => $__templater->filter('Вариант ответа' . $__vars['xf']['language']['ellipsis'], array(array('for_attr', array()),), false),
		)) . '
				</li>
			';
	}
	$__finalCompiled .= $__templater->formRow('

		<ul class="inputList" role="group" aria-labelledby="' . $__templater->escape($__vars['responsesId']) . '">
			' . $__compilerTemp1 . '
			' . $__compilerTemp2 . '
		</ul>
	', array(
		'rowtype' => 'input ' . $__vars['rowType'],
		'label' => 'Возможные ответы',
		'labelid' => $__vars['responsesId'],
	)) . '

	';
	$__compilerTemp3 = array();
	if ((($__vars['draft'] AND ($__vars['draft']['max_votes_type'] == 'single')) OR (!$__vars['poll'])) OR ($__vars['poll']['max_votes'] == 1)) {
		$__compilerTemp3[] = array(
			'value' => 'single',
			'selected' => ((($__vars['draft'] AND ($__vars['draft']['max_votes_type'] == 'single')) OR ((!$__vars['draft']) AND (!$__vars['poll']['poll_id']))) OR ($__vars['poll']['max_votes'] == 1)),
			'label' => 'Один',
			'_type' => 'option',
		);
	}
	$__compilerTemp3[] = array(
		'value' => 'unlimited',
		'selected' => (($__vars['draft'] AND ($__vars['draft']['max_votes_type'] == 'unlimited')) OR ($__vars['poll'] AND ($__vars['poll']['max_votes'] == 0))),
		'label' => 'Без ограничения',
		'_type' => 'option',
	);
	$__compilerTemp3[] = array(
		'value' => 'number',
		'selected' => (($__vars['draft'] AND ($__vars['draft']['max_votes_value'] > 1)) OR ($__vars['poll']['max_votes'] > 1)),
		'_dependent' => array($__templater->formNumberBox(array(
		'name' => 'poll[max_votes_value]',
		'min' => '1',
		'max' => '255',
		'value' => ($__vars['draft']['max_votes_value'] ?: (($__vars['poll']['max_votes'] < 2) ? 2 : $__vars['poll']['max_votes'])),
	))),
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => 'poll[max_votes_type]',
	), $__compilerTemp3, array(
		'label' => 'Максимум разрешённых ответов',
		'explain' => 'Максимальное число ответов, которое пользователь может выбрать.',
		'rowtype' => $__vars['rowType'],
	)) . '

	';
	$__compilerTemp4 = array(array(
		'name' => 'poll[change_vote]',
		'selected' => ((($__vars['draft'] AND $__vars['draft']['change_vote']) OR (!$__vars['poll'])) OR $__vars['poll']['change_vote']),
		'label' => '
			' . 'Разрешить проголосовавшим изменять свои голоса' . '
		',
		'_type' => 'option',
	));
	if ((!$__vars['poll']) OR $__templater->method($__vars['poll'], 'canChangePollVisibility', array())) {
		$__compilerTemp4[] = array(
			'name' => 'poll[public_votes]',
			'selected' => (($__vars['draft'] AND $__vars['draft']['public_votes']) OR ($__vars['poll'] AND $__vars['poll']['public_votes'])),
			'label' => '
				' . 'Разрешить видеть всем, кто и как проголосовал' . '
			',
			'_type' => 'option',
		);
	}
	$__compilerTemp4[] = array(
		'name' => 'poll[view_results_unvoted]',
		'selected' => ((($__vars['draft'] AND $__vars['draft']['view_results_unvoted']) OR (!$__vars['poll'])) OR $__vars['poll']['view_results_unvoted']),
		'label' => '
			' . 'Разрешить видеть результаты без участия в голосовании' . '
		',
		'_type' => 'option',
	);
	if ($__vars['poll'] AND $__vars['poll']['close_date']) {
		$__compilerTemp4[] = array(
			'name' => 'poll[remove_close]',
			'selected' => $__vars['poll']['close_date'],
			'label' => '
				' . 'Закрыть опрос ' . $__templater->func('date_time', array($__vars['poll']['close_date'], ), true) . '' . '
			',
			'_type' => 'option',
		);
	} else {
		$__compilerTemp4[] = array(
			'name' => 'poll[close]',
			'selected' => $__vars['draft'] AND $__vars['draft']['close'],
			'label' => 'Закрыть этот опрос через' . $__vars['xf']['language']['label_separator'],
			'_dependent' => array('
					<div class="inputGroup">
						' . $__templater->formNumberBox(array(
			'name' => 'poll[close_length]',
			'value' => (($__vars['draft'] AND $__vars['draft']['close_length']) ? $__vars['draft']['close_length'] : 7),
			'min' => '1',
			'max' => '365',
		)) . '
						<span class="inputGroup-splitter"></span>
						' . $__templater->formSelect(array(
			'name' => 'poll[close_units]',
			'class' => 'input--autoSize',
		), array(array(
			'value' => 'hours',
			'selected' => $__vars['draft'] AND ($__vars['draft']['close_units'] == 'hours'),
			'label' => 'Часов',
			'_type' => 'option',
		),
		array(
			'value' => 'days',
			'selected' => ($__vars['draft'] AND ($__vars['draft']['close_units'] == 'days')) OR (!$__vars['draft']),
			'label' => 'Дней',
			'_type' => 'option',
		),
		array(
			'value' => 'weeks',
			'selected' => $__vars['draft'] AND ($__vars['draft']['close_units'] == 'weeks'),
			'label' => 'Недель',
			'_type' => 'option',
		),
		array(
			'value' => 'months',
			'selected' => $__vars['draft'] AND ($__vars['draft']['close_units'] == 'months'),
			'label' => 'Месяцев',
			'_type' => 'option',
		))) . '
					</div>
				'),
			'_type' => 'option',
		);
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), $__compilerTemp4, array(
		'label' => 'Настройки',
		'rowtype' => $__vars['rowType'],
	)) . '

';
	return $__finalCompiled;
}
),
'delete_block' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'poll' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'checked' => '1',
		'label' => 'Ничего не делать',
		'_type' => 'option',
	));
	if ($__vars['poll']['voter_count']) {
		$__compilerTemp1[] = array(
			'value' => 'reset',
			'label' => 'Сбросить все голоса',
			'_type' => 'option',
		);
	}
	$__compilerTemp1[] = array(
		'value' => 'remove',
		'label' => 'Удалить весь опрос',
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				<h2 class="block-header">' . 'Удалить опрос' . '</h2>

				' . $__templater->formRadioRow(array(
		'name' => 'poll_action',
	), $__compilerTemp1, array(
	)) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
		</div>
	', array(
		'action' => $__templater->method($__vars['poll'], 'getLink', array('delete', )),
		'class' => 'block',
		'ajax' => 'true',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);