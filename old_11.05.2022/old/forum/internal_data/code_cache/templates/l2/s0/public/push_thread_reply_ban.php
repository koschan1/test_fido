<?php
// FROM HASH: 60f4a34e987f638b49ecfb3613b050df
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['expiry']) {
		$__finalCompiled .= '
	' . 'Вы не сможете отвечать в теме ' . ($__templater->func('prefix', array('thread', $__vars['content'], 'plain', ), true) . $__templater->escape($__vars['content']['title'])) . ' до ' . $__templater->func('date', array($__vars['extra']['expiry'], ), true) . '.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Вы больше не сможете отвечать в теме ' . ($__templater->func('prefix', array('thread', $__vars['content'], 'plain', ), true) . $__templater->escape($__vars['content']['title'])) . '.' . '
';
	}
	$__finalCompiled .= '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('link', array('canonical:threads', $__vars['content'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);