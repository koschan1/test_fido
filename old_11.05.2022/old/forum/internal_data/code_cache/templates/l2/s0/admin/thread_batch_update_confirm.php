<?php
// FROM HASH: f8c17ae74e1ac7b3fc36966a09cabb11
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Пакетное обновление тем');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['threadIds']) {
		$__compilerTemp1 .= '
					<span role="presentation" aria-hidden="true">&middot;</span>
					<a href="' . $__templater->func('link', array('threads/list', null, array('criteria' => $__vars['criteria'], 'all' => true, ), ), true) . '">' . 'Просмотр или фильтрация совпадений' . '</a>
				';
	}
	$__compilerTemp2 = array(array(
		'value' => '0',
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['forums'])) {
		foreach ($__vars['forums'] AS $__vars['forum']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['forum']['value'],
				'label' => $__templater->escape($__vars['forum']['label']),
				'disabled' => $__vars['forum']['disabled'],
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = '';
	if ($__vars['hasPrefixes']) {
		$__compilerTemp3 .= '
					' . 'Если выбранные темы имеет какие-либо префиксы, которые недоступны в выбранном разделе, эти префиксы будут удалены.' . '
				';
	}
	$__compilerTemp4 = array(array(
		'value' => '',
		'_type' => 'option',
	));
	$__compilerTemp4 = $__templater->mergeChoiceOptions($__compilerTemp4, $__vars['threadTypes']);
	$__compilerTemp5 = '';
	if ($__vars['prefixes']['prefixesGrouped']) {
		$__compilerTemp5 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'actions[apply_thread_prefix]',
			'label' => 'Установить префикс',
			'_dependent' => array('
							' . $__templater->callMacro('public:prefix_macros', 'select', array(
			'prefixes' => $__vars['prefixes']['prefixesGrouped'],
			'name' => 'actions[prefix_id]',
			'type' => 'thread',
		), $__vars) . '
						'),
			'_type' => 'option',
		)), array(
			'explain' => 'Префикс будет применён только в том случае, если он доступен для раздела, в котором находится тема или в который она будет перемещена.',
		)) . '
			';
	}
	$__compilerTemp6 = '';
	if ($__vars['threadIds']) {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('thread_ids', $__templater->filter($__vars['threadIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Обновить темы' . '</h2>
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . '
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Найденные темы',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'actions[node_id]',
	), $__compilerTemp2, array(
		'label' => 'Переместить в раздел',
		'explain' => $__compilerTemp3,
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'actions[discussion_type]',
	), $__compilerTemp4, array(
		'label' => 'Изменить тип темы',
		'explain' => 'Тип темы будет изменен только в том случае, если он корректен для раздела, в котором она находится или в который перемещается.',
	)) . '

			' . $__compilerTemp5 . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[stick]',
		'value' => 'stick',
		'label' => 'Закрепить темы',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unstick]',
		'value' => 'unstick',
		'label' => 'Открепить темы',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[lock]',
		'value' => 'lock',
		'label' => 'Закрыть темы',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unlock]',
		'value' => 'unlock',
		'label' => 'Открыть темы',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[approve]',
		'value' => 'approve',
		'label' => 'Одобрить темы',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unapprove]',
		'value' => 'unapprove',
		'label' => 'Отклонить темы',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[soft_delete]',
		'value' => 'soft_delete',
		'label' => 'Скрыть темы от публичного просмотра',
		'_type' => 'option',
	)), array(
	)) . '

		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Обновить темы',
		'icon' => 'save',
	), array(
	)) . '
	</div>

	' . $__compilerTemp6 . '
', array(
		'action' => $__templater->func('link', array('threads/batch-update/action', ), false),
		'class' => 'block',
	)) . '

';
	$__compilerTemp7 = '';
	if ($__vars['threadIds']) {
		$__compilerTemp7 .= '
		' . $__templater->formHiddenVal('thread_ids', $__templater->filter($__vars['threadIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp7 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Удалить темы' . '</h2>
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[delete]',
		'label' => '
					' . 'Подтвердите удаление ' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . ' тем' . '
				',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'name' => 'confirm_delete',
		'icon' => 'delete',
	), array(
	)) . '
	</div>

	' . $__compilerTemp7 . '
', array(
		'action' => $__templater->func('link', array('threads/batch-update/action', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);