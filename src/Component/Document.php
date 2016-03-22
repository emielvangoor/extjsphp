<?php

namespace Bonsa\Extphp\Component;

use Bonsa\Extphp\Panel\Panel;

/**
 * Class Document
 * @package Bonsa\Extphp\Component
 *
 * @method Document setDocumentId(int $id) The document id
 * @method Document setModuleId(int $moduleid) The module id
 * @method Document setViewMode(string $mode) Sets the view mode (edit, view)
 */
class Document extends Panel
{
    /**
     * @var string
     */
    protected $xtype = 'mainform';

    /**
     * Document constructor.
     *
     * @param string $title
     * @param int $moduleid
     * @param int $itemid
     */
    public function __construct($title, $moduleid, $itemid, $mode = 'view')
    {
        parent::__construct([
            "title" => $title,
            "documentId" => $itemid,
            "moduleId" => $moduleid,
            "viewMode" => $mode,
        ]);
    }
}
