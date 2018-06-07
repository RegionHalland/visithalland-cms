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
				    'group_5b0ffc9a39c66'
				));
				$acfExportManager->import();
			}
		});
	}
}
