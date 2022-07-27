<?php
// FROM HASH: ff899b2eabdbaaffe7ce0692b513c19f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'На данный момент форум закрыт. Доступ имеют только администраторы.' . '<br />
<a href="' . $__templater->func('link_type', array('admin', 'options/groups', array('group_id' => 'boardActive', ), ), true) . '">' . 'Открыть в панели управления' . '</a>';
	return $__finalCompiled;
}
);