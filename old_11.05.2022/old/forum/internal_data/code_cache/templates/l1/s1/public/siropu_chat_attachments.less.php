<?php
// FROM HASH: 140949ab0bd30499ed262acda4ae0197
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.siropuChatUploads
{
	.attachUploadList
	{
		background: none;
		border: 0;
		margin: 0;
		border-radius: 0;
		max-height: 400px;
		overflow: auto;

		li
		{
			display: inline-block;
			cursor: pointer;
			border: 0;
			padding: 0;

			img
			{
				&:hover
				{
					opacity: 0.5;
				}
			}

			&.js-attachmentFileSelected
			{
				span
				{
					position: relative;

					&:after
					{
						position: absolute;
						bottom: 5px;
						right: 5px;
						font-family: "Font Awesome 5 Pro";
						content: "\\f058";
						font-weight: 900;
						font-size: 25px;
					}
				}
				img
				{
					opacity: 0.5;
				}
			}
		}
	}

	.formSubmitRow-controls
	{
		display: none;
	}
}';
	return $__finalCompiled;
}
);