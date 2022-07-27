<?php
// FROM HASH: 7af1a8a23a70dde8cdc85f44c0c339bc
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['reaction'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить реакцию');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать реакцию' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['reaction']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['reaction'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('reactions/delete', $__vars['reaction'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__vars['explain'] = $__templater->preEscaped('Выберите цвет текста, который будет использоваться для этой реакции. Если Вы не хотите связывать определённый цвет с этой реакцией, оставьте поле пустым.<br /><br /><b>Примечание: цвета палитры могут отображаться по-разному в зависимости от выбранного стиля.</b>');
	$__compilerTemp1 = $__templater->mergeChoiceOptions(array(), $__vars['reactionScores']);
	$__compilerTemp1[] = array(
		'label' => 'Пользовательская оценка',
		'value' => '',
		'selected' => $__vars['reaction']['is_custom_score'],
		'_dependent' => array($__templater->formNumberBox(array(
		'name' => 'custom_reaction_score',
		'value' => $__vars['reaction']['reaction_score'],
		'step' => '1',
	))),
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__vars['reaction']['reaction_id'] ? $__vars['reaction']['MasterTitle']['phrase_text'] : ''),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . '' . '
			' . $__templater->callMacro('public:color_picker_macros', 'color_picker', array(
		'name' => 'text_color',
		'value' => $__vars['reaction']['text_color'],
		'allowPalette' => 'true',
		'colorData' => $__vars['colorData'],
		'label' => 'Цвет текста',
		'explain' => $__vars['explain'],
	), $__vars) . '

			' . $__templater->formRadioRow(array(
		'name' => 'reaction_score',
		'value' => $__vars['reaction']['reaction_score'],
	), $__compilerTemp1, array(
		'label' => 'Реакции',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['reaction']['display_order'],
	), $__vars) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'active',
		'selected' => $__vars['reaction']['active'],
		'label' => 'Реакция включена',
		'hint' => 'Отключённые реакции больше не могут использоваться и больше не будут отображаться в контенте.',
		'_type' => 'option',
	)), array(
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formAssetUploadRow(array(
		'name' => 'image_url',
		'value' => $__vars['reaction']['image_url'],
		'asset' => 'reactions',
		'maxlength' => $__templater->func('max_length', array($__vars['reaction'], 'image_url', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'URL-адрес изображения для замены',
	)) . '

			' . $__templater->formAssetUploadRow(array(
		'name' => 'image_url_2x',
		'value' => $__vars['reaction']['image_url_2x'],
		'asset' => 'reactions',
		'maxlength' => $__templater->func('max_length', array($__vars['reaction'], 'image_url_2x', ), false),
		'dir' => 'ltr',
	), array(
		'hint' => 'Не обязательно',
		'label' => 'URL-адрес изображения высокого разрешения',
		'explain' => 'Если данное поле заполнено, то 2x картинка будет автоматически отображена вместо обычной картинки для замены, указанной выше для устройств, способных отображать более высокое разрешение пикселей.<br />
<br />
<strong>Примечание: данная настройка не будет иметь никакого эффекта, если включён режим спрайта.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'sprite_mode',
		'selected' => $__vars['reaction']['sprite_mode'],
		'label' => 'Включить режим CSS-спрайта со следующими параметрами:',
		'_type' => 'option',
	)), array(
		'label' => 'Режим спрайта',
	)) . '

			' . $__templater->formRow('

				<div class="inputGroup">
					' . $__templater->formNumberBox(array(
		'name' => 'sprite_params[w]',
		'value' => $__vars['reaction']['sprite_params']['w'],
		'min' => '1',
		'title' => $__templater->filter('Ширина', array(array('for_attr', array()),), false),
		'data-xf-init' => 'tooltip',
	)) . '
					<span class="inputGroup-text">x</span>
					' . $__templater->formNumberBox(array(
		'name' => 'sprite_params[h]',
		'value' => $__vars['reaction']['sprite_params']['h'],
		'min' => '1',
		'title' => $__templater->filter('Высота', array(array('for_attr', array()),), false),
		'data-xf-init' => 'tooltip',
	)) . '
					<span class="inputGroup-text">' . 'Пикс.' . '</span>
				</div>
			', array(
		'rowtype' => 'input',
		'label' => 'Размеры спрайта',
	)) . '

			' . $__templater->formRow('

				<div class="inputGroup">
					' . $__templater->formNumberBox(array(
		'name' => 'sprite_params[x]',
		'value' => $__vars['reaction']['sprite_params']['x'],
		'title' => $__templater->filter('Положение фона по оси X', array(array('for_attr', array()),), false),
		'data-xf-init' => 'tooltip',
	)) . '
					<span class="inputGroup-text">x</span>
					' . $__templater->formNumberBox(array(
		'name' => 'sprite_params[y]',
		'value' => $__vars['reaction']['sprite_params']['y'],
		'title' => $__templater->filter('Положение фона по оси Y', array(array('for_attr', array()),), false),
		'data-xf-init' => 'tooltip',
	)) . '
					<span class="inputGroup-text">' . 'Пикс.' . '</span>
				</div>
				<div class="formRow-explain">' . 'CSS будет сгенерирован автоматически для спрайтов малого и среднего размера на основе указанных выше значений. Рекомендуется использовать 32px на 32px.' . '</div>
			', array(
		'rowtype' => 'input',
		'label' => 'Позиция спрайта',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'sprite_params[bs]',
		'value' => $__vars['reaction']['sprite_params']['bs'],
		'dir' => 'ltr',
	), array(
		'label' => 'Размер фона',
		'explain' => 'Если необходимо, то укажите значение CSS-свойства <code>background-size</code> для этого спрайта.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '

	</div>
', array(
		'action' => $__templater->func('link', array('reactions/save', $__vars['reaction'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);