<?php
/**
 * @package modules.carousel 
 */
class carousel_CarouselService extends f_persistentdocument_DocumentService
{
	/**
	 * @var carousel_CarouselService
	 */
	private static $instance;

	/**
	 * @return carousel_CarouselService
	 */
	public static function getInstance()
	{
		if (self::$instance === null)
		{
			self::$instance = self::getServiceClassInstance(get_class());
		}
		return self::$instance;
	}

	/**
	 * @return carousel_persistentdocument_carousel
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_carousel/carousel');
	}

	/**
	 * Create a query based on 'modules_carousel/carousel' model
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->pp->createQuery('modules_carousel/carousel');
	}

	/**
	 * @param carousel_persistentdocument_carousel $document
	 */
	public function generateXml($document)
	{
		$rc = RequestContext::getInstance();
		
		foreach ($rc->getSupportedLanguages() as $lang)
		{
			$rc->beginI18nWork($lang);

			if($document->isContextLangAvailable())
			{
				$domDoc = new DOMDocument();
		    	$domDoc->preserveWhiteSpace = false;
		    	
		    	$rootElement = $domDoc->documentElement;
				if (is_null($rootElement))
				{			
					$rootElement = $this->createRootElement($domDoc, $document);
					$domDoc->appendChild($rootElement);
				}
				
				$screens = $document->getChildrenPublishedScreens();
				
				foreach ($screens as $screen)
				{
					if($screen->getMedia()->isContextLangAvailable())
					{						
						$iconElement = $this->createIconElement($domDoc, $screen);			
						$rootElement->appendChild($iconElement);
					}
				}
				
				$domDoc->formatOutput = true;
				$content = $domDoc->saveXML();
				
				try
				{
					f_util_FileUtils::write($document->getXmlPath(), $content);	
				}
				catch (Exception $e)
				{
					throw $e;
				}					
			}
			
			$rc->endI18nWork();
		}		
	}
	
	/**
	 * @param DOMDocument $domDoc
	 * @param carousel_persistentdocument_carousel $document
	 * @return unknown
	 */
	private function createRootElement($domDoc, $document)
	{
		$rootElement = $domDoc->createElement('icons');
		$rootElement->setAttribute('radius_x', $document->getRadiusX());
		$rootElement->setAttribute('radius_y', $document->getRadiusY());
		$rootElement->setAttribute('center_x', $document->getCenterX());
		$rootElement->setAttribute('center_y', $document->getCenterY());
		$rootElement->setAttribute('speed', $document->getSpeed());
		$rootElement->setAttribute('image_width', $document->getImageWidth());
		$rootElement->setAttribute('reflection_height', $document->getReflectionHeight());
		$rootElement->setAttribute('perspectiv', $document->getPerspectiv());
		
		return $rootElement;
	}
	
	/**
	 * @param DOMDocument $domDoc
	 * @param carousel_persistentdocument_screen $document
	 * @return unknown
	 */
	private function createIconElement($domDoc, $screen)
	{
		$iconElement = $domDoc->createElement('icon');
		$iconElement->setAttribute('image', MediaHelper::getPublicUrl($screen->getMedia()));
		$iconElement->setAttribute('lien', LinkHelper::getDocumentUrl($screen->getLink()));
			
		return $iconElement;
	}
	
	/**
	 * @param carousel_persistentdocument_carousel $document
	 * @param Integer $parentNodeId Parent node ID where to save the document.
	 * @return void
	 */
	protected function postSave($document, $parentNodeId = null)
	{
		$this->clearXmlCache($document);
	}
	
	/**
	 * @param carousel_persistentdocument_carousel $document
	 */
	public function clearXmlCache($document)
	{
		if (file_exists($document->getXmlPath()))
		{
			f_util_FileUtils::unlink($document->getXmlPath());
		}
	}
	
	/**
	 * @param carousel_persistentdocument_carousel $document
	 * @return void
	 */
	protected function preDeleteLocalized($document)
	{
		$xmlPath = $document->getXmlPath();
		
		if(file_exists($xmlPath))
		{
			f_util_FileUtils::deleteTmpFile($xmlPath);
		}
	}
}