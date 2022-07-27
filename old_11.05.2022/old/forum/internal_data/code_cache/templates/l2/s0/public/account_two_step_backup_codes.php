<?php
// FROM HASH: d29ea3b61e91b66c1a3ace99664a486b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Резервные коды двухфакторной аутентификации');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			<div class="block-row block-row--separated">
				' . 'Резервные коды проверки были сгенерированы автоматически. Каждый из этих кодов может быть использован только один раз, в случае, если Вы не имеете доступа к другим средствам проверки. Эти коды должны быть сохранены в безопасном месте.' . '
			</div>
			<div class="block-row block-row--separated">
				<ul class="listColumns listColumns--spaced listPlain">
				';
	if ($__templater->isTraversable($__vars['codes'])) {
		foreach ($__vars['codes'] AS $__vars['code']) {
			$__finalCompiled .= '
					<li><div>' . $__templater->escape($__vars['code']) . '</div></li>
				';
		}
	}
	$__finalCompiled .= '
				</ul>
			</div>
		</div>
		<div class="block-footer">
			<span class="block-footer-controls">
				' . $__templater->button('Я сохранил(а) резервные коды', array(
		'class' => 'button--primary js-overlayClose',
	), '', array(
	)) . '
			</span>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);