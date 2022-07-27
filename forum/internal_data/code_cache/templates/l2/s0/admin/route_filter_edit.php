<?php
// FROM HASH: bae0d2d2eb42fcbb9fc58b3d934296a1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['routeFilter'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить фильтр роутинга');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать фильтр роутинга' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['routeFilter']['find_route']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['routeFilter'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('route-filters/delete', $__vars['routeFilter'], ), false),
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

			' . $__templater->formTextBoxRow(array(
		'name' => 'find_route',
		'value' => $__vars['routeFilter']['find_route_readable'],
		'maxlength' => $__templater->func('max_length', array($__vars['routeFilter'], 'find_route', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Найти роутинг',
		'explain' => 'Здесь необходимо ввести только часть роутинга для ссылки. Например, если Вы хотите изменить ссылку ' . $__templater->escape($__vars['fullThreadLink']) . ', то нужно ввести только ' . $__templater->escape($__vars['routeValue']) . '.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'replace_route',
		'value' => $__vars['routeFilter']['replace_route_readable'],
		'maxlength' => $__templater->func('max_length', array($__vars['routeFilter'], 'replace_route', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Заменить на',
		'explain' => 'Поля поиска и замены поддерживают маску в формате {name}, с уникальным именем. Одни и те же маски должны находиться в обоих полях. Чтобы ограничить маску цифрами, используйте {name:digit}; чтобы ограничить строкой, используйте {name:string}; {name} ничего не найдёт, кроме слэша.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'enabled',
		'value' => '1',
		'selected' => $__vars['routeFilter']['enabled'],
		'label' => 'Включено',
		'_type' => 'option',
	),
	array(
		'name' => 'url_to_route_only',
		'value' => '1',
		'selected' => $__vars['routeFilter']['url_to_route_only'],
		'label' => 'Преобразовывать только входящие URL-адреса',
		'hint' => 'Если включено, то данный фильтр будет использоваться только для изменения входящих URL-адресов, не меняя исходящий роутинг.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'sticy' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('route-filters/save', $__vars['routeFilter'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);