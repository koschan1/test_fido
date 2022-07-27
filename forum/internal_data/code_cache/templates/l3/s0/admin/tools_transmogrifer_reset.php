<?php
// FROM HASH: 161c75a13199be769a961a4c89746675
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Успешный сброс трансмогрификации');
	$__finalCompiled .= '

<div class="blockMessage blockMessage--success blockMessage--iconic" style="text-align: center">
	' . 'Генерация и сброс трансмогрификаций выполнены успешно. Теперь все должно стать намного лучше.' . '
	<div>
		<dl class="pairs pairs--inline">
			<dt>' . 'Количество трансмогрификаций' . '</dt>
			<dd>' . $__templater->filter($__vars['count'], array(array('number', array()),), true) . '</dd>
		</dl>
	</div>
</div>';
	return $__finalCompiled;
}
);