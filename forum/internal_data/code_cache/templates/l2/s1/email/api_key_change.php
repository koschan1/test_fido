<?php
// FROM HASH: 4bd389eac824b17b34ecbd325c5f2b70
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - API-ключ изменён' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ',</p>

<p>' . $__templater->escape($__vars['changer']['username']) . ' только что обновил(а) или создал(а) API-ключ "' . $__templater->escape($__vars['apiKey']['title']) . '". API-ключи можно использовать для программного доступа и внесения изменений на сайте. Только главные администраторы могут управлять API-ключами.</p>

<p>Если это действие не санкционировано, API-ключ должен быть немедленно удалён и должны быть приняты меры для обеспечения безопасности административных учётных записей. Текущими API-ключами можно управлять в <a href="' . $__templater->func('link_type', array('admin', 'canonical:api-keys', ), true) . '">панели управления</a>.</p>

<p>Все главные администраторы были автоматически уведомлены об этом событии.</p>';
	return $__finalCompiled;
}
);