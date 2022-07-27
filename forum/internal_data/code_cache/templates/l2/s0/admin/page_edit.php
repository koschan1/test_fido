<?php
// FROM HASH: fa1a8f3a59e3124e5134f560ef52208c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['page'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Создать страницу');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать страницу' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['node']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['page'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('pages/delete', $__vars['node'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('node_edit_macros', 'node_name', array(
		'node' => $__vars['node'],
		'optional' => false,
	), $__vars) . '

			' . $__templater->callMacro('node_edit_macros', 'title', array(
		'node' => $__vars['node'],
	), $__vars) . '
			' . $__templater->callMacro('node_edit_macros', 'description', array(
		'node' => $__vars['node'],
	), $__vars) . '
			' . $__templater->callMacro('node_edit_macros', 'position', array(
		'node' => $__vars['node'],
		'nodeTree' => $__vars['nodeTree'],
	), $__vars) . '
			' . $__templater->callMacro('node_edit_macros', 'navigation', array(
		'node' => $__vars['node'],
		'navChoices' => $__vars['navChoices'],
	), $__vars) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'template',
		'value' => ($__templater->method($__vars['page'], 'isUpdate', array()) ? $__vars['page']['MasterTemplate']['template'] : ''),
		'mode' => 'html',
		'class' => 'codeEditor--short',
	), array(
		'hint' => ($__templater->method($__vars['page'], 'isUpdate', array()) ? $__templater->escape($__templater->method($__vars['page'], 'getTemplateName', array())) : ''),
		'label' => 'HTML-код шаблона',
		'explain' => 'Здесь Вы можете использовать специальный синтаксис шаблонов XenForo.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'log_visits',
		'selected' => $__vars['page']['log_visits'],
		'label' => 'Записывать и считать просмотры этой страницы',
		'_type' => 'option',
	),
	array(
		'name' => 'list_siblings',
		'selected' => $__vars['page']['list_siblings'],
		'label' => 'Показывать узлы на этом уровне',
		'_type' => 'option',
	),
	array(
		'name' => 'list_children',
		'selected' => $__vars['page']['list_children'],
		'label' => 'Показывать дочерние узлы',
		'_type' => 'option',
	)), array(
		'rowclass' => 'surplusLabel',
		'label' => 'Дополнительные компоненты',
	)) . '

			' . $__templater->formRow('

				' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'data' => $__vars['page'],
	), $__vars) . '
			', array(
		'rowtype' => 'input',
		'label' => 'PHP-обработчик',
		'explain' => 'По желанию, здесь можно указать PHP-обработчик для загрузки из БД большего количества данных или изменения ответа контроллера для данной страницы.<br />
<br />
Параметры вызова обработчика:
<ol>
	<li><code>\\XF\\Pub\\Controller\\AbstractController $controller</code><br />Экземпляр контроллера. Тут содержится запрос, ответ и т.д.</li>
	<li><code>\\XF\\Mvc\\Reply\\AbstractReply &$reply</code><br />Стандартный ответ контроллера страницы.</li>
</ol>',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'advanced_mode',
		'value' => '1',
		'selected' => $__vars['page']['advanced_mode'],
		'label' => 'Расширенный режим',
		'hint' => 'Если включено, то HTML-код Вашей страницы не будет содержаться внутри стандартного div-блока.',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->callMacro('node_edit_macros', 'style', array(
		'node' => $__vars['node'],
		'styleTree' => $__vars['styleTree'],
	), $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('pages/save', $__vars['node'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);