<?php
// FROM HASH: c47b249dd935cd34d690b79482c757cd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Информация об IP-адресе для контента ' . ($__templater->escape($__vars['ip']['User']['username']) ?: 'Гость') . '');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__vars['breadcrumbs']);
	$__finalCompiled .= '

' . $__templater->callMacro('helper_ip', 'ip_block', array(
		'ip' => $__vars['ip']['ip'],
		'user' => $__vars['ip']['User'],
	), $__vars);
	return $__finalCompiled;
}
);