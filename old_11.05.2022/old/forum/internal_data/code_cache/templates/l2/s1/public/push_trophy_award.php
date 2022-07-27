<?php
// FROM HASH: 459bce3abcd5cf1ab82e62a8fcc12ded
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Вы получили трофей: ' . $__templater->escape($__vars['content']['title']) . '' . '
<push:url>' . $__templater->func('link', array('canonical:members/trophies', $__vars['user'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);