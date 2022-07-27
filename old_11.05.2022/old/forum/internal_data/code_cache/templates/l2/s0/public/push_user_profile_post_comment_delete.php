<?php
// FROM HASH: e21c137ef4ee55c0d2c5849138c7cc92
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Ваш комментарий в профиле ' . $__templater->escape($__vars['extra']['postUser']) . ' был удалён.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('base_url', array($__vars['extra']['profilePostLink'], 'canonical', ), true) . '</push:url>';
	return $__finalCompiled;
}
);