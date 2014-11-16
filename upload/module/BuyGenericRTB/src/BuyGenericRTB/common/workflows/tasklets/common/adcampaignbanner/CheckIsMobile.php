<?php
/**
 * CDNPAL NGINAD Project
 *
 * @link http://www.nginad.com
 * @copyright Copyright (c) 2013-2015 CDNPAL Ltd. All Rights Reserved
 * @license GPLv3
 */

namespace buyrtb\workflows\tasklets\common\adcampaignbanner;

class CheckIsMobile {
	
	public static function execute(&$Logger, &$Workflow, \model\openrtb\RtbBidRequest &$RtbBidRequest, \model\openrtb\RtbBidRequestImp &$RtbBidRequestImp, &$AdCampaignBanner) {
	
		define('DEVICE_DESKTOP', 2);
		define('DEVICE_MOBILE', 1);
		define('DEVICE_TABLET', 5);
		
		/*
		 * Check is mobile web, phone, tablet, native iOS or native Android
		 */
		
		$is_mobile = 0;
		
		if ($RtbBidRequest->RtbBidRequestDevice->type != DEVICE_DESKTOP) {
			$is_mobile = 1;
		}
		
     	if ($is_mobile != $AdCampaignBanner->IsMobile):
       		if ($Logger->setting_log === true):
        		$Logger->log[] = "Failed: " . "Check is mobile web :: EXPECTED: " . $AdCampaignBanner->IsMobile . " GOT: " . $is_mobile;
      		endif;
     		continue;
		endif;
			
		return true;
	}
	

	
}
