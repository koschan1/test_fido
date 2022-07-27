<?php
// FROM HASH: 2ae695f07f4ef827154f35cbb92d79eb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Поиск пользователей');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Добавить пользователя', array(
		'href' => $__templater->func('link', array('users/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if ($__vars['lastUser']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--highlight">
		<div class="contentRow">
			<span class="contentRow-figure">
				' . $__templater->func('avatar', array($__vars['lastUser'], 's', false, array(
		))) . '
			</span>
			<div class="contentRow-main">
				<h2 class="contentRow-title">' . 'Изменения сохранены' . '</h2>
				<a href="' . $__templater->func('link', array('users/edit', $__vars['lastUser'], ), true) . '">' . 'Редактировать ' . $__templater->escape($__vars['lastUser']['username']) . ' снова.' . '</a>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<h2 class="block-tabHeader tabs" data-xf-init="tabs" role="tablist">
			<a class="tabs-tab is-active" role="tab" tabindex="0" aria-controls="user-search">' . 'Обычный поиск' . '</a>
			<a class="tabs-tab" role="tab" tabindex="0" aria-controls="ip-search">' . 'Поиск по IP-адресу' . '</a>
		</h2>

		<ul class="tabPanes">
			<li class="is-active" role="tabpanel" id="user-search">
				';
	$__compilerTemp1 = $__templater->mergeChoiceOptions(array(), $__vars['sortOrders']);
	$__finalCompiled .= $__templater->form('
					<div class="block-body">
						' . $__templater->includeTemplate('helper_user_search_criteria', $__vars) . '

						<hr class="formRowSep" />

						' . $__templater->formRow('

							<div class="inputPair">
								' . $__templater->formSelect(array(
		'name' => 'order',
	), $__compilerTemp1) . '
								' . $__templater->formSelect(array(
		'name' => 'direction',
	), array(array(
		'value' => 'asc',
		'label' => 'По возрастанию',
		'_type' => 'option',
	),
	array(
		'value' => 'desc',
		'label' => 'По убыванию',
		'_type' => 'option',
	))) . '
							</div>
						', array(
		'rowtype' => 'input',
		'label' => 'Сортировка',
	)) . '
					</div>
					' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'search',
	), array(
	)) . '
				', array(
		'action' => $__templater->func('link', array('users/list', ), false),
	)) . '
			</li>
			<li role="tabpanel" id="ip-search">
				' . $__templater->form('
					<div class="block-body">
						' . $__templater->formTextBoxRow(array(
		'name' => 'ip',
	), array(
		'label' => 'IP-адрес',
		'explain' => 'Введите IP-адрес, чтобы увидеть список всех пользователей, которые писали сообщения на форуме с этого IP. Частичные IP-адреса можно ввести в виде 192.168.*, 192.168.0.0/16 или 2001:db8::/32.',
	)) . '
					</div>
					' . $__templater->formSubmitRow(array(
		'icon' => 'search',
	), array(
	)) . '
				', array(
		'action' => $__templater->func('link', array('users/ip-users', ), false),
	)) . '
			</li>
		</ul>
	</div>
</div>';
	return $__finalCompiled;
}
);