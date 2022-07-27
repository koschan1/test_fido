<?php
// FROM HASH: b26b23e3ecde9fbcb5a74a2811cd19d3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Предупреждения');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Добавить предупреждение', array(
		'href' => $__templater->func('link', array('warnings/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
	' . $__templater->button('Добавить действие за предупреждение', array(
		'href' => $__templater->func('link', array('warnings/actions/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

<div class="block">
	<div class="block-outer">
		' . $__templater->callMacro('filter_macros', 'quick_filter', array(
		'key' => 'warnings',
		'class' => 'block-outer-opposite',
	), $__vars) . '
	</div>
	<div class="block-container">
		<div class="block-body">
			';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['warnings'])) {
		foreach ($__vars['warnings'] AS $__vars['warning']) {
			$__compilerTemp1 .= '
					';
			$__compilerTemp2 = '';
			if ($__vars['warning']['expiry_default'] == 'never') {
				$__compilerTemp2 .= '
										' . 'Никогда' . '
									';
			} else {
				$__compilerTemp2 .= '
										' . $__templater->func('duration', array(($__vars['warning']['expiry_default'] ? $__vars['warning']['expiry_default'] : 1), $__vars['warning']['expiry_type'], ), true) . '
									';
			}
			$__compilerTemp1 .= $__templater->dataRow(array(
				'label' => $__templater->escape($__vars['warning']['title']),
				'href' => $__templater->func('link', array('warnings/edit', $__vars['warning'], ), false),
				'delete' => $__templater->func('link', array('warnings/delete', $__vars['warning'], ), false),
				'explain' => '
							<ul class="listInline listInline--bullet listInline--selfInline">
								<li>' . 'Баллы за нарушения' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['warning']['points_default']) . '</li>
								<li>' . 'Истекает' . $__vars['xf']['language']['label_separator'] . '
									' . $__compilerTemp2 . '</li>
							</ul>
						',
			), array()) . '
				';
		}
	}
	$__finalCompiled .= $__templater->dataList('
				' . $__compilerTemp1 . '
			', array(
	)) . '
		</div>
		<div class="block-footer">
			<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['warnings'], ), true) . '</span>
		</div>
	</div>
</div>

';
	if (!$__templater->test($__vars['actions'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">' . 'Действия за предупреждения' . '</h2>
			<div class="block-body">
				';
		$__compilerTemp3 = '';
		if ($__templater->isTraversable($__vars['actions'])) {
			foreach ($__vars['actions'] AS $__vars['action']) {
				$__compilerTemp3 .= '
						';
				$__compilerTemp4 = '';
				if ($__vars['action']['action'] == 'ban') {
					$__compilerTemp4 .= '
												<li>' . 'Заблокировать' . '</li>
											';
				} else if ($__vars['action']['action'] == 'discourage') {
					$__compilerTemp4 .= '
												<li>' . 'Добавить к нежелательным пользователям' . '</li>
											';
				} else if ($__vars['action']['action'] == 'groups') {
					$__compilerTemp4 .= '
												<li>' . 'Добавить в выбранные группы' . '</li>
											';
				} else {
					$__compilerTemp4 .= '
												<li>' . 'Неизвестное действие' . '</li>
											';
				}
				$__compilerTemp5 = '';
				if ($__vars['action']['action_length_type'] == 'permanent') {
					$__compilerTemp5 .= '
												<li>' . 'Постоянно' . '</li>
											';
				} else if ($__vars['action']['action_length_type'] == 'points') {
					$__compilerTemp5 .= '
												<li>' . 'Пока на уровне или выше порога баллов' . '</li>
											';
				} else {
					$__compilerTemp5 .= '
												<li>' . 'Временно' . '</li>
											';
				}
				$__compilerTemp3 .= $__templater->dataRow(array(
				), array(array(
					'href' => $__templater->func('link', array('warnings/actions/edit', $__vars['action'], ), false),
					'_type' => 'cell',
					'html' => '
								<div class="dataList-mainRow">
									' . 'Баллы' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['action']['points']) . '
									<div class="dataList-hint" dir="auto">
										<ul class="listInline listInline--bullet listInline--selfInline">
											' . $__compilerTemp4 . '

											' . $__compilerTemp5 . '
										</ul>
									</div>
								</div>
							',
				),
				array(
					'href' => $__templater->func('link', array('warnings/actions/delete', $__vars['action'], ), false),
					'_type' => 'delete',
					'html' => '',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__compilerTemp3 . '
				', array(
		)) . '
			</div>
			<!--<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['actions'], ), true) . '</span>
			</div>-->
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);