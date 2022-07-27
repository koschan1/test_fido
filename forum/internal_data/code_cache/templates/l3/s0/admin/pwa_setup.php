<?php
// FROM HASH: 00426afbe22860de109429e9dfdb904d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Настройка PWA');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Правильно настроенное <a href="https://web.dev/progressive-web-apps/" target="_blank">прогрессивное веб-приложение</a> позволит пользователям установить Ваш сайт на свое устройство (как отдельное приложение).');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['isInstallable']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'Ваш форум соответствует требованиям и установка прогрессивного веб-приложения доступна пользователям.' . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'Ваш форум не соответствует требованиям прогрессивного веб-приложения. Пожалуйста, убедитесь, что перечисленные ниже настройки корректны.' . '
	</div>
';
	}
	$__finalCompiled .= '

<div class="blockMessage blockMessage--highlight">
	' . 'Браузеры пользователей периодически проверяют изменения этих значений. Это может занять до 24 часов.' . '
</div>

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['xf']['request'], 'isSecure', array()) OR $__templater->method($__vars['xf']['request'], 'isHostLocal', array())) {
		$__compilerTemp1 .= '
					' . 'Да' . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Нет' . '
				';
	}
	$__compilerTemp2 = '';
	if ($__templater->isTraversable($__vars['optionGroup']['Options'])) {
		foreach ($__vars['optionGroup']['Options'] AS $__vars['option']) {
			$__compilerTemp2 .= '
				' . $__templater->callMacro('option_macros', 'option_row', array(
				'group' => $__vars['optionGroup'],
				'option' => $__vars['option'],
			), $__vars) . '
			';
		}
	}
	$__compilerTemp3 = array(array(
		'value' => '',
		'label' => '&nbsp;',
		'_type' => 'option',
	));
	$__compilerTemp3 = $__templater->mergeChoiceOptions($__compilerTemp3, $__vars['languageLocales']);
	$__compilerTemp4 = '';
	if ($__templater->isTraversable($__vars['stylePropertyMaps'])) {
		foreach ($__vars['stylePropertyMaps'] AS $__vars['map']) {
			$__compilerTemp4 .= '
				' . $__templater->callMacro('style_property_macros', 'property_edit', array(
				'property' => $__vars['map']['Property'],
				'definitionEditable' => $__templater->method($__vars['map'], 'isDefinitionEditable', array()),
			), $__vars) . '
			';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h3 class="block-formSectionHeader">
			<span class="block-formSectionHeader-aligner">' . 'Требования' . '</span>
		</h3>
		<div class="block-body">
			' . $__templater->formRow('

				' . $__compilerTemp1 . '
			', array(
		'label' => 'HTTPS включен',
		'explain' => 'Ваш форум должен работать по HTTPS для поддержки прогрессивных веб-приложений.',
	)) . '
		</div>

		<h3 class="block-formSectionHeader">
			<span class="block-formSectionHeader-aligner">' . 'Настройки' . '</span>
		</h3>
		<div class="block-body">
			' . $__compilerTemp2 . '
		</div>

		<h3 class="block-formSectionHeader">
			<span class="block-formSectionHeader-aligner">' . 'Настройки языка' . '</span>
		</h3>
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Эти настройки отражают язык по умолчанию ' . $__templater->filter($__vars['language']['title'], array(array('parens', array()),), true) . '.' . '
			', array(
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'language[language_code]',
		'value' => $__vars['language']['language_code'],
	), $__compilerTemp3, array(
		'label' => 'Язык',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'language[text_direction]',
		'value' => $__vars['language']['text_direction'],
	), array(array(
		'value' => 'LTR',
		'label' => 'Слева направо',
		'_type' => 'option',
	),
	array(
		'value' => 'RTL',
		'label' => 'Cправа налево',
		'_type' => 'option',
	)), array(
		'label' => 'Направление текста',
	)) . '
		</div>


		<h3 class="block-formSectionHeader">
			<span class="block-formSectionHeader-aligner">' . 'Настройки стиля' . '</span>
		</h3>
		<div class="block-body p-styleProperties">
			' . $__templater->formInfoRow('
				' . 'Эти настройки отражают стиль по умолчанию ' . $__templater->filter($__vars['style']['title'], array(array('parens', array()),), true) . '.' . '
			', array(
	)) . '

			' . $__compilerTemp4 . '

			' . $__templater->callMacro('public:color_picker_macros', 'color_picker_scripts', array(
		'colorData' => $__vars['styleColorData'],
	), $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('pwa', ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);