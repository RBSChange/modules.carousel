<?php
class carousel_BlockCarouselAction extends website_BlockAction
{
	/**
	 * @see website_BlockAction::execute()
	 *
	 * @param f_mvc_Request $request
	 * @param f_mvc_Response $response
	 * @return String
	 */
	function execute($request, $response)
	{
		$request->setAttribute('item', $this->getDocumentParameter('cmpref', 'carousel_persistentdocument_carousel'));
		return website_BlockView::SUCCESS;
	}
}