<?php
// FROM HASH: f46bb70baa49bd1171b47c32608f4072
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Настройка импортёра' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['title']));
	$__finalCompiled .= '

<div class="js-importConfigForm">

	';
	if ($__vars['isCoreImporter'] AND $__vars['canRetainIds']) {
		$__finalCompiled .= '
		<div class="blockMessage blockMessage--warning blockMessage--iconic">
			' . 'Чтобы избежать неожиданных объединений пользователей, убедитесь, что Ваш <a href="' . $__templater->func('link', array('users/edit', $__vars['xf']['visitor'], ), true) . '" target="_blank">текущий пользователь</a> использует имя пользователя и email, которые не используются другими пользователями в исходной базе данных!' . '
		</div>
	';
	}
	$__finalCompiled .= '

	';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['availableSteps'])) {
		foreach ($__vars['availableSteps'] AS $__vars['stepId'] => $__vars['stepInfo']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['stepId'],
				'selected' => 1,
				'label' => $__templater->escape($__vars['stepInfo']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = array();
	if ($__vars['canRetainIds']) {
		$__compilerTemp3 = '';
		if ($__vars['isCoreImporter']) {
			$__compilerTemp3 .= '<strong>' . 'Примечание: если выбрано, ID пользователя 1 из исходной базы данных будет объединён с ID пользователя 1 в XenForo. Электронная почта и пароль пользователя XenForo будут сохранены для обеспечения безопасности.' . '</strong>';
		}
		$__compilerTemp2[] = array(
			'name' => 'retain_ids',
			'selected' => 1,
			'label' => 'Сохранять ID контента',
			'hint' => '
								' . 'Если выбрано, будут использоваться те же ID контента, что и в исходной базе данных, если это возможно. Это упростит редирект старых ссылок.' . '
								' . $__compilerTemp3 . '
							',
			'_type' => 'option',
		);
	} else {
		$__compilerTemp2[] = array(
			'disabled' => 'disabled',
			'label' => 'Сохранять ID контента',
			'hint' => '<b>Примечание</b>: ID контента не могут быть сохранены, так как они конфликтуют с существующим контентом. Импортированный контент получит новые ID, а сопоставление должно быть выполнено через журнал импорта.',
			'_type' => 'option',
		);
	}
	$__finalCompiled .= $__templater->form('

		<div class="block-container">
			<div class="block-body">
				' . $__templater->formCheckBoxRow(array(
		'name' => 'steps[]',
		'listclass' => 'data',
	), $__compilerTemp1, array(
		'label' => 'Данные для импорта',
		'explain' => '
						' . 'Для некоторых шагов могут потребоваться дополнительные шаги в качестве предварительного условия. Невыбранные шаги будут автоматически добавлены, если они потребуются для выбранного шага.' . '
					',
		'hint' => '
						<br />
						' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'check-all' => '.data',
		'label' => 'Выбрать все',
		'_type' => 'option',
	))) . '
					',
	)) . '

				' . $__templater->formCheckBoxRow(array(
	), $__compilerTemp2, array(
		'label' => 'ID контента',
	)) . '

				' . $__templater->formTextBoxRow(array(
		'name' => 'log_table',
		'required' => 'required',
		'value' => $__vars['logTable'],
	), array(
		'hint' => 'Обязательное поле',
		'label' => 'Имя таблицы журнала импорта',
		'explain' => 'Во время импорта будет создан журнал импорта, в котором будут записаны сопоставления исходных ID контента с ID, созданными импортом. Он может использоваться для последующей настройки перенаправлений URL или для дополнительного импорта. Используйте только a-z, 0-9 и символ подчёркивания.',
	)) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить' . $__vars['xf']['language']['ellipsis'],
	), array(
	)) . '
		</div>

		' . $__templater->formHiddenVal('config', $__templater->filter($__vars['baseConfig'], array(array('json', array()),), false), array(
	)) . '
		' . $__templater->formHiddenVal('importer', $__vars['importerId'], array(
	)) . '
	', array(
		'action' => $__templater->func('link', array('import/step-config', ), false),
		'class' => 'block',
		'ajax' => 'true',
		'data-replace' => '.js-importConfigForm',
	)) . '
</div>';
	return $__finalCompiled;
}
);