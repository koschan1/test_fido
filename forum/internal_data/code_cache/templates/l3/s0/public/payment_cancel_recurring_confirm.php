<?php
// FROM HASH: 25667511c2289a0db81c918540143c76
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтверждение отмены подписки' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['purchasableItem']['title']));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите отмену следующей подписки' . $__vars['xf']['language']['label_separator'] . '
				<strong>' . $__templater->escape($__vars['purchasableItem']['title']) . '</strong>
				<div class="blockMessage blockMessage--important">
					' . 'Примечание: Ваша подписка может оставаться активной до истечения первоначального срока действия.' . '
				</div>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Отменить',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('purchase/cancel-recurring', null, array('request_key' => $__vars['purchaseRequest']['request_key'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);