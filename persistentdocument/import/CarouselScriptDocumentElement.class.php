<?php
/**
 * carousel_CarouselScriptDocumentElement
 * @package modules.carousel.persistentdocument.import
 */
class carousel_CarouselScriptDocumentElement extends import_ScriptDocumentElement
{
    /**
     * @return carousel_persistentdocument_carousel
     */
    protected function initPersistentDocument()
    {
    	return carousel_CarouselService::getInstance()->getNewDocumentInstance();
    }
    
    /**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_carousel/carousel');
	}
}