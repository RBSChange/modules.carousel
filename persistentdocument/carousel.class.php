<?php
/**
 * carousel_persistentdocument_carousel
 * @package carousel
 */
class carousel_persistentdocument_carousel extends carousel_persistentdocument_carouselbase 
{
	private function buldXmlPath()
	{
		$lang = RequestContext::getInstance()->getLang();
		$id = $this->getId();
		return DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'xml' . DIRECTORY_SEPARATOR . 'carousel_thumbnail_'.$id.'_'.$lang.'.xml';
	}
	
	public function getXmlLink()
	{
		return website_WebsiteModuleService::getInstance()->getDefaultWebsite()->getUrl() . $this->buldXmlPath();
	}
	
	public function getXmlPath()
	{
		return WEBAPP_HOME . DIRECTORY_SEPARATOR . 'www' . $this->buldXmlPath();
	}
	
	public function getSwfLink()
	{
		return MediaHelper::getFrontofficeStaticUrl('carousel.swf');
	}
}