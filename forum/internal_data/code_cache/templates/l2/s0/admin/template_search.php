<?php
// FROM HASH: 17086162e24576f0309498332ab15f18
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Поиск шаблонов');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['types'])) {
		foreach ($__vars['types'] AS $__vars['typeId'] => $__vars['type']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['typeId'],
				'label' => $__templater->escape($__vars['type']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('style_macros', 'style_select', array(
		'styleTree' => $__vars['styleTree'],
		'styleId' => $__vars['styleId'],
	), $__vars) . '

			' . $__templater->formSelectRow(array(
		'name' => 'type',
		'selected' => 'public',
	), $__compilerTemp1, array(
		'label' => 'Тип шаблона',
	)) . '

			' . $__templater->callMacro(null, 'addon_macros::addon_select', array(
		'addOnId' => '_any',
		'includeAny' => true,
		'emptyValue' => '_none',
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'dir' => 'ltr',
	), array(
		'label' => 'Название содержит',
	)) . '

			' . $__templater->formRow('

				<ul class="inputList">
					<li>' . $__templater->formTextArea(array(
		'name' => 'template',
		'autosize' => 'true',
		'code' => 'true',
	)) . '</li>
					<li>' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'name' => 'template_cs',
		'label' => 'Учитывать регистр',
		'_type' => 'option',
	))) . '</li>
				</ul>
			', array(
		'rowtype' => 'input',
		'label' => 'Шаблон содержит',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
		'name' => 'state[]',
	), array(array(
		'value' => 'default',
		'selected' => 1,
		'label' => 'Без изменений',
		'_type' => 'option',
	),
	array(
		'value' => 'inherited',
		'selected' => 1,
		'label' => 'Изменён в родительском стиле',
		'_type' => 'option',
	),
	array(
		'value' => 'custom',
		'selected' => 1,
		'label' => 'Изменён в этом стиле',
		'_type' => 'option',
	)), array(
		'label' => 'Статус шаблона',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'search',
	), array(
	)) . '
	</div>
	' . $__templater->formHiddenVal('search', '1', array(
	)) . '

', array(
		'action' => $__templater->func('link', array('templates/search', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);