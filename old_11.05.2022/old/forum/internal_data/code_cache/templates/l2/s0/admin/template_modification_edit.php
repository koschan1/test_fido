<?php
// FROM HASH: 6e5f5739c0272ea3968b4e38a1cd6571
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['modification'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить модификацию шаблона');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать модификацию шаблона' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['modification']['template']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->includeCss('template_modification.less');
	$__finalCompiled .= '

';
	if (!$__templater->method($__vars['modification'], 'canEdit', array())) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'В этом элементе можно отредактировать только некоторые поля.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['modification'], 'isUpdate', array()) AND $__templater->method($__vars['modification'], 'canEdit', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('template-modifications/delete', $__vars['modification'], ), false),
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

			' . $__templater->formRow('
				' . $__templater->escape($__vars['types'][$__vars['modification']['type']]) . '
				' . $__templater->formHiddenVal('type', $__vars['modification']['type'], array(
	)) . '
			', array(
		'label' => 'Тип модификации',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'template',
		'value' => $__vars['modification']['template'],
		'id' => 'js-templateModificationTemplate',
		'maxlength' => $__templater->func('max_length', array($__vars['modification'], 'template', ), false),
		'readonly' => (!$__templater->method($__vars['modification'], 'canEdit', array())),
		'ac' => 'single',
		'data-acurl' => $__templater->func('link', array('template-modifications/auto-complete', null, array('type' => $__vars['modification']['type'], ), ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Шаблон',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'modification_key',
		'value' => $__vars['modification']['modification_key'],
		'maxlength' => $__templater->func('max_length', array($__vars['modification'], 'modification_key', ), false),
		'readonly' => (!$__templater->method($__vars['modification'], 'canEdit', array())),
		'dir' => 'ltr',
	), array(
		'label' => 'Ключ модификации',
		'explain' => 'Используется для идентификации модификации при обновлении плагинов.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'description',
		'value' => $__vars['modification']['description'],
		'readonly' => (!$__templater->method($__vars['modification'], 'canEdit', array())),
	), array(
		'label' => 'Описание',
	)) . '

			<hr class="formRowSep" />

			<div class="js-templateContentsContainer u-hidden u-hidden--transition">
				' . $__templater->formRow('

					<pre class="templateModContents"
						id="js-templateContents"
						data-contents-url="' . $__templater->func('link', array('template-modifications/contents', '', array('type' => $__vars['modification']['type'], ), ), true) . '"
					><!--
						--><i>' . 'Запрашиваемый шаблон не найден.' . '</i><!--
					--></pre>
				', array(
		'rowtype' => 'input',
		'label' => 'Содержимое шаблона',
	)) . '
			</div>

			' . $__templater->formRadioRow(array(
		'name' => 'action',
		'value' => $__vars['modification']['action'],
		'readonly' => (!$__templater->method($__vars['modification'], 'canEdit', array())),
	), array(array(
		'value' => 'str_replace',
		'label' => 'Простая замена',
		'_type' => 'option',
	),
	array(
		'value' => 'preg_replace',
		'label' => 'Регулярное выражение',
		'hint' => 'Текст для поиска должен содержать разделители и модификаторы для использования в регулярном выражении.',
		'_type' => 'option',
	),
	array(
		'value' => 'callback',
		'label' => 'PHP-обработчик',
		'hint' => 'Текст для поиска должен быть регулярным выражением. Поле замены должно быть в виде className::methodName для вызова. Обработчику будет передан один параметр, массив совпадений из регулярного выражения. Он должен вернуть обновлённые строки шаблона.',
		'_type' => 'option',
	)), array(
		'label' => 'Тип поиска',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'find',
		'value' => $__vars['modification']['find'],
		'mode' => 'html',
		'readonly' => (!$__templater->method($__vars['modification'], 'canEdit', array())),
		'class' => 'codeEditor--short',
		'data-auto-close-tags' => 'false',
	), array(
		'label' => 'Найти',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'replace',
		'value' => $__vars['modification']['replace'],
		'mode' => 'html',
		'readonly' => (!$__templater->method($__vars['modification'], 'canEdit', array())),
		'class' => 'codeEditor--short',
		'data-auto-close-tags' => 'false',
	), array(
		'label' => 'Заменить',
		'explain' => 'Вы можете использовать $0, чтобы вставить найденный текст. Для регулярных выражений используйте $1 и т.д., чтобы вставить вторичные совпадения. Регулярные выражения также должны экранировать обратную косую черту в заменяемом содержимом (используя \\\\). Вы можете использовать синтаксис шаблонов XenForo.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formNumberBoxRow(array(
		'name' => 'execution_order',
		'value' => $__vars['modification']['execution_order'],
		'min' => '0',
		'readonly' => (!$__templater->method($__vars['modification'], 'canEdit', array())),
	), array(
		'label' => 'Порядок выполнения',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'enabled',
		'value' => '1',
		'selected' => $__vars['modification']['enabled'],
		'hint' => (($__vars['xf']['development'] AND $__vars['modification']['addon_id']) ? 'Значение этого поля не будет изменено при обновлении плагина.' : ''),
		'label' => '
					' . 'Автоматически применять модификацию шаблон' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['modification']['addon_id'],
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
		'html' => '
			' . $__templater->button('Тест', array(
		'type' => 'submit',
		'name' => 'test',
		'value' => '1',
	), '', array(
	)) . '
		',
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('template-modifications/save', $__vars['modification'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	)) . '

';
	$__templater->inlineJs('
	$(function() {
		var $templateInput = $(\'#js-templateModificationTemplate\'),
				$contents = $(\'#js-templateContents\'),
				$container = $contents.closest(\'.js-templateContentsContainer\'),
				invalidContents = $contents.html();

		var updateContents = function(templateName)
		{
			if (templateName === \'\')
			{
				$container.removeClassTransitioned(\'is-active\');
				return;
			}

			XF.ajax(
					\'get\',
					$contents.data(\'contents-url\'),
					{ template: templateName },
					function(data)
					{
						if (data.template !== false)
						{
							$contents.text(data.template);
						}
						else
						{
							$contents.html(invalidContents);
						}

						$container.addClassTransitioned(\'is-active\', function()
						{
							XF.layoutChange();
						});
					}
			);
		};

		if ($templateInput.val())
		{
			updateContents($templateInput.val());
		}

		var timer;

		$templateInput.on(\'change AutoComplete\', function() {
			if (timer)
			{
				clearTimeout(timer);
			}
			timer = setTimeout(function() {
				updateContents($templateInput.val());
			}, 200);
		});
	});
');
	return $__finalCompiled;
}
);