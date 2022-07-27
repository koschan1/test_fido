<?php
// FROM HASH: 75d46c4f8d10cd6aeeb9e6fddb937152
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Установить официальные плагтины XenForo');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['installableAddOns'])) {
		foreach ($__vars['installableAddOns'] AS $__vars['addOnId'] => $__vars['install']) {
			$__compilerTemp1[] = array(
				'name' => 'confirm_install[' . $__vars['addOnId'] . ']',
				'value' => $__vars['install']['version_id'],
				'label' => '
						' . $__templater->escape($__vars['install']['title']) . ' <span class="u-muted">' . $__templater->escape($__vars['install']['version_string']) . '</span>
					',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Можно установить один или несколько официальных плагинов XenForo.<br />
<br />
Выбранные ниже плагины будут загружены и установлены.' . '
			', array(
	)) . '
			' . $__templater->formCheckBoxRow(array(
	), $__compilerTemp1, array(
		'label' => 'Плагины, которые можно установить',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'download',
		'submit' => 'Загрузить и установить' . $__vars['xf']['language']['ellipsis'],
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tools/install-xf-add-on', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);