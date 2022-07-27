<?php
// FROM HASH: 37aa897ad3d32fd432309415bc371e86
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Устаревшие шаблоны');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Изменённые шаблоны становятся устаревшими, когда их последнее изменение было раньше обновления шаблона, на котором они основаны (родительский шаблон). Эти шаблоны должны быть обновлены, чтобы гарантировать корректную работу новых функций и исправления возможных ошибок. При использовании стороннего стиля можно установить новую версию для обновления шаблонов.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['autoMerged']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'Все автоматически объединяемые шаблоны были обработаны. Все оставшиеся шаблоны должны быть обработаны вручную.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['total']) {
		$__compilerTemp1 .= '
		' . $__templater->button('Авто-объединение', array(
			'href' => $__templater->func('link', array('templates/auto-merge', ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Изменённые компоненты', array(
		'href' => $__templater->func('link', array('styles/customized-components', ), false),
	), '', array(
	)) . '
	' . $__compilerTemp1 . '
');
	$__finalCompiled .= '

';
	if ($__vars['total']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-outer">
			' . $__templater->callMacro('filter_macros', 'quick_filter', array(
			'key' => 'outdated-templates',
			'class' => 'block-outer-opposite',
		), $__vars) . '
		</div>
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp2 = '';
		$__compilerTemp3 = $__templater->method($__vars['styleTree'], 'getFlattened', array(0, ));
		if ($__templater->isTraversable($__compilerTemp3)) {
			foreach ($__compilerTemp3 AS $__vars['treeEntry']) {
				$__compilerTemp2 .= '
						';
				$__vars['style'] = $__vars['treeEntry']['record'];
				$__compilerTemp2 .= '
						';
				$__vars['outdatedForStyle'] = $__vars['outdatedGrouped'][$__vars['style']['style_id']];
				$__compilerTemp2 .= '
						';
				if (!$__templater->test($__vars['outdatedForStyle'], 'empty', array())) {
					$__compilerTemp2 .= '
							' . $__templater->dataRow(array(
						'rowtype' => 'subsection',
						'rowclass' => 'dataList-row--noHover',
					), array(array(
						'colspan' => '2',
						'_type' => 'cell',
						'html' => $__templater->escape($__vars['style']['title']),
					))) . '
							';
					if ($__templater->isTraversable($__vars['outdatedForStyle'])) {
						foreach ($__vars['outdatedForStyle'] AS $__vars['outdated']) {
							$__compilerTemp2 .= '
								';
							$__compilerTemp4 = '';
							if ($__vars['outdated']['outdated_by_date']) {
								$__compilerTemp4 .= '
													<li>' . 'Последнее редактирование' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['outdated']['template']['last_edit_date'], array(
								))) . '</li>
													<li>' . 'Последнее редактирование родительского стиля' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['outdated']['parent_last_edit_date'], array(
								))) . '</li>
												';
							} else if ($__vars['outdated']['outdated_by_version']) {
								$__compilerTemp4 .= '
													<li>' . 'Пользовательская версия' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['outdated']['template']['version_string']) . '</li>
													<li>' . 'Родительская версия' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['outdated']['parent_version_string']) . '</li>
												';
							}
							$__compilerTemp2 .= $__templater->dataRow(array(
							), array(array(
								'href' => $__templater->func('link', array('templates/edit', $__vars['outdated']['template'], ), false),
								'class' => 'dataList-cell--main',
								'_type' => 'cell',
								'html' => '
										<div class="dataList-mainRow" dir="auto">' . $__templater->escape($__vars['outdated']['template']['title']) . '</div>
										<div class="dataList-subRow">
											<ul class="listInline listInline--bullet">
												' . $__compilerTemp4 . '
											</ul>
										</div>
									',
							),
							array(
								'href' => $__templater->func('link', array('templates/merge-outdated', $__vars['outdated']['template'], ), false),
								'_type' => 'action',
								'html' => 'Объеденить',
							))) . '
							';
						}
					}
					$__compilerTemp2 .= '
						';
				}
				$__compilerTemp2 .= '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__compilerTemp2 . '
				', array(
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['total'], ), true) . '</span>
			</div>
		</div>
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Устаревшие шаблоны отсутствуют.' . '</div>
';
	}
	return $__finalCompiled;
}
);