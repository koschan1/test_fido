<?php
// FROM HASH: 75c0fa0389c6fffe339ef7d5cc2a9191
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Ваше сообщение из темы ' . $__templater->escape($__vars['extra']['title']) . ' было перемещено в ' . ($__templater->func('prefix', array('thread', $__vars['extra']['prefix_id'], 'plain', ), true) . $__templater->escape($__vars['extra']['targetTitle'])) . '.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('base_url', array($__vars['extra']['targetLink'], 'canonical', ), true) . '</push:url>';
	return $__finalCompiled;
}
);