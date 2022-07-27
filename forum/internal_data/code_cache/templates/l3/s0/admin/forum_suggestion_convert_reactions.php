<?php
// FROM HASH: 797661ba9c66887e863dd80409c9c2bd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Преобразование реакций на предложения в голоса');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Этот инструмент преобразует реакции на первое сообщение тем в разделах предложений в голоса за предложения. Положительные реакции будут преобразованы в голоса За, а отрицательные реакции будут преобразованы в голоса Против, если они включены. Существующие голоса и ранее преобразованные реакции не будут удалены.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите, что Вы хотите конвертировать реакции на предложения в следующем разделе' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('forums/edit', $__vars['node'], ), true) . '">' . $__templater->escape($__vars['node']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'confirm',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('forums/suggestion-convert-reactions', $__vars['node'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);