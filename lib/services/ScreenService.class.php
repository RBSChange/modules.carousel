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
	 * @param Integer $parentNodeId Parent node ID where to save the document (optionnal => can be null !).
	 * @return void
	 */
//	protected function preSave($document, $parentNodeId = null)
//	{
//
//	}


	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param Integer $parentNodeId Parent node ID where to save the document.
	 * @return void
	 */
//	protected function preInsert($document, $parentNodeId = null)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param Integer $parentNodeId Parent node ID where to save the document.
	 * @return void
	 */
//	protected function postInsert($document, $parentNodeId = null)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param Integer $parentNodeId Parent node ID where to save the document.
	 * @return void
	 */
//	protected function preUpdate($document, $parentNodeId = null)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param Integer $parentNodeId Parent node ID where to save the document.
	 * @return void
	 */
//	protected function postUpdate($document, $parentNodeId = null)
//	{
//	}

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

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @return void
	 */
//	protected function preDeleteLocalized($document)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @return void
	 */
//	protected function postDelete($document)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @return void
	 */
//	protected function postDeleteLocalized($document)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @return boolean true if the document is publishable, false if it is not.
	 */
//	public function isPublishable($document)
//	{
//		$result = parent::isPublishable($document);
//		return $result;
//	}


	/**
	 * Methode à surcharger pour effectuer des post traitement apres le changement de status du document
	 * utiliser $document->getPublicationstatus() pour retrouver le nouveau status du document.
	 * @param carousel_persistentdocument_screen $document
	 * @param String $oldPublicationStatus
	 * @param array<"cause" => String, "modifiedPropertyNames" => array, "oldPropertyValues" => array> $params
	 * @return void
	 */
//	protected function publicationStatusChanged($document, $oldPublicationStatus, $params)
//	{
//	}

	/**
	 * Correction document is available via $args['correction'].
	 * @param f_persistentdocument_PersistentDocument $document
	 * @param Array<String=>mixed> $args
	 */
//	protected function onCorrectionActivated($document, $args)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param String $tag
	 * @return void
	 */
//	public function tagAdded($document, $tag)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param String $tag
	 * @return void
	 */
//	public function tagRemoved($document, $tag)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $fromDocument
	 * @param f_persistentdocument_PersistentDocument $toDocument
	 * @param String $tag
	 * @return void
	 */
//	public function tagMovedFrom($fromDocument, $toDocument, $tag)
//	{
//	}

	/**
	 * @param f_persistentdocument_PersistentDocument $fromDocument
	 * @param carousel_persistentdocument_screen $toDocument
	 * @param String $tag
	 * @return void
	 */
//	public function tagMovedTo($fromDocument, $toDocument, $tag)
//	{
//	}

	/**
	 * Called before the moveToOperation starts. The method is executed INSIDE a
	 * transaction.
	 *
	 * @param f_persistentdocument_PersistentDocument $document
	 * @param Integer $destId
	 */
//	protected function onMoveToStart($document, $destId)
//	{
//	}

	/**
	 * @param carousel_persistentdocument_screen $document
	 * @param Integer $destId
	 * @return void
	 */
//	protected function onDocumentMoved($document, $destId)
//	{
//	}

	/**
	 * this method is call before save the duplicate document.
	 * If this method not override in the document service, the document isn't duplicable.
	 * An IllegalOperationException is so launched.
	 *
	 * @param f_persistentdocument_PersistentDocument $newDocument
	 * @param f_persistentdocument_PersistentDocument $originalDocument
	 * @param Integer $parentNodeId
	 *
	 * @throws IllegalOperationException
	 */
//	protected function preDuplicate($newDocument, $originalDocument, $parentNodeId)
//	{
//		throw new IllegalOperationException('This document cannot be duplicated.');
//	}
}