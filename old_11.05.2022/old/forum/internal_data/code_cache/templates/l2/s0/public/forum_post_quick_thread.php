<?php
// FROM HASH: f04f66f6866dbcd993070ce961c5427e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['forum']['draft_thread'], 'exists', array())) {
		$__compilerTemp1 .= '
			' . $__templater->formRow('
				<div class="block-rowMessage block-rowMessage--important block-rowMessage--small">
					<a href="' . $__templater->func('link', array('forums/post-thread', $__vars['forum'], ), true) . '">' . 'У Вас есть сохранённый черновик. Нажмите здесь, чтобы загрузить его.' . '</a>
				</div>
			', array(
			'rowtype' => 'fullWidth noGutter noLabel mergeNext',
		)) . '
		';
	}
	$__compilerTemp2 = '';
	if ($__vars['canEditTags'] AND $__vars['forum']['min_tags']) {
		$__compilerTemp2 .= '
			<hr class="formRowSep" />
			';
		$__compilerTemp3 = '';
		if ($__vars['forum']['min_tags']) {
			$__compilerTemp3 .= '
						' . 'Этот контент должно иметь не менее следующего количества тегов: ' . $__templater->escape($__vars['forum']['min_tags']) . '.' . '
					';
		}
		$__compilerTemp2 .= $__templater->formTokenInputRow(array(
			'name' => 'tags',
			'href' => $__templater->func('link', array('misc/tag-auto-complete', ), false),
			'min-length' => $__vars['xf']['options']['tagLength']['min'],
			'max-length' => $__vars['xf']['options']['tagLength']['max'],
			'max-tokens' => $__vars['xf']['options']['maxContentTags'],
		), array(
			'rowtype' => 'fullWidth noGutter',
			'label' => 'Теги',
			'explain' => '
					' . 'Несколько тегов, разделяемые запятой.' . '
					' . $__compilerTemp3 . '
				',
		)) . '
		';
	}
	$__compilerTemp4 = '';
	if ((!$__vars['xf']['visitor']['user_id']) AND (!$__templater->method($__vars['forum'], 'canCreateThreadPreReg', array()))) {
		$__compilerTemp4 .= '
			' . $__templater->formTextBoxRow(array(
			'name' => '_xfUsername',
			'data-xf-init' => 'guest-username',
			'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
		), array(
			'rowtype' => 'fullWidth noGutter',
			'label' => 'Имя',
		)) . '
		';
	} else if ($__vars['xf']['visitor']['user_id']) {
		$__compilerTemp4 .= '
			' . $__templater->callMacro('helper_thread_options', 'watch_input', array(
			'thread' => $__vars['thread'],
			'rowType' => 'fullWidth noGutter noLabel',
			'visible' => false,
		), $__vars) . '
		';
	}
	$__compilerTemp5 = '';
	if ($__vars['attachmentData']) {
		$__compilerTemp5 .= '
			' . $__templater->callMacro('helper_attach_upload', 'uploaded_files_list', array(
			'attachments' => $__vars['attachmentData']['attachments'],
		), $__vars) . '
		';
	}
	$__compilerTemp6 = '';
	$__compilerTemp7 = '';
	$__compilerTemp7 .= '
						';
	if ($__vars['attachmentData']) {
		$__compilerTemp7 .= '
							' . $__templater->callMacro('helper_attach_upload', 'upload_link_from_data', array(
			'attachmentData' => $__vars['attachmentData'],
		), $__vars) . '
						';
	}
	$__compilerTemp7 .= '

						';
	if ($__vars['xf']['options']['multiQuote']) {
		$__compilerTemp7 .= '
							' . $__templater->callMacro('multi_quote_macros', 'button', array(
			'href' => $__templater->func('link', array('threads/multi-quote', $__vars['thread'], ), false),
			'messageSelector' => '.js-post',
			'storageKey' => 'multiQuoteThread',
		), $__vars) . '
						';
	}
	$__compilerTemp7 .= '
					';
	if (strlen(trim($__compilerTemp7)) > 0) {
		$__compilerTemp6 .= '
				<div class="formButtonGroup-extra">
					' . $__compilerTemp7 . '
				</div>
			';
	}
	$__finalCompiled .= $__templater->form('

	<div class="js-quickThreadFields" data-xf-init="attachment-manager">

		' . $__compilerTemp1 . '

		' . $__templater->callMacro(null, 'forum_post_thread::type_chooser', array(
		'thread' => $__vars['thread'],
		'forum' => $__vars['forum'],
		'creatableThreadTypes' => $__vars['creatableThreadTypes'],
		'defaultThreadType' => $__vars['defaultThreadType'],
		'rowType' => 'fullWidth noGutter noBottomPadding noLabel mergeNext',
	), $__vars) . '

		' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['post']['message'],
		'rows' => '3',
		'data-min-height' => '100',
		'data-max-height' => '300',
		'placeholder' => 'Сообщение' . $__vars['xf']['language']['ellipsis'],
		'data-preview-url' => $__templater->func('link', array('forums/thread-preview', $__vars['forum'], ), false),
	), array(
		'rowtype' => 'fullWidth noGutter noLabel mergeNext',
		'label' => 'Сообщение',
	)) . '

		' . $__templater->callMacro(null, 'forum_post_thread::type_fields', array(
		'thread' => $__vars['thread'],
		'forum' => $__vars['forum'],
		'creatableThreadTypes' => $__vars['creatableThreadTypes'],
		'defaultThreadType' => $__vars['defaultThreadType'],
		'subContext' => 'quick',
		'formRowSepVariant' => 'formRowSep--noGutter',
	), $__vars) . '

		' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'threads',
		'set' => $__vars['thread']['custom_fields'],
		'editMode' => $__templater->method($__vars['thread'], 'getFieldEditMode', array(true, )),
		'onlyInclude' => $__vars['forum']['field_cache'],
		'rowType' => 'fullWidth noGutter',
		'requiredOnly' => ($__vars['inlineMode'] ? true : false),
	), $__vars) . '

		' . $__compilerTemp2 . '

		' . $__compilerTemp4 . '

		' . $__templater->formRowIfContent($__templater->func('captcha', array(false, false)), array(
		'label' => 'Проверка',
		'rowtype' => 'fullWidth noGutter noLabel',
	)) . '

		' . $__compilerTemp5 . '

		<div class="formButtonGroup">
			<div class="formButtonGroup-primary">
				' . $__templater->button('
					' . 'Создать тему' . '
				', array(
		'type' => 'submit',
		'class' => 'button--primary',
		'icon' => 'write',
	), '', array(
	)) . '

				' . $__templater->button('Дополнительные параметры' . $__vars['xf']['language']['ellipsis'], array(
		'type' => 'submit',
		'formnovalidate' => 'formnovalidate',
		'name' => 'more-options',
		'value' => '1',
		'title' => 'Показать полнофункциональную форму создания новой темы',
		'data-prevent-ajax' => 'true',
		'data-xf-init' => 'tooltip',
	), '', array(
	)) . '

				' . $__templater->button('
					<span class="u-srOnly">' . 'Отменить' . '</span>
				', array(
		'type' => 'reset',
		'class' => 'button--icon button--icon--cancel button--iconOnly',
		'title' => 'Отменить',
		'data-xf-init' => 'tooltip',
	), '', array(
	)) . '
			</div>
			' . $__compilerTemp6 . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('forums/post-thread', $__vars['forum'], ), false),
		'draft' => $__templater->func('link', array('forums/draft', $__vars['forum'], ), false),
	));
	return $__finalCompiled;
}
);