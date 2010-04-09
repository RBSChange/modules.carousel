<?php
/**
 * @license
 * Logiciel RBS Change© Société RBS, 2006-2007.
 * Le logiciel ne peut être copié, corrigé, traduit ou modifié sans l'autorisation
 * préalable de l'auteur selon le Code de la Propriété Intellectuelle (http://www.celog.fr/cpi/).
 * Consulter les Dispositions Générales de droit d'exploitation.
 * Tout contrefacteur pourra faire l’objet de poursuites judiciaires par la société RBS, auteur du logiciel.
 * --
 * RBS Change™, © 2006-2007 Ready Business System.
 * This application can not be copied, changed, translated, or modified in any way without
 * prior authorization from RBS, the author of the application, according to the French Code
 * of Intellectual Property (http://www.celog.fr/cpi/). Consult the Code's General Dispositions
 * about rights of use.
 * Any use of this application without prior authorization from RBS will be subject to legal
 * prosecution to the full extent of the law.
 *
 * @copyright RBS 2006-2007
 * @date Thu, 11 Jun 2009 09:18:32 +0000
 * @author intclail
 * @package 
 */
class carousel_ScreenService extends f_persistentdocument_DocumentService
{
	/**
	 * @var carousel_ScreenService
	 */
	private static $instance;

	/**
	 * @return carousel_ScreenService
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
	 * @return carousel_persistentdocument_screen
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_carousel/screen');
	}

	/**
	 * Create a query based on 'modules_carousel/screen' model
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->pp->createQuery('modules_carousel/screen');
	}
	

	/**
	 * @see f_persistentdocument_DocumentService::onPublicationStatusChanged()
	 *
	 * @param f_persistentdocument_PersistentDocument $document
	 * @param String $oldPublicationStatus
	 */
	protected function onPublicationStatusChanged($document, $oldPublicationStatus)
	{
		$parent = $this->getParentOf($document);
		carousel_CarouselService::getInstance()->clearXmlCache($parent);		
	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param Integer $parentNodeId Parent node ID where to save the document.
	 * @return void
	 */
	protected function postSave($document, $parentNodeId = null)
	{
		$parentDocument = DocumentHelper::getDocumentInstance($parentNodeId);
		carousel_CarouselService::getInstance()->clearXmlCache($parentDocument);
	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @return void
	 */
	protected function preDelete($document)
	{
		$parent = $this->getParentOf($document);
		carousel_CarouselService::getInstance()->clearXmlCache($parent);		
	}
}