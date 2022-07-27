<?php
// FROM HASH: 44f120f76149697a0afed5bd4d544ea6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['route'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить роутинг');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать роутинг' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['route']['unique_name']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['route'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('routes/delete', $__vars['route'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '',
		'label' => '&nbsp;',
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['routeTypes'])) {
		foreach ($__vars['routeTypes'] AS $__vars['routeTypeId'] => $__vars['routeType']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['routeTypeId'],
				'label' => $__templater->escape($__vars['routeType']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formSelectRow(array(
		'name' => 'route_type',
		'value' => $__vars['route']['route_type'],
	), $__compilerTemp1, array(
		'label' => 'Тип роутинга',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'route_prefix',
		'value' => $__vars['route']['route_prefix'],
		'maxlength' => $__templater->func('max_length', array($__vars['route'], 'route_prefix', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Префикс роутинга',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'sub_name',
		'value' => $__vars['route']['sub_name'],
		'maxlength' => $__templater->func('max_length', array($__vars['route'], 'sub_name', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Дополнительный имя',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'format',
		'value' => $__vars['route']['format'],
		'maxlength' => $__templater->func('max_length', array($__vars['route'], 'format', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Формат роутинга',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'context',
		'value' => $__vars['route']['context'],
		'maxlength' => $__templater->func('max_length', array($__vars['route'], 'context', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Контекст секции',
	)) . '

			' . $__templater->formRow('

				' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'namePrefix' => 'build',
		'data' => $__vars['route'],
	), $__vars) . '
			', array(
		'rowtype' => 'input',
		'label' => 'Обработчик создания ссылок',
		'explain' => 'Можно изменить процесс создания ссылки по умолчанию с помощью обратного вызова, который можно использовать для добавления или изменения информации, используемой для создания ссылки.<br />
<br />
Аргументы вызова обработчика:
<ol>
	<li><code>&amp;$prefix</code><br />Префикс роутинга для создаваемой ссылки.</li>
	<li><code><strong>array</strong> &amp;$route</code><br />Массив, содержащий конфигурацию этого роутинга.</li>
		<li><code>&amp;$action</code><br />Текущая часть действия создаваемой ссылки.</li>
		<li><code>&amp;$data</code><br />Текущие данные передаются в создаваемую ссылку. Скорее всего, это объект сущности.
</li>
		<li><code><strong>array</strong> &amp;$params</code><br />Массив параметров URL, передаваемых в создаваемую ссылку.</li>
</ol>',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'controller',
		'value' => $__vars['route']['controller'],
		'maxlength' => $__templater->func('max_length', array($__vars['route'], 'controller', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Контроллер',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'action_prefix',
		'value' => $__vars['route']['action_prefix'],
		'maxlength' => $__templater->func('max_length', array($__vars['route'], 'action_prefix', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Префикс действия',
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['route']['addon_id'],
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('routes/save', $__vars['route'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);