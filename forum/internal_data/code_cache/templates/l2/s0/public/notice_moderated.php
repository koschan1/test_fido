<?php
// FROM HASH: 298826cc0575e4ba63c7cc6df11fa323
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Ваша учётная запись ожидает одобрения администратором. После принятия им решения Вы получите уведомление по электронной почте.' . '
';
	if ($__vars['xf']['session']['hasPreRegActionPending']) {
		$__finalCompiled .= '
	' . 'Как только Ваша регистрация будет завершена, Ваш контент будет автоматически опубликован.' . '
';
	}
	return $__finalCompiled;
}
);