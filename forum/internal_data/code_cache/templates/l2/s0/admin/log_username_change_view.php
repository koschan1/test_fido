<?php
// FROM HASH: 6dfc90dfc53939183a4810541cd9f8b8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Запись журнала изменений имени пользователя');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				<div class="contentRow contentRow--alignMiddle">
					<div class="contentRow-figure">
						' . $__templater->func('avatar', array($__vars['entry']['User'], 'xs', false, array(
	))) . '
					</div>
					<div class="contentRow-main">
						<h3 class="contentRow-title">' . $__templater->func('username_link', array($__vars['entry']['User'], true, array(
	))) . '</h3>
					</div>
				</div>
			', array(
		'label' => 'Текущее имя пользователя',
		'rowtype' => 'button',
	)) . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['entry']['old_username']) . '
			', array(
		'label' => 'Старое имя пользователя',
	)) . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['entry']['new_username']) . '
			', array(
		'label' => 'Новое имя пользователя',
	)) . '

			' . $__templater->formRow('
				' . ($__vars['entry']['change_reason'] ? $__templater->filter($__vars['entry']['change_reason'], array(array('nl2br', array()),), true) : 'Н/Д') . '
			', array(
		'label' => 'Причина изменения',
	)) . '

			<hr class="formRowSep" />

			';
	$__compilerTemp1 = '';
	if ($__vars['entry']['change_state'] == 'approved') {
		$__compilerTemp1 .= '
					' . 'Одобрено' . '
				';
	} else if ($__vars['entry']['change_state'] == 'moderated') {
		$__compilerTemp1 .= '
					' . 'Ожидает одобрения' . '
				';
	} else if ($__vars['entry']['change_state'] == 'rejected') {
		$__compilerTemp1 .= '
					' . 'Отказано' . '
				';
	}
	$__finalCompiled .= $__templater->formRow('
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Статус изменения',
	)) . '

			';
	if ($__vars['entry']['change_state'] == 'rejected') {
		$__finalCompiled .= '
				';
		$__compilerTemp2 = '';
		if ($__vars['entry']['moderator_user_id'] AND $__vars['entry']['Moderator']) {
			$__compilerTemp2 .= '
						' . $__templater->func('username_link', array($__vars['entry']['Moderator'], false, array(
				'href' => $__templater->func('link', array('users/edit', $__vars['entry']['Moderator'], ), false),
			))) . '
					';
		} else {
			$__compilerTemp2 .= '
						' . 'Н/Д' . '
					';
		}
		$__finalCompiled .= $__templater->formRow('
					' . $__compilerTemp2 . '
				', array(
			'label' => 'Отклонил(а)',
		)) . '

				';
		$__compilerTemp3 = '';
		if ($__vars['entry']['reject_reason']) {
			$__compilerTemp3 .= '
						' . $__templater->escape($__vars['entry']['reject_reason']) . '
					';
		} else {
			$__compilerTemp3 .= '
						' . 'Н/Д' . '
					';
		}
		$__finalCompiled .= $__templater->formRow('
					' . $__compilerTemp3 . '
				', array(
			'label' => 'Причина',
		)) . '
			';
	} else if ($__vars['entry']['user_id'] != $__vars['entry']['change_user_id']) {
		$__finalCompiled .= '
				';
		$__compilerTemp4 = '';
		if ($__vars['entry']['change_user_id'] AND $__vars['entry']['ChangeUser']) {
			$__compilerTemp4 .= '
						' . $__templater->func('username_link', array($__vars['entry']['ChangeUser'], false, array(
				'href' => $__templater->func('link', array('users/edit', $__vars['entry']['ChangeUser'], ), false),
			))) . '
					';
		} else {
			$__compilerTemp4 .= '
						' . 'Н/Д' . '
					';
		}
		$__finalCompiled .= $__templater->formRow('
					' . $__compilerTemp4 . '
				', array(
			'label' => 'Изменено',
		)) . '
			';
	} else if (($__vars['entry']['change_state'] == 'approved') AND ($__vars['entry']['moderator_user_id'] AND $__vars['entry']['Moderator'])) {
		$__finalCompiled .= '
				' . $__templater->formRow('
					' . $__templater->func('username_link', array($__vars['entry']['Moderator'], false, array(
			'href' => $__templater->func('link', array('users/edit', $__vars['entry']['Moderator'], ), false),
		))) . '
				', array(
			'label' => 'Одобрено',
		)) . '
			';
	}
	$__finalCompiled .= '

			' . $__templater->formRow('
				' . $__templater->func('date_dynamic', array($__vars['entry']['change_date'], array(
	))) . '
			', array(
		'label' => 'Дата',
	)) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);