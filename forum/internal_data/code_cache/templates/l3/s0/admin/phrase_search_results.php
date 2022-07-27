<?php
// FROM HASH: b0d6062ab05314983df5704c1881f482
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Результаты поиска фраз' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['language']['title']));
	$__finalCompiled .= '

<div class="block">
	<div class="block-outer">
		' . $__templater->callMacro('filter_macros', 'quick_filter', array(
		'class' => 'block-outer-opposite',
	), $__vars) . '
	</div>
	<div class="block-container">
		' . $__templater->callMacro(null, 'filter_macros::filter_bar', array(
		'route' => 'phrases/search',
		'params' => $__vars['linkParams'],
		'displayValues' => $__vars['filterDisplay'],
		'phrases' => array('key:addon_id' => 'Плагин' . $__vars['xf']['language']['label_separator'], 'key:title' => 'Название содержит' . $__vars['xf']['language']['label_separator'], 'key:text' => 'Текст содержит' . $__vars['xf']['language']['label_separator'], 'key:text_cs' => 'Учитывать регистр', 'key:state' => 'Статус фразы' . $__vars['xf']['language']['label_separator'], 'val:_none' => 'Нет', 'val:default' => 'Без изменений', 'val:inherited' => 'Переведена в родительском языке', 'val:custom' => 'Переведена в этом языке', ),
		'menu' => 'phrases/refine-search',
		'menuTitle' => 'Уточнить и перевести',
	), $__vars) . '


		';
	if (!$__templater->test($__vars['phrases'], 'empty', array())) {
		$__finalCompiled .= '
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__vars['total'] > $__templater->func('count', array($__vars['phrases'], ), false)) {
			$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
				'rowclass' => 'dataList-row--note dataList-row--noHover',
			), array(array(
				'colspan' => '2',
				'_type' => 'cell',
				'html' => 'Есть несколько записей, соответствующих Вашему фильтру. Пожалуйста, уточните запрос.',
			))) . '
					';
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->callMacro('phrase_list', 'phrase_list', array(
			'phrases' => $__vars['phrases'],
			'language' => $__vars['language'],
		), $__vars) . '
					' . $__compilerTemp1 . '
				', array(
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__templater->func('count', array($__vars['phrases'], ), false), $__vars['total'], ), true) . '</span>
			</div>
		';
	} else {
		$__finalCompiled .= '
			<div class="block-body block-row">' . 'Результатов не найдено.' . '</div>
		';
	}
	$__finalCompiled .= '
	</div>
</div>';
	return $__finalCompiled;
}
);