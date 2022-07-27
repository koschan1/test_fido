<?php
// FROM HASH: 3116ac51401d32bc538b58b693aa9340
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['inputName'],
		'selected' => $__vars['option']['option_value'],
		'label' => $__templater->escape($__vars['option']['title']),
		'_type' => 'option',
	)), array(
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => 'Можно запретить регистрироваться посетителям, IP-адреса которых находятся в списке <a href="' . $__templater->func('link', array('banning/discouraged-ips', ), true) . '">нежелательных</a>. Им будет показано сообщение о том, что регистрация в данный момент отключена.',
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);