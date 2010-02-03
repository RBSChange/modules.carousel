<?php
/**
 * carousel_GenerateCarouselXmlCacheAction
 * @package modules.carousel.actions
 */
class carousel_GenerateCarouselXmlCacheAction extends f_action_BaseAction
{
	/**
	 * @param Context $context
	 * @param Request $request
	 */
	public function _execute($context, $request)
	{
		$carousel = $this->getDocumentInstanceFromRequest($request);
		carousel_CarouselService::getInstance()->generateXml($carousel);
		$this->setContentType('text/xml');
		readfile($carousel->getXmlPath());
	}
	
	public function isSecure()
	{
		return false;
	}
}