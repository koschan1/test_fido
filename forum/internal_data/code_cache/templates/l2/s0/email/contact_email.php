<?php
// FROM HASH: 9ccee5602bac66d0a83ad445a3636aa3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
' . '' . $__templater->escape($__vars['subject']) . ' (с сайта ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ')' . '
</mail:subject>

' . '<p>Пользователь ' . (((((('<a href="mailto:' . $__templater->escape($__vars['email'])) . '">') . $__templater->escape($__vars['name'])) . ' &lt;') . $__templater->escape($__vars['email'])) . '&gt;</a>') . ' (IP: ' . $__templater->escape($__vars['ip']) . ') отправил сообщение с сайта ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' с помощью формы обратной связи.</p>' . '

<h2>' . $__templater->escape($__vars['subject']) . '</h2>

<div class="message">' . $__templater->filter($__vars['message'], array(array('nl2br', array()),), true) . '</div>';
	return $__finalCompiled;
}
);