<?php
// FROM HASH: fd73d72ed41d0e1fb7addbf2721170aa
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - email изменён' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ',</p>

<p>Ваш email на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' был недавно изменён на ' . $__templater->escape($__vars['newEmail']) . '. Если это изменение сделали Вы, то просто проигнорируйте данное сообщение.</p>

<p>Если Вы не запрашивали это изменение, пожалуйста, авторизуйтесь и измените свой пароль и email. Если Вы не можете сделать это, свяжитесь с администрацией сайта.</p>

<p>Ваш email был изменён с этого IP: ' . $__templater->escape($__vars['ip']) . '.</p>';
	return $__finalCompiled;
}
);