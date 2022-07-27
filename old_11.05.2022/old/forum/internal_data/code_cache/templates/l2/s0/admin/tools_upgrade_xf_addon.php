<?php
// FROM HASH: 9f9eba4b5da97451d57b723144c122a2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Обновление официальных плагинов');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['availableUpdates'])) {
		foreach ($__vars['availableUpdates'] AS $__vars['addOnId'] => $__vars['availableUpdate']) {
			$__compilerTemp1[] = array(
				'name' => 'confirm_updates[' . $__vars['addOnId'] . ']',
				'value' => $__vars['availableUpdate']['version_id'],
				'label' => '
						' . $__templater->escape($__vars['addOns'][$__vars['addOnId']]['title']) . ' <span class="u-muted">' . $__templater->escape($__vars['availableUpdate']['version_string']) . '</span>
					',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Доступны одно или несколько обновлений для официальных плагинов XenForo, которые у Вас установлены.<br />
<br />
Выберите обновления ниже , которые Вы хотите установить. Выбранные обновления будут сразу загружены и установлены.' . '

				<div class="block-rowMessage block-rowMessage--important">
					<b>' . 'Примечание' . $__vars['xf']['language']['label_separator'] . '</b>
					' . 'Прежде чем продолжить, настоятельно рекомендуется создать резервную копию базы данных и файлов. Это не делается автоматически.' . '
				</div>
			', array(
	)) . '
			' . $__templater->formCheckBoxRow(array(
	), $__compilerTemp1, array(
		'label' => 'Доступные обновления плагинов',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'download',
		'submit' => 'Загрузить и обновить' . $__vars['xf']['language']['ellipsis'],
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tools/upgrade-xf-add-on', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);