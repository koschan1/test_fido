<?php
// FROM HASH: abd0dae0788503fb0a12ad235cc7f4c5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formInfoRow('Резервный код может быть использован, если у Вас нет доступа к другим способам проверки. После того, как код будет введён, его нельзя будет использовать ещё раз. Вы получите письмо по электронной почте, с уведомлением о том, что был использован резервный код.', array(
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'code',
		'autofocus' => 'autofocus',
		'inputmode' => 'numeric',
		'pattern' => '[0-9\\s]*',
	), array(
		'label' => 'Резервный код',
	));
	return $__finalCompiled;
}
);