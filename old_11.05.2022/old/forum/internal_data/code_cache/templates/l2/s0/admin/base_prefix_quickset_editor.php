<?php
// FROM HASH: d0c1c9af008fef332a5a4d5a5fc3b513
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Быстрая установка префиксов');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['prefixes'])) {
		foreach ($__vars['prefixes'] AS $__vars['prefixId'] => $__vars['_prefix']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['prefixId'],
				'checked' => 'checked',
				'label' => '<span class="' . $__templater->escape($__vars['_prefix']['css_class']) . '">' . $__templater->escape($__vars['_prefix']['title']) . '</span>',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
		'name' => 'prefix_ids',
		'listclass' => 'inputChoices--inline',
	), $__compilerTemp1, array(
		'label' => 'Применить настройки к этим префиксам',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_css_class',
	), array(array(
		'label' => 'Применить настройки стиля отображения' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						' . $__templater->callMacro('base_prefix_edit_macros', 'display_style', array(
		'prefix' => $__vars['prefix'],
		'displayStyles' => $__vars['displayStyles'],
		'withRow' => '0',
	), $__vars) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Стиль отображения',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_prefix_group_id',
	), array(array(
		'label' => 'Применить настройки к группе префиксов' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						' . $__templater->callMacro('base_prefix_edit_macros', 'prefix_groups', array(
		'prefix' => $__vars['prefix'],
		'prefixGroups' => $__vars['prefixGroups'],
		'withRow' => '0',
	), $__vars) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Группа префиксов',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_user_group_ids',
	), array(array(
		'label' => 'Применить настройки групп пользователей' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						' . $__templater->callMacro('helper_user_group_edit', 'checkboxes', array(
		'selectedUserGroups' => ($__vars['prefix']['prefix_id'] ? $__vars['prefix']['allowed_user_group_ids'] : array(-1, )),
		'withRow' => '0',
	), $__vars) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Используется группами пользователей',
	)) . '

			' . $__templater->filter($__vars['extraOptions'], array(array('raw', array()),), true) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array($__vars['linkPrefix'] . '/quick-set', ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);