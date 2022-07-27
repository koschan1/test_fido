<?php
// FROM HASH: bbe8f6270a31a14023764a707bca364b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Ваше сообщение из темы ' . $__templater->escape($__vars['extra']['title']) . ' было скопировано в ' . ($__templater->func('prefix', array('thread', $__vars['extra']['prefix_id'], 'plain', ), true) . $__templater->escape($__vars['extra']['targetTitle'])) . '.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Причина' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('base_url', array($__vars['extra']['targetLink'], 'canonical', ), true) . '</push:url>';
	return $__finalCompiled;
}
);