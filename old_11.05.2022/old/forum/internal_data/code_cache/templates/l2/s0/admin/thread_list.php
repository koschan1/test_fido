<?php
// FROM HASH: e7d8751ca48619147e2f5ae343eb1c7a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Темы');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['threads'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = array();
		if ($__vars['showingAll']) {
			$__compilerTemp1[] = array(
				'class' => 'dataList-cell--min',
				'_type' => 'cell',
				'html' => '
								' . $__templater->formCheckBox(array(
				'standalone' => 'true',
			), array(array(
				'check-all' => '.dataList >',
				'data-xf-init' => 'tooltip',
				'title' => 'Выбрать все',
				'_type' => 'option',
			))) . '
							',
			);
		}
		$__compilerTemp1[] = array(
			'colspan' => '1',
			'_type' => 'cell',
			'html' => 'Заголовок',
		);
		$__compilerTemp1[] = array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Тип',
		);
		$__compilerTemp1[] = array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Раздел',
		);
		$__compilerTemp1[] = array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Автор темы',
		);
		$__compilerTemp1[] = array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Ответы',
		);
		$__compilerTemp1[] = array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Последнее сообщение',
		);
		$__compilerTemp2 = '';
		if ($__templater->isTraversable($__vars['threads'])) {
			foreach ($__vars['threads'] AS $__vars['thread']) {
				$__compilerTemp2 .= '
						';
				$__compilerTemp3 = array();
				if ($__vars['showingAll']) {
					$__compilerTemp3[] = array(
						'name' => 'thread_ids[]',
						'value' => $__vars['thread']['thread_id'],
						'selected' => true,
						'_type' => 'toggle',
						'html' => '',
					);
				}
				$__compilerTemp3[] = array(
					'href' => $__templater->func('link_type', array('public', 'threads', $__vars['thread'], ), false),
					'label' => $__templater->escape($__vars['thread']['title']),
					'_type' => 'main',
					'html' => '',
				);
				$__compilerTemp3[] = array(
					'class' => 'dataList-cell--min',
					'_type' => 'cell',
					'html' => '
								' . $__templater->escape($__templater->method($__vars['thread']['TypeHandler'], 'getTypeTitle', array())) . '
							',
				);
				$__compilerTemp3[] = array(
					'class' => 'dataList-cell--min',
					'_type' => 'cell',
					'html' => '
								' . $__templater->escape($__vars['thread']['Forum']['title']) . '
							',
				);
				$__compilerTemp3[] = array(
					'class' => 'dataList-cell--min',
					'_type' => 'cell',
					'html' => '
								' . $__templater->escape($__vars['thread']['username']) . '
							',
				);
				$__compilerTemp3[] = array(
					'class' => 'dataList-cell--min',
					'_type' => 'cell',
					'html' => '
								' . $__templater->filter($__vars['thread']['reply_count'], array(array('number', array()),), true) . '
							',
				);
				$__compilerTemp3[] = array(
					'class' => 'dataList-cell--min',
					'_type' => 'cell',
					'html' => '
								' . $__templater->func('date_dynamic', array($__vars['thread']['last_post_date'], array(
				))) . '
							',
				);
				$__compilerTemp2 .= $__templater->dataRow(array(
				), $__compilerTemp3) . '
					';
			}
		}
		$__compilerTemp4 = '';
		if ($__vars['filter'] AND ($__vars['total'] > $__vars['perPage'])) {
			$__compilerTemp4 .= '
						' . $__templater->dataRow(array(
				'rowclass' => 'dataList-row--note dataList-row--noHover js-filterForceShow',
			), array(array(
				'colspan' => '3',
				'_type' => 'cell',
				'html' => 'Есть несколько записей, соответствующих Вашему фильтру. Пожалуйста, уточните запрос.',
			))) . '
					';
		}
		$__compilerTemp5 = '';
		if ($__vars['showAll']) {
			$__compilerTemp5 .= '
					<span class="block-footer-controls">
						<a href="' . $__templater->func('link', array('threads/list', null, array('criteria' => $__vars['criteria'], 'all' => true, ), ), true) . '">' . 'Показать все элементы' . '</a>
					</span>
				';
		} else if ($__vars['showingAll']) {
			$__compilerTemp5 .= '
					<span class="block-footer-controls">' . $__templater->button('Пакетное обновление', array(
				'type' => 'submit',
			), '', array(
			)) . '</span>
				';
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), $__compilerTemp1) . '
					' . $__compilerTemp2 . '
					' . $__compilerTemp4 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['threads'], $__vars['total'], ), true) . '</span>
				<span class="block-footer-select">' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '.dataList',
			'label' => 'Выбрать все',
			'_type' => 'option',
		))) . '</span>
				' . $__compilerTemp5 . '
			</div>
		</div>

		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'threads/list',
			'params' => array('criteria' => $__vars['criteria'], 'order' => $__vars['order'], 'direction' => $__vars['direction'], ),
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	', array(
			'action' => $__templater->func('link', array('threads/batch-update/confirm', ), false),
			'class' => 'block',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Нет совпадений.' . '</div>
';
	}
	return $__finalCompiled;
}
);