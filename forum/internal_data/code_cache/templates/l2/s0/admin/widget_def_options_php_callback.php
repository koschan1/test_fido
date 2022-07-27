<?php
// FROM HASH: 97f883b71078373d57b238c404daa4a9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->callMacro('helper_callback_fields', 'callback_row', array(
		'label' => 'PHP-обработчик',
		'explain' => 'Укажите PHP-обработчик, который можно использовать для визуализации Вашего виджета.<br />
<br />
Аргументы обработчика:
<ol>
	<li><code>\\XF\\Widget\\AbstractWidget $widget</code><br />Этот виджет. Из него Вы можете получить доступ к объекту <code>WidgetConfig</code> и объекту <code>\\XF\\App</code> для того, чтобы извлекать данные и отображать шаблон, возвращая объект <code>$widget->renderer()</code>.</li>
</ol>',
		'className' => 'options[callback_class]',
		'classValue' => $__vars['options']['callback_class'],
		'methodName' => 'options[callback_method]',
		'methodValue' => $__vars['options']['callback_method'],
	), $__vars);
	return $__finalCompiled;
}
);