<?php
// FROM HASH: fbe4f4fbafa70926b5cf8a62568210fb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Перезапустить импорт' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['title']));
	$__finalCompiled .= '

<div class="blocks">
	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Был найден отложенный импорт из ' . $__templater->escape($__vars['title']) . '. Вы можете перезапустить этот импорт с помощью кнопки ниже.' . '
				', array(
		'rowtype' => 'confirm',
	)) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'submit' => 'Перезапустить импорт',
	), array(
		'rowtype' => 'simple',
	)) . '
		</div>
	', array(
		'action' => $__templater->func('link', array('import/run', ), false),
		'class' => 'block',
	)) . '

	<div class="blocks-textJoiner"><span></span><em>' . 'или' . '</em><span></span></div>

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Кроме того, можно отменить этот импорт и начать новый.' . '

					<div>
						' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'name' => 'confirm',
		'data-xf-init' => 'disabler',
		'data-container' => '.js-submitDisable',
		'label' => '
								' . 'Подтвердите действие' . '
							',
		'_type' => 'option',
	))) . '
					</div>
				', array(
		'rowtype' => 'confirm',
	)) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'submit' => 'Отмена импорта',
	), array(
		'rowtype' => 'simple',
		'rowclass' => 'js-submitDisable',
	)) . '
		</div>
	', array(
		'action' => $__templater->func('link', array('import/cancel', ), false),
		'class' => 'block',
	)) . '
</div>';
	return $__finalCompiled;
}
);