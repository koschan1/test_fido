<?php
// FROM HASH: 6aff868b6e6f08e5c0ddd662a30a99f2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Настройка двухфакторной аутентификации' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['provider']['title']));
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['usedCodes'])) {
		foreach ($__vars['usedCodes'] AS $__vars['code']) {
			$__compilerTemp1 .= '
					<li><div style="text-decoration: line-through">' . $__templater->escape($__vars['code']) . '</div></li>
				';
		}
	}
	$__compilerTemp2 = '';
	if ($__templater->isTraversable($__vars['availableCodes'])) {
		foreach ($__vars['availableCodes'] AS $__vars['code']) {
			$__compilerTemp2 .= '
					<li><div>' . $__templater->escape($__vars['code']) . '</div></li>
				';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('

				<ul class="listColumns listColumns--spaced listPlain">
				' . $__compilerTemp1 . '
				' . $__compilerTemp2 . '
				</ul>
			', array(
		'label' => 'Резервные коды',
		'explain' => 'Каждый из этих кодов может быть использован только один раз, в случае, если Вы не имеете доступа к другим средствам проверки. Эти коды должны быть сохранены в безопасном месте.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'regen',
		'value' => '1',
		'label' => 'Сгенерировать новые резервные коды',
		'hint' => 'Это создаст новые резервные коды. Все предыдущие резервные коды больше не будут работать.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Подтверждение регистрации',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('account/two-step/manage', $__vars['provider'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);