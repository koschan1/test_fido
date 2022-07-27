<?php
// FROM HASH: c8de5e074915c46b1915685c36ca8808
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['notice'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить объявление');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать объявление' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['notice']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['notice'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Сбросить', array(
			'href' => $__templater->func('link', array('notices/reset', $__vars['notice'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('notices/delete', $__vars['notice'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['noticeTypes'])) {
		foreach ($__vars['noticeTypes'] AS $__vars['typeId'] => $__vars['typeValue']) {
			if ($__vars['typeId'] == 'floating') {
				$__compilerTemp1[] = array(
					'value' => $__vars['typeId'],
					'data-xf-init' => 'disabler',
					'data-container' => '.js-hiderContainer',
					'data-hide' => 'yes',
					'label' => $__templater->escape($__vars['typeValue']),
					'_type' => 'option',
				);
			} else {
				$__compilerTemp1[] = array(
					'value' => $__vars['typeId'],
					'label' => $__templater->escape($__vars['typeValue']),
					'_type' => 'option',
				);
			}
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-tabHeader tabs hScroller" data-xf-init="tabs h-scroller" role="tablist">
			<span class="hScroller-scroll">
				<a class="tabs-tab is-active" role="tab" tabindex="0" aria-controls="notice-options">' . 'Настройки объявления' . '</a>
				' . $__templater->callMacro('helper_criteria', 'user_tabs', array(), $__vars) . '
				' . $__templater->callMacro('helper_criteria', 'page_tabs', array(), $__vars) . '
			</span>
		</h2>

		<ul class="tabPanes block-body">
			<li class="is-active" role="tabpanel" id="notice-options">
				' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['notice']['title'],
		'maxlength' => $__templater->func('max_length', array($__vars['notice'], 'title', ), false),
	), array(
		'label' => 'Заголовок',
		'explain' => 'Укажите заголовок, который будет отображаться в верхней части объявления. Старайтесь быть кратким!',
	)) . '

				' . $__templater->formCodeEditorRow(array(
		'name' => 'message',
		'value' => $__vars['notice']['message'],
		'mode' => 'html',
		'data-line-wrapping' => 'true',
		'class' => 'codeEditor--autoSize codeEditor--proportional',
	), array(
		'label' => 'Сообщение',
		'hint' => 'Можно использовать HTML',
		'explain' => 'Сообщение, которое будет отображаться при соответствии критериям. Можно использовать {user_id} для замены на идентификатор текущего пользователя, {name} для замены на текущее имя посетителя и {title} для замены на заголовок объявления.',
	)) . '

				<hr class="formRowSep" />

				' . $__templater->formRadioRow(array(
		'name' => 'display_image',
		'value' => $__vars['notice']['display_image'],
	), array(array(
		'value' => '',
		'label' => 'Без изображения',
		'_type' => 'option',
	),
	array(
		'value' => 'avatar',
		'label' => 'Показывать аватар посетителя',
		'_type' => 'option',
	),
	array(
		'value' => 'image',
		'label' => 'Показывать указанное изображение' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formAssetUpload(array(
		'name' => 'image_url',
		'value' => $__vars['notice']['image_url'],
		'asset' => 'notice_images',
		'maxlength' => $__templater->func('max_length', array($__vars['notice'], 'image_url', ), false),
		'dir' => 'ltr',
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Изображение',
	)) . '

				' . $__templater->formRadioRow(array(
		'name' => 'display_style',
		'value' => $__vars['notice']['display_style'],
	), array(array(
		'value' => 'primary',
		'label' => 'Основной',
		'_type' => 'option',
	),
	array(
		'value' => 'accent',
		'label' => 'Акцент',
		'_type' => 'option',
	),
	array(
		'value' => 'dark',
		'label' => 'Тёмный',
		'_type' => 'option',
	),
	array(
		'value' => 'light',
		'label' => 'Светлый',
		'_type' => 'option',
	),
	array(
		'value' => 'custom',
		'label' => 'Другой, используя своё имя CSS-класса' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'css_class',
		'value' => $__vars['notice']['css_class'],
		'maxlength' => $__templater->func('max_length', array($__vars['notice'], 'css_class', ), false),
		'dir' => 'ltr',
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Стиль отображения',
	)) . '

				' . $__templater->formRadioRow(array(
		'name' => 'visibility',
		'value' => $__vars['notice']['visibility'],
	), array(array(
		'label' => 'Никогда не скрывать',
		'_type' => 'option',
	),
	array(
		'value' => 'wide',
		'label' => 'Скрывать, если страница меньше полной ширины (' . $__templater->func('property', array('responsiveWide', ), true) . ')',
		'_type' => 'option',
	),
	array(
		'value' => 'medium',
		'label' => 'Скрывать, если страница меньше средней ширины (' . $__templater->func('property', array('responsiveMedium', ), true) . ')',
		'_type' => 'option',
	),
	array(
		'value' => 'narrow',
		'label' => 'Скрывать, если страница меньше узкой ширины (' . $__templater->func('property', array('responsiveNarrow', ), true) . ')',
		'_type' => 'option',
	)), array(
		'label' => 'Видимость',
		'explain' => 'Используйте эти настройки для управления видимостью в зависимости от размера дисплея. Эти параметры связаны с настройками стиля <a href="' . $__templater->func('link', array('styles/style-properties/group', array('style_id' => $__vars['xf']['options']['defaultStyleId'], ), array('group' => 'page', ), ), true) . '">Адаптивный дизайн</a> и могут иметь разные значения в зависимости от выбранного стиля.',
	)) . '

				<hr class="formRowSep" />

				' . $__templater->formRadioRow(array(
		'name' => 'notice_type',
		'value' => $__vars['notice']['notice_type'],
	), $__compilerTemp1, array(
		'label' => 'Тип объявления',
		'explain' => 'Блочные объявления отображаются в верхней части страницы над верхними хлебными крошками. Плавающие объявления отображаются в правом нижнем углу.',
	)) . '

				<div class="js-hiderContainer">

					' . $__templater->formNumberBoxRow(array(
		'name' => 'display_duration',
		'value' => $__vars['notice']['display_duration'],
		'min' => '0',
		'max' => '3600000',
		'step' => '100',
	), array(
		'label' => 'Длительность отображения (в миллисекундах)',
		'explain' => 'Время отображения объявления на экране, в миллисекундах, прежде, чем оно плавно исчезнет. Используйте 0 (ноль) для постоянного отображения, пока объявление не будет скрыто пользователем.',
	)) . '

					' . $__templater->formNumberBoxRow(array(
		'name' => 'delay_duration',
		'value' => $__vars['notice']['delay_duration'],
		'min' => '0',
		'max' => '3600000',
		'step' => '100',
	), array(
		'label' => 'Длительность задержки (в миллисекундах)',
		'explain' => 'Время задержки плавного появления объявления на экране в миллисекундах.',
	)) . '
				</div>

				<hr class="formRowSep" />

				' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'dismissible',
		'selected' => $__vars['notice']['dismissible'],
		'label' => 'Объявление можно скрыть',
		'hint' => 'Пользователи могут скрывать объявление, после его прочтения.',
		'_dependent' => array('
							' . $__templater->formCheckBox(array(
	), array(array(
		'value' => '1',
		'label' => 'Автоматически скрывать объявление, когда оно исчезнет с экрана',
		'name' => 'auto_dismiss',
		'selected' => $__vars['notice']['auto_dismiss'],
		'hint' => 'Эта опция действительна только для плавающих объявлений и только если указана длительность отображения.',
		'_type' => 'option',
	))) . '
						'),
		'_type' => 'option',
	),
	array(
		'name' => 'active',
		'selected' => $__vars['notice']['active'],
		'label' => 'Объявление активно',
		'hint' => 'Используйте для временного отключения этого объявления.',
		'_type' => 'option',
	)), array(
		'label' => 'Настройки',
	)) . '

				' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['notice']['display_order'],
	), $__vars) . '
			</li>

			' . $__templater->callMacro('helper_criteria', 'user_panes', array(
		'criteria' => $__templater->method($__vars['userCriteria'], 'getCriteriaForTemplate', array()),
		'data' => $__templater->method($__vars['userCriteria'], 'getExtraTemplateData', array()),
	), $__vars) . '

			' . $__templater->callMacro('helper_criteria', 'page_panes', array(
		'criteria' => $__templater->method($__vars['pageCriteria'], 'getCriteriaForTemplate', array()),
		'data' => $__templater->method($__vars['pageCriteria'], 'getExtraTemplateData', array()),
	), $__vars) . '

		</ul>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('notices/save', $__vars['notice'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);