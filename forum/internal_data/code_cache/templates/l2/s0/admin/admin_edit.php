<?php
// FROM HASH: 477c39f95f6b471fe38cb1c4ca2ac49e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['admin'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить администратора');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать администратора' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['admin']['username']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['admin'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('admins/delete', $__vars['admin'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['admin']['user_id']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'ac' => 'single',
		), array(
			'label' => 'Пользователь',
		)) . '
			';
	}
	$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp3 = $__templater->mergeChoiceOptions(array(), $__vars['permissions']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formPasswordBoxRow(array(
		'name' => 'visitor_password',
	), array(
		'label' => 'Ваш пароль',
		'explain' => 'Вы должны ввести свой текущий пароль для выполнения этого запроса.',
	)) . '

			<hr class="formRowSep" />

			' . $__compilerTemp1 . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'extra_user_group_ids',
		'value' => $__vars['admin']['extra_user_group_ids'],
		'listclass' => 'listColumns',
	), $__compilerTemp2, array(
		'label' => 'Добавить пользователя в группы',
		'hint' => '<br />
					' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'check-all' => '< .formRow',
		'label' => 'Выбрать все',
		'_type' => 'option',
	))) . '
				',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'advanced',
		'selected' => $__vars['admin']['advanced'],
		'label' => 'Показать расширенные настройки панели управления',
		'_type' => 'option',
	)), array(
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'is_super_admin',
		'value' => $__vars['admin']['is_super_admin'],
	), array(array(
		'value' => '1',
		'label' => 'Главный администратор',
		'hint' => 'Главные администраторы имеют все административные права и могут управлять другими администраторами.',
		'_type' => 'option',
	),
	array(
		'value' => '0',
		'data-hide' => 'true',
		'data-xf-init' => 'disabler',
		'data-container' => '.js-adminPermissions',
		'label' => 'Обычный администратор',
		'_type' => 'option',
	)), array(
		'label' => 'Тип администратора',
	)) . '

			<div class="js-adminPermissions">
				' . $__templater->formCheckBoxRow(array(
		'name' => 'permission_cache',
		'value' => $__templater->func('array_keys', array($__vars['admin']['permission_cache'], ), false),
		'listclass' => 'listColumns',
	), $__compilerTemp3, array(
		'label' => 'Права',
		'hint' => '<br />
						' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'check-all' => '< .formRow',
		'label' => 'Выбрать все',
		'_type' => 'option',
	))) . '
					',
	)) . '
			</div>
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('admins/save', $__vars['admin'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);