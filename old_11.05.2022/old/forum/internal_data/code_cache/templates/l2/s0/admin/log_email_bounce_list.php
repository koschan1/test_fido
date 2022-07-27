<?php
// FROM HASH: 12dd614f5557b935006142cdf1f3812f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Журнал отказов в доставке писем');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			';
	$__compilerTemp1 = '';
	$__compilerTemp2 = true;
	if ($__templater->isTraversable($__vars['bounces'])) {
		foreach ($__vars['bounces'] AS $__vars['bounce']) {
			$__compilerTemp2 = false;
			$__compilerTemp1 .= '
					';
			$__compilerTemp3 = '';
			if ($__vars['bounce']['User']) {
				$__compilerTemp3 .= '
								<a href="' . $__templater->func('link', array('users/edit', $__vars['bounce']['User'], ), true) . '"
									data-xf-init="tooltip"
									title="' . $__templater->escape($__vars['bounce']['User']['username']) . '">' . $__templater->escape($__vars['bounce']['recipient']) . '</a>
								';
			} else {
				$__compilerTemp3 .= '
								' . $__templater->escape($__vars['bounce']['recipient']) . '
							';
			}
			$__compilerTemp4 = '';
			if ($__vars['bounce']['message_type'] == 'bounce') {
				$__compilerTemp4 .= '
								<span data-xf-init="tooltip" title="' . $__templater->escape($__vars['bounce']['status_code']) . '">' . 'Отказ в доставке' . '</span>
							';
			} else if ($__vars['bounce']['message_type'] == 'delay') {
				$__compilerTemp4 .= '
								<span class="u-muted">' . 'Задержка' . '</span>
							';
			} else if ($__vars['bounce']['message_type'] == 'challenge') {
				$__compilerTemp4 .= '
								<span class="u-muted">' . 'Запрос' . '</span>
							';
			} else if ($__vars['bounce']['message_type'] == 'autoreply') {
				$__compilerTemp4 .= '
								<span class="u-muted">' . 'Автоответ' . '</span>
							';
			} else if ($__vars['bounce']['message_type'] == 'unknown') {
				$__compilerTemp4 .= '
								' . 'Неизвестно' . '
							';
			} else {
				$__compilerTemp4 .= '
								' . $__templater->escape($__vars['bounce']['message_type']) . '
							';
			}
			$__compilerTemp5 = '';
			if ($__vars['bounce']['action_taken'] == 'hard') {
				$__compilerTemp5 .= '
								' . 'Окончательный отказ в доставке' . '
							';
			} else if ($__vars['bounce']['action_taken'] == 'soft') {
				$__compilerTemp5 .= '
								' . 'Временный отказ в доставке записан в журнал' . '
							';
			} else if ($__vars['bounce']['action_taken'] == 'soft_hard') {
				$__compilerTemp5 .= '
								' . 'Слишком много временных отказов в доставке' . '
							';
			} else if ($__vars['bounce']['action_taken'] == 'untrusted') {
				$__compilerTemp5 .= '
								<span class="u-muted">' . 'Пропущено (недоверенный)' . '</span>
							';
			} else if ($__vars['bounce']['action_taken'] == '') {
				$__compilerTemp5 .= '
								<span class="u-muted">' . 'Нет' . '</span>
							';
			} else {
				$__compilerTemp5 .= '
								' . $__templater->escape($__vars['bounce']['action_taken']) . '
							';
			}
			$__compilerTemp1 .= $__templater->dataRow(array(
			), array(array(
				'_type' => 'cell',
				'html' => '
							' . $__compilerTemp3 . '
						',
			),
			array(
				'_type' => 'cell',
				'html' => '
							' . $__templater->func('date_dynamic', array($__vars['bounce']['log_date'], array(
			))) . '
						',
			),
			array(
				'_type' => 'cell',
				'html' => '
							' . $__compilerTemp4 . '
						',
			),
			array(
				'_type' => 'cell',
				'html' => '
							' . $__compilerTemp5 . '
						',
			),
			array(
				'href' => $__templater->func('link', array('logs/email-bounces', null, array('bounce_id' => $__vars['bounce']['bounce_id'], ), ), false),
				'_type' => 'action',
				'html' => '
							' . 'Посмотреть' . '
						',
			))) . '
					';
		}
	}
	if ($__compilerTemp2) {
		$__compilerTemp1 .= '
					' . $__templater->dataRow(array(
		), array(array(
			'colspan' => '5',
			'_type' => 'cell',
			'html' => 'В журнале нет записей.',
		))) . '
				';
	}
	$__finalCompiled .= $__templater->dataList('
				' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => 'Получатель',
	),
	array(
		'_type' => 'cell',
		'html' => 'Дата',
	),
	array(
		'_type' => 'cell',
		'html' => 'Тип',
	),
	array(
		'_type' => 'cell',
		'html' => 'Действие',
	),
	array(
		'class' => 'dataList-cell--min',
		'_type' => 'cell',
		'html' => '&nbsp;',
	))) . '

				' . $__compilerTemp1 . '
			', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
		</div>
		<div class="block-footer">
			<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['bounces'], $__vars['total'], ), true) . '</span>
		</div>
	</div>
	' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'logs/email-bounces',
		'params' => $__vars['linkFilters'],
		'wrapperclass' => 'block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
</div>
';
	return $__finalCompiled;
}
);