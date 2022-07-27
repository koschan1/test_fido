<?php
// FROM HASH: 1dd941610e357da2ca43c450dceb5bf7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Тест проксирования изображений');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Этот инструмент помогает диагностировать ошибки, связанные с системой проксирования изображений, показывая более подробную информацию, чем при обычном показе изображения.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['results']) {
		$__finalCompiled .= '
	';
		if ($__vars['results']['valid']) {
			$__finalCompiled .= '
		<div class="blockMessage blockMessage--success blockMessage--iconic">' . '' . $__templater->escape($__vars['url']) . ' успешно получено.' . '</div>
	';
		} else {
			$__finalCompiled .= '
		<div class="blockMessage blockMessage--error blockMessage--iconic">
			' . '' . $__templater->escape($__vars['url']) . ' не может быть получено или не является допустимым изображением. Ошибка: ' . $__templater->escape($__vars['results']['error']) . '' . '
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'url',
		'value' => $__vars['url'],
		'type' => 'url',
		'dir' => 'ltr',
	), array(
		'label' => 'URL-адрес',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Запустить тест',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tools/test-image-proxy', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);