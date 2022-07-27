<?php
// FROM HASH: ad52e279ba0c2692f9a9eda9806b2cb9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['tooltip']) {
		$__finalCompiled .= '
	<div class="tooltip-content-inner">
		';
		$__compilerTemp1 = '';
		if ($__vars['added']) {
			$__compilerTemp1 .= '
					' . 'Закладка добавлена' . '
				';
		} else if ($__templater->method($__vars['bookmark'], 'isInsert', array())) {
			$__compilerTemp1 .= '
					' . 'Добавить закладку' . '
				';
		} else {
			$__compilerTemp1 .= '
					' . 'Редактировать закладку' . '
				';
		}
		$__finalCompiled .= $__templater->form('
			<div class="block-minorHeader">
				' . $__compilerTemp1 . '
			</div>
			<div class="block-body">
				<div class="block-row">
					' . $__templater->formTextAreaRow(array(
			'name' => 'message',
			'value' => $__vars['bookmark']['message'],
			'autosize' => 'true',
			'rows' => '1',
			'maxlength' => $__templater->func('max_length', array($__vars['bookmark'], 'message', ), false),
		), array(
			'label' => 'Сообщение',
			'rowtype' => 'fullWidth noPadding',
			'hint' => 'Не обязательно',
		)) . '
				</div>
				<div class="block-row">
					' . $__templater->formRow('
						' . $__templater->callMacro('bookmark_macros', 'filter', array(
			'label' => $__templater->filter($__vars['bookmark']['labels'], array(array('pluck', array('label', )),array('join', array(', ', )),), false),
			'allLabels' => $__vars['allLabels'],
			'maxTokens' => '0',
			'placeholder' => '',
		), $__vars) . '
					', array(
			'label' => 'Теги',
			'hint' => 'Не обязательно',
			'rowtype' => 'fullWidth noPadding',
			'explain' => 'Несколько тегов могут быть разделены запятыми.',
		)) . '
				</div>
				<div class="block-row">
					<div class="formButtonGroup formButtonGroup--simple formButtonGroup--close">
						<div class="formButtonGroup-primary">
							' . $__templater->button('', array(
			'type' => 'submit',
			'class' => 'button--primary',
			'icon' => 'save',
		), '', array(
		)) . '
							' . $__templater->button('', array(
			'type' => 'submit',
			'name' => 'delete',
			'icon' => 'delete',
		), '', array(
		)) . '
						</div>
					</div>
				</div>
			</div>
		', array(
			'action' => $__vars['confirmUrl'],
			'class' => '',
			'ajax' => 'true',
		)) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	';
		if ($__templater->method($__vars['bookmark'], 'isInsert', array())) {
			$__finalCompiled .= '
		';
			$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить закладку');
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		';
			$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать закладку');
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '


	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formTextAreaRow(array(
			'name' => 'message',
			'value' => $__vars['bookmark']['message'],
			'autosize' => 'true',
			'maxlength' => $__templater->func('max_length', array($__vars['bookmark'], 'message', ), false),
		), array(
			'label' => 'Сообщение',
			'hint' => 'Не обязательно',
		)) . '

				' . $__templater->formRow('
					' . $__templater->callMacro('bookmark_macros', 'filter', array(
			'label' => $__templater->filter($__vars['bookmark']['labels'], array(array('pluck', array('label', )),array('join', array(', ', )),), false),
			'allLabels' => $__vars['allLabels'],
			'maxTokens' => '0',
			'placeholder' => '',
		), $__vars) . '
					<div class="formRow-explain">
						' . 'Несколько тегов могут быть разделены запятыми.' . '
					</div>
				', array(
			'label' => 'Теги',
			'rowtype' => 'input',
			'hint' => 'Не обязательно',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'save',
		), array(
			'html' => '
				' . $__templater->button('', array(
			'type' => 'submit',
			'name' => 'delete',
			'icon' => 'delete',
		), '', array(
		)) . '
			',
		)) . '
		</div>
	', array(
			'action' => $__vars['confirmUrl'],
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	}
	return $__finalCompiled;
}
);