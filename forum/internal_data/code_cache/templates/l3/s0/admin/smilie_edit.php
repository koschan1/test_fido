<?php
// FROM HASH: fa2d5926a0e50035267befb777a5367b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['smilie'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить смайл');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать смайл' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['smilie']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['smilie'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('smilies/delete', $__vars['smilie'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Нет' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp1 = $__templater->mergeChoiceOptions($__compilerTemp1, $__vars['smilieCategories']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['smilie']['title'],
		'maxlength' => $__templater->func('max_length', array($__vars['smilie'], 'title', ), false),
	), array(
		'label' => 'Заголовок',
	)) . '
			' . $__templater->formTextAreaRow(array(
		'name' => 'smilie_text',
		'value' => $__vars['smilie']['smilie_text'],
		'autosize' => 'true',
	), array(
		'label' => 'Текст для замены',
		'explain' => 'Можно ввести несколько текстовых значений для замены. Каждое значение с новой строки.',
	)) . '

			' . $__templater->formAssetUploadRow(array(
		'name' => 'image_url',
		'value' => $__vars['smilie']['image_url'],
		'asset' => 'smilies',
		'maxlength' => $__templater->func('max_length', array($__vars['smilie'], 'image_url', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'URL-адрес изображения для замены',
	)) . '

			' . $__templater->formAssetUploadRow(array(
		'name' => 'image_url_2x',
		'value' => $__vars['smilie']['image_url_2x'],
		'asset' => 'smilies',
		'maxlength' => $__templater->func('max_length', array($__vars['smilie'], 'image_url_2x', ), false),
		'dir' => 'ltr',
	), array(
		'hint' => 'Не обязательно',
		'label' => 'URL-адрес изображения высокого разрешения',
		'explain' => 'Если данное поле заполнено, то 2x картинка будет автоматически отображена вместо обычной картинки для замены, указанной выше для устройств, способных отображать более высокое разрешение пикселей.<br />
<br />
<strong>Примечание: данная настройка не будет иметь никакого эффекта, если включён режим спрайта.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'smilie_category_id',
		'value' => $__vars['smilie']['smilie_category_id'],
	), $__compilerTemp1, array(
		'label' => 'Категория смайлов',
	)) . '

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['smilie']['display_order'],
	), $__vars) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'display_in_editor',
		'selected' => $__vars['smilie']['display_in_editor'],
		'label' => 'Показывать этот смайл в текстовом редакторе',
		'explain' => 'Скрытые смайлы не отображаются в текстовом редакторе, но отображаются на странице помощи и продолжают преобразовываться из текста в изображение при вводе вручную в редакторе.',
		'_type' => 'option',
	)), array(
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'sprite_mode',
		'selected' => $__vars['smilie']['sprite_mode'],
		'label' => 'Включить режим CSS-спрайта со следующими параметрами:',
		'_type' => 'option',
	)), array(
		'label' => 'Режим спрайта',
	)) . '

			' . $__templater->formRow('

				<div class="inputGroup">
					' . $__templater->formNumberBox(array(
		'name' => 'sprite_params[w]',
		'value' => $__vars['smilie']['sprite_params']['w'],
		'min' => '1',
		'title' => 'Ширина',
		'data-xf-init' => 'tooltip',
	)) . '
					<span class="inputGroup-text">x</span>
					' . $__templater->formNumberBox(array(
		'name' => 'sprite_params[h]',
		'value' => $__vars['smilie']['sprite_params']['h'],
		'min' => '1',
		'title' => 'Высота',
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
		'value' => $__vars['smilie']['sprite_params']['x'],
		'title' => 'Положение фона по оси X',
		'data-xf-init' => 'tooltip',
	)) . '
					<span class="inputGroup-text">x</span>
					' . $__templater->formNumberBox(array(
		'name' => 'sprite_params[y]',
		'value' => $__vars['smilie']['sprite_params']['y'],
		'title' => 'Положение фона по оси Y',
		'data-xf-init' => 'tooltip',
	)) . '
					<span class="inputGroup-text">' . 'Пикс.' . '</span>
				</div>
			', array(
		'rowtype' => 'input',
		'label' => 'Позиция спрайта',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'sprite_params[bs]',
		'value' => $__vars['smilie']['sprite_params']['bs'],
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
		'action' => $__templater->func('link', array('smilies/save', $__vars['smilie'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);