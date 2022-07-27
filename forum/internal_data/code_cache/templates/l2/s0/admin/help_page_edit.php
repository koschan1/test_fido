<?php
// FROM HASH: 546d238a133701b0c16e307ac181981b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['page'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить страницу помощи');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать страницу помощи' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['page']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['page'], 'isUpdate', array()) AND $__templater->method($__vars['page'], 'canEdit', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('help-pages/delete', $__vars['page'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	if (!$__templater->method($__vars['page'], 'canEdit', array())) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'В этом элементе можно отредактировать только некоторые поля.' . '
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">

			' . $__templater->formTextBoxRow(array(
		'name' => 'page_name',
		'value' => $__vars['page']['page_name'],
		'readonly' => (!$__templater->method($__vars['page'], 'canEdit', array())),
		'maxlength' => $__templater->func('max_length', array($__vars['page'], 'page_name', ), false),
	), array(
		'label' => 'Часть URL-адреса',
		'explain' => '
					' . 'Представляет собой часть URL-адреса после <i>help/</i> , которая идентифицирует эту страницу. Можно использовать только символы a-z, 0-9, _ (символ подчёркивания) и дефис -
 (дефис).' . '
				',
	)) . '

			' . $__templater->formHiddenVal('page_id', $__vars['page']['page_id'], array(
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['page'], 'exists', array()) ? $__vars['page']['MasterTitle']['phrase_text'] : ''),
		'readonly' => (!$__templater->method($__vars['page'], 'canEdit', array())),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'description',
		'value' => ($__templater->method($__vars['page'], 'exists', array()) ? $__vars['page']['MasterDescription']['phrase_text'] : ''),
		'readonly' => (!$__templater->method($__vars['page'], 'canEdit', array())),
	), array(
		'label' => 'Описание',
	)) . '

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['page']['display_order'],
		'explain' => (($__vars['xf']['development'] AND $__vars['page']['addon_id']) ? 'Значение этого поля не будет изменено при обновлении плагина.' : ''),
	), $__vars) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'advanced_mode',
		'value' => '1',
		'selected' => $__vars['page']['advanced_mode'],
		'readonly' => (!$__templater->method($__vars['page'], 'canEdit', array())),
		'label' => 'Расширенный режим',
		'hint' => 'Если включено, то HTML-код Вашей страницы не будет содержаться внутри стандартного div-блока.',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'content',
		'value' => ($__templater->method($__vars['page'], 'isUpdate', array()) ? $__vars['page']['MasterTemplate']['template'] : ''),
		'mode' => 'html',
		'class' => 'codeEditor--short',
		'readonly' => (!$__templater->method($__vars['page'], 'canEdit', array())),
	), array(
		'label' => 'Содержимое страницы',
		'explain' => 'Здесь Вы можете использовать специальный синтаксис шаблонов XenForo.',
	)) . '

			' . $__templater->formRow('
				' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'data' => $__vars['page'],
		'readOnly' => (!$__templater->method($__vars['page'], 'canEdit', array())),
	), $__vars) . '
			', array(
		'rowtype' => 'input',
		'label' => 'PHP-обработчик',
		'explain' => 'По желанию, здесь можно указать PHP-обработчик для загрузки из БД большего количества данных или изменения ответа контроллера для данной страницы.<br />
<br />
Параметры вызова обработчика:
<ol>
	<li><code>\\XF\\Pub\\Controller\\AbstractController $controller</code><br />Экземпляр контроллера. Тут содержится запрос, ответ и т.д.</li>
	<li><code>\\XF\\Mvc\\Reply\\AbstractReply &$reply</code><br />Стандартный ответ контроллера страницы.</li>
</ol>',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'active',
		'value' => '1',
		'selected' => $__vars['page']['active'],
		'hint' => (($__vars['xf']['development'] AND $__vars['page']['addon_id']) ? 'Значение этого поля не будет изменено при обновлении плагина.' : ''),
		'label' => '
					' . 'Включено' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['page']['addon_id'],
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('help-pages/save', $__vars['page'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);