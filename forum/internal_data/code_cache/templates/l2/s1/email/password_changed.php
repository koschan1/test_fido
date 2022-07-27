<?php
// FROM HASH: 7399f4b060d06d410e1bdd76c5348780
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - пароль изменён' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ',</p>

<p>Ваш пароль на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' был недавно изменён. Если это изменение сделали Вы, то просто проигнорируйте это сообщение.</p>

<p>Если Вы не запрашивали это изменение, пожалуйста, воспользуйтесь процессом восстановления для генерации нового пароля. Если Вы не можете сделать это, свяжитесь с администрацией сайта.</p>

<p>Пароль был изменён с этого IP: ' . $__templater->escape($__vars['ip']) . '.</p>';
	return $__finalCompiled;
}
);