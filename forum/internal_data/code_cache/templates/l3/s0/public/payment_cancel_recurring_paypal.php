<?php
// FROM HASH: 964be987b86fb7e0386dc22e1fca63c1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div>
	' . $__templater->button('
		' . 'Отменить' . '
	', array(
		'href' => $__vars['endpoint'] . 'myaccount/autopay/',
		'target' => '_blank',
	), '', array(
	)) . '

	<div class="formRow-explain">
		' . 'Примечание: Подписки PayPal можно отменить только с Вашей учетной записи PayPal. Если у Вас нет учетной записи PayPal, пожалуйста, свяжитесь с нами или свяжитесь с PayPal напрямую.' . '
	</div>
</div>';
	return $__finalCompiled;
}
);