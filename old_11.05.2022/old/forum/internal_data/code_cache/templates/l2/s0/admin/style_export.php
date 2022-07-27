<?php
// FROM HASH: 57d71c5cfc1637184afd7635b8b594a4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['asArchive']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Экспорт стиля в виде архива' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['style']['title']));
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Экспорт стиля в виде XML' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['style']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__vars['addOnRepo'] = $__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:AddOn', ));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['asArchive']) {
		$__compilerTemp1 .= '
				' . $__templater->formInfoRow('
					<div class="blockMessage blockMessage--important"><strong>' . 'Примечание' . $__vars['xf']['language']['label_separator'] . '</strong> ' . 'Архивы стилей могут содержать только файлы со следующими расширениями: ' . $__templater->filter($__vars['allowedExtensions'], array(array('join', array(', ', )),), true) . '.' . '</div>
				', array(
		)) . '
			';
	}
	$__compilerTemp2 = array(array(
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Все' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp3 = $__templater->method($__templater->method($__vars['addOnRepo'], 'findAddOnsForList', array()), 'fetch', array());
	if ($__templater->isTraversable($__compilerTemp3)) {
		foreach ($__compilerTemp3 AS $__vars['addOn']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['addOn']['addon_id'],
				'label' => $__templater->escape($__vars['addOn']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
			' . $__templater->formRow($__templater->escape($__vars['style']['title']), array(
		'label' => 'Стиль',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'addon_id',
	), $__compilerTemp2, array(
		'label' => 'Экспорт из плагина',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'independent',
		'label' => 'Экспортировать как самостоятельный стиль',
		'hint' => 'Если выбрано, любые изменения из родительских стилей будут добавлены в этот, словно они были сделаны непосредственно в нем.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'export',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array(($__vars['asArchive'] ? 'styles/export-archive' : 'styles/export'), $__vars['style'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);