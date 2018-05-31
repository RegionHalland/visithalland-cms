<?php

namespace App\Acf;

class Import
{
	public function __construct()
	{
		/**
		 * ACF auto import and export fields
		 */
		add_action('init', function() {
			if (class_exists('AcfExportManager\AcfExportManager')) {
				$acfExportManager = new \AcfExportManager\AcfExportManager();
				$acfExportManager->setTextdomain('visithalland');
				$acfExportManager->setExportFolder(__DIR__);
				$acfExportManager->autoExport(array(
				    'group_5add78b8c9eda',
				    'group_58bfc3087f47d',
				    'group_5a6887c1b99c9',
				    'group_5a840e348cfe0',
				    'group_5af958a559612',
				    'group_58ac19b41643e',
				    'group_5acb39a64e81f',
				    'group_58a6da2dafd35',
				    'group_58aeb872c9fba',
				    'group_5a9417dc4fd8a',
				    'group_58ca966c25a5a',
				    'group_58aeb92ed11fa',
				    'group_58aebbeb1d5a1',
				    // Eng fields below
				    'group_5add79aeb25ec',
				    'group_5aaf622228eac',
				    'group_5a841970c7a65',
				    'group_5acb5974b41d4',
				    'group_5a841975e2e00',
				    'group_5a84197347045',
				    'group_5a8418857ce98',
				    'group_5a84196e0fec1',
				    'group_5acb5855bcfcf',
				    'group_5a8419580ca7d',
				    'group_5a841960a9a8b',
				    'group_5a841978e8c09',
				));
				$acfExportManager->import();
			}
		});
	}
}

