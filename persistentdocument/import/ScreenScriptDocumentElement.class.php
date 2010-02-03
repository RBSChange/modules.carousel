<?php
/**
 * carousel_ScreenScriptDocumentElement
 * @package modules.carousel.persistentdocument.import
 */
class carousel_ScreenScriptDocumentElement extends import_ScriptDocumentElement
{
    /**
     * @return carousel_persistentdocument_screen
     */
    protected function initPersistentDocument()
    {
    	return carousel_ScreenService::getInstance()->getNewDocumentInstance();
    }
    
    /**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_carousel/screen');
	}
}