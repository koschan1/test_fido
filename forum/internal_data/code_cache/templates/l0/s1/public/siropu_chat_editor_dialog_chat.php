<?php
// FROM HASH: f5be6e735938f8f024bdcd71d6ef8c41
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chat image uploads');
	$__finalCompiled .= '

';
	$__templater->includeCss('attachments.less');
	$__finalCompiled .= '
';
	$__templater->includeCss('siropu_chat_attachments.less');
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'prod' => 'xf/attachment_manager-compiled.js',
		'dev' => 'vendor/flow.js/flow-compiled.js, xf/attachment_manager.js',
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['attachmentList'], 'empty', array())) {
		$__compilerTemp1 .= '
				<ul class="attachUploadList">
					';
		if ($__templater->isTraversable($__vars['attachmentList'])) {
			foreach ($__vars['attachmentList'] AS $__vars['attachment']) {
				$__compilerTemp1 .= '
						<li class="js-attachmentFile" data-attachment-id="' . $__templater->escape($__vars['attachment']['attachment_id']) . '" data-url="' . $__templater->func('link', array('attachments', $__vars['attachment'], ), true) . '">
							<span>
								';
				if ($__vars['attachment']['has_thumbnail']) {
					$__compilerTemp1 .= '
									<img src="' . $__templater->escape($__vars['attachment']['thumbnail_url']) . '" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" />
								';
				} else {
					$__compilerTemp1 .= '
									' . $__templater->fontAwesome('fa-file-alt fa-2x', array(
					)) . '
								';
				}
				$__compilerTemp1 .= '
							</span>
						</li>
					';
			}
		}
		$__compilerTemp1 .= '
				</ul>
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body block-row">
			<p>
				' . $__templater->button('
					' . $__templater->fontAwesome('fa-upload', array(
	)) . ' ' . 'Upload image' . '
				', array(
		'href' => $__templater->func('link', array('attachments/upload', null, array('type' => 'siropu_chat', 'context' => $__vars['attachmentData']['context'], 'hash' => $__vars['attachmentData']['hash'], ), ), false),
		'target' => '_blank',
		'class' => 'js-attachmentUpload button--link',
		'data-accept' => '.' . $__templater->filter($__vars['attachmentData']['constraints']['extensions'], array(array('join', array(',.', )),), false),
	), '', array(
	)) . '
			</p>

			<ul class="attachUploadList js-attachmentFiles u-hidden"></ul>

			' . $__compilerTemp1 . '

			<script type="text/template" class="js-attachmentUploadTemplate">
				<li class="js-attachmentFile" ' . $__templater->func('mustache', array('#attachment_id', 'data-attachment-id="{{attachment_id}}"', ), true) . ' data-url="' . $__templater->func('mustache', array('url', ), true) . '">
					 <span>
						  ' . $__templater->func('mustache', array('#thumbnail_url', '
							   <img src="' . $__templater->func('mustache', array('thumbnail_url', ), true) . '">
						  ')) . '
						  ' . $__templater->func('mustache', array('^thumbnail_url', '
							   <i class="attachUploadList-placeholder" aria-hidden="true"></i>
						  ')) . '
					 </span>
					 ' . $__templater->func('mustache', array('#uploading', '
						  ' . $__templater->button('
							   ' . 'Cancel' . '
						  ', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'cancel',
	), '', array(
	)) . '
					 ')) . '
					 ' . $__templater->func('mustache', array('#uploading', '
						  <div class="contentRow-spaced">
							   <div class="attachUploadList-progress js-attachmentProgress"></div>
							   <div class="attachUploadList-error js-attachmentError"></div>
						  </div>
					 ')) . '
				</li>
			</script>
		</div>
	</div>
	' . $__templater->formSubmitRow(array(
	), array(
		'html' => '
			' . $__templater->button('Insert selected', array(
		'icon' => 'add',
		'class' => 'button--primary siropuChatDialogInsert',
	), '', array(
	)) . '
			' . $__templater->button('Delete selected', array(
		'icon' => 'delete',
		'class' => 'siropuChatDialogDelete',
	), '', array(
	)) . '
		',
	)) . '
	' . $__templater->formHiddenVal('hash', $__vars['attachmentData']['hash'], array(
	)) . '
', array(
		'action' => $__templater->func('link', array('attachments/upload', null, array('type' => 'siropu_chat', 'context' => $__vars['attachmentData']['context'], 'hash' => $__vars['attachmentData']['hash'], ), ), false),
		'ajax' => 'true',
		'class' => 'block siropuChatUploads',
		'data-xf-init' => 'attachment-manager',
		'autofocus' => 'off',
	));
	return $__finalCompiled;
}
);