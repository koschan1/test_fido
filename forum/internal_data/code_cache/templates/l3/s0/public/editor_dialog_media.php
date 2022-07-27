<?php
// FROM HASH: 4ad3321865d5dde1e83f93c5711912fd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Вставить медиа');
	$__finalCompiled .= '

';
	$__templater->setPageParam('head.' . 'metaNoindex', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

<form class="block" id="editor_media_form">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'id' => 'editor_media_url',
		'type' => 'url',
	), array(
		'label' => 'Укажите ссылку на медиа',
	)) . '

			';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['sites'])) {
		foreach ($__vars['sites'] AS $__vars['siteId'] => $__vars['site']) {
			if ($__vars['site']['supported']) {
				$__compilerTemp1 .= '
						<li><a href="' . $__templater->escape($__vars['site']['site_url']) . '" target="_blank">' . $__templater->escape($__vars['site']['site_title']) . '</a></li>
					';
			}
		}
	}
	$__finalCompiled .= $__templater->formRow('

				<ul class="listInline listInline--comma u-smaller">
					' . $__compilerTemp1 . '
				</ul>
				<div class="formRow-explain">
					<a href="' . $__templater->func('link', array('help', array('page_name' => 'bb-codes', ), ), true) . '#media" target="_blank">' . 'Помощь' . '</a>
				</div>
			', array(
		'label' => 'Поддерживаемые сайты',
		'hint' => 'Вы можете вставлять медиа из этих источников',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить',
		'id' => 'editor_media_submit',
	), array(
	)) . '
	</div>
</form>
';
	return $__finalCompiled;
}
);