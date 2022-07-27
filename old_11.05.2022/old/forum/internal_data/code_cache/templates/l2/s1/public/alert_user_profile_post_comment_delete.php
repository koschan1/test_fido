<?php
// FROM HASH: b7d925e766fb3ffcda05e02b8a3c634b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Ваш комментарий в профиле ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['profilePostLink'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['postUser'])) . '</a>') . ' был удалён.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
}
);