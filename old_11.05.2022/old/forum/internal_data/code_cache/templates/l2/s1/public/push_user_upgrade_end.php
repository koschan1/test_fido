<?php
// FROM HASH: 720cde975bfafa4c3fc32dc981a2e6d6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Срок действия одного из платных повышений прав Вашей учётной записи истёк. Обновите его сейчас!' . '
<push:url>' . $__templater->func('link', array('canonical:account/upgrades', ), true) . '</push:url>';
	return $__finalCompiled;
}
);