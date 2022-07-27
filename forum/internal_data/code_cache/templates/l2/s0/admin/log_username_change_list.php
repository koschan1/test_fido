<?php
// FROM HASH: aae6a5a3542f624f4f70cb7cff012de8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Журнал изменений имени пользователя');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	$__compilerTemp2 = true;
	if ($__templater->isTraversable($__vars['entries'])) {
		foreach ($__vars['entries'] AS $__vars['entry']) {
			$__compilerTemp2 = false;
			$__compilerTemp1 .= '
					';
			$__compilerTemp3 = '';
			if ($__vars['entry']['change_reason']) {
				$__compilerTemp3 .= '
								<a role="button"
									tabindex="0"
									data-xf-init="tooltip"
									data-trigger="hover focus click"
									title="' . 'Причина изменения' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['entry']['change_reason']) . '">' . trim('
									' . $__templater->fontAwesome('fa-info-circle', array(
				)) . '
								') . '</a>
							';
			}
			$__compilerTemp4 = '';
			if ($__vars['entry']['change_state'] == 'approved') {
				$__compilerTemp4 .= '
								' . 'Одобрено' . '
							';
			} else if ($__vars['entry']['change_state'] == 'moderated') {
				$__compilerTemp4 .= '
								' . 'Ожидает одобрения' . '
							';
			} else if ($__vars['entry']['change_state'] == 'rejected') {
				$__compilerTemp4 .= '
								' . 'Отказано' . '
								';
				if ($__vars['entry']['reject_reason']) {
					$__compilerTemp4 .= '
									<a role="button"
										tabindex="0"
										data-xf-init="tooltip"
										data-trigger="hover focus click"
										title="' . 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['entry']['reject_reason']) . '">' . trim('
										' . $__templater->fontAwesome('fa-info-circle', array(
					)) . '
									') . '</a>
								';
				}
				$__compilerTemp4 .= '
							';
			}
			$__compilerTemp1 .= $__templater->dataRow(array(
				'rowclass' => 'dataList-row--noHover',
			), array(array(
				'class' => 'dataList-cell--min dataList-cell--image dataList-cell--imageSmall',
				'href' => $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), false),
				'data-xf-init' => 'tooltip',
				'title' => 'Текущее имя пользователя' . $__vars['xf']['language']['label_separator'] . ' ' . $__vars['entry']['User']['username'],
				'_type' => 'cell',
				'html' => '
							' . $__templater->func('avatar', array($__vars['entry']['User'], 's', false, array(
				'href' => '',
			))) . '
						',
			),
			array(
				'_type' => 'cell',
				'html' => '
							' . $__templater->escape($__vars['entry']['old_username']) . '
						',
			),
			array(
				'_type' => 'cell',
				'html' => '
							' . $__templater->escape($__vars['entry']['new_username']) . '
							' . $__compilerTemp3 . '
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
							' . $__templater->func('date_dynamic', array($__vars['entry']['change_date'], array(
			))) . '
						',
			),
			array(
				'name' => 'visible[' . $__vars['entry']['change_id'] . ']',
				'selected' => $__vars['entry']['visible'],
				'class' => 'dataList-cell--separated',
				'submit' => 'true',
				'tooltip' => 'Переключить видимость',
				'_type' => 'toggle',
				'html' => '',
			),
			array(
				'href' => $__templater->func('link', array('logs/username-change', $__vars['entry'], ), false),
				'overlay' => 'true',
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
			'colspan' => '7',
			'_type' => 'cell',
			'html' => 'В журнале нет записей.',
		))) . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->dataList('
				' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'class' => 'dataList-cell--min',
		'_type' => 'cell',
		'html' => '&nbsp;',
	),
	array(
		'_type' => 'cell',
		'html' => 'Старое имя пользователя',
	),
	array(
		'_type' => 'cell',
		'html' => 'Новое имя пользователя',
	),
	array(
		'_type' => 'cell',
		'html' => 'Статус изменения',
	),
	array(
		'_type' => 'cell',
		'html' => 'Дата',
	),
	array(
		'class' => 'dataList-cell--min',
		'colspan' => '2',
		'_type' => 'cell',
		'html' => '&nbsp;',
	))) . '

				' . $__compilerTemp1 . '
			', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
		</div>
	</div>
	' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'logs/username-change',
		'wrapperclass' => 'block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
', array(
		'action' => $__templater->func('link', array('logs/username-change/toggle', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);