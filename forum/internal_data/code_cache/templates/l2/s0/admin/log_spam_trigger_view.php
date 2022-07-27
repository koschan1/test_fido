<?php
// FROM HASH: 2c4cae4f4b0159fb4911cdd8d70230f8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Журнал срабатываний антиспама');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body block-row">
			<ul class="listInline listInline--bullet">
				<li><span class="u-dimmed">' . 'Действие' . $__vars['xf']['language']['label_separator'] . '</span> ' . (($__vars['entry']['result'] == 'moderated') ? 'Отмодерировано' : 'Отказано') . '</li>
				<li class="u-dimmed">' . $__templater->escape($__vars['entry']['details']) . '</li>
			</ul>
			<ul class="listInline listInline--bullet u-muted">
				<li class="u-muted">' . 'Сгенерировано пользователем' . $__vars['xf']['language']['label_separator'] . ' ' . ($__vars['entry']['User'] ? (((('<a href="' . $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), true)) . '">') . $__templater->escape($__vars['entry']['User']['username'])) . '</a>') : 'Неизвестная учётная запись') . '</li>
				<li>' . $__templater->func('date_dynamic', array($__vars['entry']['log_date'], array(
	))) . '</li>
				<li>' . 'Контент' . $__vars['xf']['language']['label_separator'] . ' ' . ($__templater->escape($__templater->method($__vars['xf']['app'], 'getContentTypePhrase', array($__vars['entry']['content_type'], ))) ?: $__templater->escape($__vars['entry']['content_type'])) . '</li>
			</ul>
		</div>

		<h3 class="block-minorHeader">' . 'Содержимое запроса' . '</h3>
		<div class="block-body block-body--contained block-row" dir="ltr">
			' . $__templater->func('dump_simple', array($__vars['entry']['request_state'], ), true) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);