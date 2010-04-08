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
		return 'carousel_thumbnail_'.$id.'_'.$lang.'.xml';
	}
	
	public function getXmlLink()
	{
		return LinkHelper::getRessourceLink('/cache/www/xml/' . $this->buldXmlPath())->getUrl();
	}
	
	public function getXmlPath()
	{
		return f_util_FileUtils::buildWebCachePath('xml', $this->buldXmlPath());
	}
	
	public function getSwfLink()
	{
		return MediaHelper::getFrontofficeStaticUrl('carousel.swf');
	}
}