<?php
// FROM HASH: 20289b3adf3623796e22cf8d61100a01
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<h3 class="block-formSectionHeader">' . 'Конфигурация исходной базы данных' . '</h3>
';
	if (!$__vars['baseConfig']['db']['host']) {
		$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][host]',
			'value' => 'localhost',
			'placeholder' => '$config[\'db\'][\'host\']',
		), array(
			'label' => 'Сервер MySQL',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][port]',
			'value' => '3306',
			'placeholder' => '$config[\'db\'][\'port\']',
		), array(
			'label' => 'Порт MySQL',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][username]',
			'placeholder' => '$config[\'db\'][\'username\']',
		), array(
			'label' => 'Имя пользователя MySQL',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][password]',
			'autocomplete' => 'off',
			'placeholder' => '$config[\'db\'][\'password\']',
		), array(
			'label' => 'Пароль MySQL',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][dbname]',
			'placeholder' => '$config[\'db\'][\'dbname\']',
		), array(
			'label' => 'Имя базы данных MySQL',
		)) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->formRow($__templater->escape($__vars['fullConfig']['db']['host']) . ':' . $__templater->escape($__vars['fullConfig']['db']['dbname']), array(
			'label' => 'Сервер MySQL',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['requiresDataPath']) {
		$__finalCompiled .= '
	';
		if (!$__vars['baseConfig']['data_dir']) {
			$__finalCompiled .= '
		<hr class="formRowSep" />

		' . $__templater->formTextBoxRow(array(
				'name' => 'config[data_dir]',
				'placeholder' => '$config[\'externalDataPath\']',
			), array(
				'label' => 'Каталог данных (data)',
			)) . '
	';
		} else {
			$__finalCompiled .= '
		' . $__templater->formRow($__templater->escape($__vars['fullConfig']['data_dir']), array(
				'label' => 'Каталог данных (data)',
			)) . '
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '
';
	if ($__vars['requiresInternalDataPath']) {
		$__finalCompiled .= '
	';
		if (!$__vars['baseConfig']['internal_data_dir']) {
			$__finalCompiled .= '
		' . $__templater->formTextBoxRow(array(
				'name' => 'config[internal_data_dir]',
				'placeholder' => '$config[\'internalDataPath\']',
			), array(
				'label' => 'Каталог внутренних данных (internal_data)',
			)) . '
	';
		} else {
			$__finalCompiled .= '
		' . $__templater->formRow($__templater->escape($__vars['fullConfig']['internal_data_dir']), array(
				'label' => 'Каталог внутренних данных (internal_data)',
			)) . '
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '
';
	if ($__vars['requiresForumImportLog']) {
		$__finalCompiled .= '
	';
		if (!$__vars['baseConfig']['forum_import_log']) {
			$__finalCompiled .= '
		' . $__templater->formTextBoxRow(array(
				'name' => 'config[forum_import_log]',
			), array(
				'label' => 'Журнал импорта',
				'explain' => '
				' . 'Необходимо указать имя журнала, который будет создан во время импорта.' . '
			',
			)) . '
	';
		} else {
			$__finalCompiled .= '
		' . $__templater->formRow('
			' . $__templater->escape($__vars['fullConfig']['forum_import_log']) . '
		', array(
				'label' => 'Журнал импорта',
			)) . '
	';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);