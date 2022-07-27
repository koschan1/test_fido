<?php
// FROM HASH: ecfc2cc8829088d93d385af70f2d6180
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => 'command_options[rating]',
		'value' => ($__vars['command']['command_options']['rating'] ?: ''),
	), array(array(
		'value' => '',
		'label' => 'Учитывать все',
		'_type' => 'option',
	),
	array(
		'value' => 'g',
		'label' => '<b>G:</b> Content that is appropriate for all ages and people.',
		'_type' => 'option',
	),
	array(
		'value' => 'pg',
		'label' => '<b>PG:</b> Content that is generally safe for everyone, but may require parental preview before children can watch.',
		'_type' => 'option',
	),
	array(
		'value' => 'pg-13',
		'label' => '<b>PG-13:</b> Mild sexual innuendos, mild substance use, mild profanity, or threatening images. May include images of semi-naked people, but DOES NOT show real human genitalia or nudity.',
		'_type' => 'option',
	),
	array(
		'value' => 'r',
		'label' => '<b>R:</b> Strong language, strong sexual innuendo, violence, and illegal drug use; not suitable for teens or younger. NO NUDITY.',
		'_type' => 'option',
	)), array(
		'label' => 'Rating',
		'explain' => 'GIPHY Content Rating Specifics',
	));
	return $__finalCompiled;
}
);