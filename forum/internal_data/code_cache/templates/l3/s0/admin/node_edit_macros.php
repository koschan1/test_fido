<?php
// FROM HASH: 133411c74b6c23c0234e3a99e5727610
return array(
'macros' => array('title' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'node[title]',
		'value' => $__vars['node']['title'],
	), array(
		'label' => 'Заголовок',
	)) . '
';
	return $__finalCompiled;
}
),
'description' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextAreaRow(array(
		'name' => 'node[description]',
		'value' => $__vars['node']['description'],
		'autosize' => 'true',
	), array(
		'label' => 'Описание',
		'hint' => 'Можно использовать HTML',
		'explain' => 'Текст (или HTML-код), который вы вставите в это поле, должен иметь корректную разметку для последующей его вставки в тег &lt;p&gt;.',
	)) . '
';
	return $__finalCompiled;
}
),
'node_name' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'optional' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'node[node_name]',
		'value' => $__vars['node']['node_name'],
		'dir' => 'ltr',
	), array(
		'label' => 'Часть URL-адреса',
		'hint' => ($__vars['optional'] ? 'Не обязательно' : ''),
		'explain' => ($__vars['optional'] ? 'Если указано, то URL-адрес этого форума не будет содержать ID. Используйте только символы a-z, 0-9, знак подчёркивания (_) и дефис (-). Имейте в виду, что смена этого значения изменит все URL-адреса и старые ссылки перестанут работать.' : ''),
	)) . '
';
	return $__finalCompiled;
}
),
'position' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'nodeTree' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Нет' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['node_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'node[parent_node_id]',
		'value' => $__vars['node']['parent_node_id'],
	), $__compilerTemp1, array(
		'label' => 'Родительский узел',
	)) . '

	' . $__templater->callMacro('display_order_macros', 'row', array(
		'name' => 'node[display_order]',
		'value' => $__vars['node']['display_order'],
		'explain' => 'Позиция данного элемента по отношению к другим узлам в пределах того же родителя.',
	), $__vars) . '

	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'node[display_in_list]',
		'selected' => $__vars['node']['display_in_list'],
		'label' => 'Отображать в списке узлов',
		'hint' => 'Если не выбрано, пользователи не будут видеть этот узел в списке. Однако, если URL-адрес известен, они смогут получить к нему доступ.',
		'_type' => 'option',
	)), array(
	)) . '
';
	return $__finalCompiled;
}
),
'style' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'styleTree' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array();
	$__compilerTemp2 = $__templater->method($__vars['styleTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['style_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'style_override',
		'selected' => $__vars['node']['style_id'],
		'label' => 'Принудительно использовать стиль',
		'explain' => 'Если выбрано, то данный элемент будет отображаться всем посетителям с использованием выбранного стиля вне зависимости от их личных настроек.',
		'_dependent' => array($__templater->formSelect(array(
		'name' => 'node[style_id]',
		'value' => $__vars['node']['style_id'],
	), $__compilerTemp1)),
		'_type' => 'option',
	)), array(
	)) . '
';
	return $__finalCompiled;
}
),
'navigation' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'navChoices' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__vars['defaultValue'] = ($__vars['node']['Parent']['effective_navigation_id'] ?: 'forums');
	$__finalCompiled .= '
	';
	$__vars['defaultNav'] = $__vars['navChoices'][$__vars['defaultValue']];
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'value' => '',
		'label' => ('По умолчанию' . ($__vars['defaultNav'] ? ((' (' . $__templater->escape($__vars['defaultNav']['title'])) . ')') : '')),
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['navChoices'])) {
		foreach ($__vars['navChoices'] AS $__vars['nav']) {
			if ($__vars['nav']['navigation_id'] != '_default') {
				$__compilerTemp1[] = array(
					'value' => $__vars['nav']['navigation_id'],
					'label' => $__templater->escape($__vars['nav']['title']),
					'_type' => 'option',
				);
			}
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'node[navigation_id]',
		'value' => $__vars['node']['navigation_id'],
	), $__compilerTemp1, array(
		'label' => 'Раздел навигации',
		'explain' => 'Управление разделом навигации, который будет выбран, когда посетитель просматривает этот узел. Дочерние узлы будут автоматически наследовать данное значение.',
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

' . '

';
	return $__finalCompiled;
}
);