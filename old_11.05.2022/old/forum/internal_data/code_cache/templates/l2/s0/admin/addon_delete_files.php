<?php
// FROM HASH: 966cf17579285c1d30536b69dd3380bd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if (!$__vars['undeletableFiles']) {
		$__compilerTemp1 .= '
		' . 'Подтвердите удаление файлов ' . $__templater->escape($__vars['addOn']['title']) . '' . '
	';
	} else {
		$__compilerTemp1 .= '
		' . 'Не удалось удалить файлы ' . $__templater->escape($__vars['addOn']['title']) . '' . '
	';
	}
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
');
	$__finalCompiled .= '

';
	if (!$__vars['undeletableFiles']) {
		$__finalCompiled .= '
	';
		$__compilerTemp2 = '';
		if ($__vars['conflictingFiles']) {
			$__compilerTemp2 .= '
					<div class="block-row">
						<div class="block-rowMessage block-rowMessage--iconic block-rowMessage--warning">
							' . 'Следующие файлы нельзя удалить, так как они могут использоваться другим плагином. Эти файлы <strong>не будут</strong> удалены, но Вы можете продолжить удаление остальных файлов этого плагина, если хотите.' . '
						</div>
						<ul>
							';
			if ($__templater->isTraversable($__vars['conflictingFiles'])) {
				foreach ($__vars['conflictingFiles'] AS $__vars['conflictingFile']) {
					$__compilerTemp2 .= '
								<li><code>' . $__templater->escape($__vars['conflictingFile']) . '</code></li>
							';
				}
			}
			$__compilerTemp2 .= '
						</ul>
					</div>
				';
		}
		$__compilerTemp3 = '';
		if ($__templater->isTraversable($__vars['filesToDelete'])) {
			foreach ($__vars['filesToDelete'] AS $__vars['file']) {
				$__compilerTemp3 .= '
							<li><code>' . $__templater->escape($__vars['file']) . '</code></li>
						';
			}
		}
		$__finalCompiled .= $__templater->form('

		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Пожалуйста, подтвердите удаление файлов плагина' . $__vars['xf']['language']['label_separator'] . '
					<strong>' . $__templater->escape($__vars['addOn']['title']) . ' ' . $__templater->escape($__vars['addOn']['version_string']) . '</strong>
				', array(
			'rowtype' => 'confirm',
		)) . '

				' . $__compilerTemp2 . '
				<div class="block-row">
					<div class="block-rowMessage block-rowMessage--iconic block-rowMessage--important">
						' . 'Все файлы, связанные с этим дополнением, будут удалены (если не указано иное). Возможно, не удастся удалить некоторые каталоги.' . '
					</div>
				</div>
			</div>

			<h3 class="block-formSectionHeader">
				<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
					' . 'Посмотреть файлы, которые будут удалены' . '
				</span>
			</h3>
			<div class="block-body block-body--contained block-body--collapsible" tabindex="-1">
				<div class="block-row">
					<ul>
						' . $__compilerTemp3 . '
					</ul>
				</div>
			</div>

			' . $__templater->formSubmitRow(array(
			'submit' => 'Удалить файлы',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>

		' . $__templater->func('redirect_input', array(null, null, true)) . '
	', array(
			'action' => $__templater->func('link', array('add-ons/delete-files', $__vars['addOn'], ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp4 = '';
		if ($__templater->isTraversable($__vars['undeletableFiles'])) {
			foreach ($__vars['undeletableFiles'] AS $__vars['undeletableFile']) {
				$__compilerTemp4 .= '
							<li><code>' . $__templater->escape($__vars['undeletableFile']) . '</code></li>
						';
			}
		}
		$__finalCompiled .= $__templater->formInfoRow('
					<div class="block-rowMessage block-rowMessage--error">
						' . 'Следующие файлы или каталоги не получилось удалить из-за установленных прав доступа. Мы рекомендуем удалить файлы плагина вручную.' . '
					</div>
					<ul>
						' . $__compilerTemp4 . '
					</ul>
				', array(
		)) . '
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);