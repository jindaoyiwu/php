<?php


namespace Modules\CheckOrder\Actions;


use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

class AccountExport
{
    public function __construct()
    {
        $headerRow = [];
        $dataRows = $this->_rows();
        $this->_export($headerRow, $dataRows);
    }

    private function _rows()
    {
        return [];
    }

    private function _export($headerRow, $dataRows)
    {
        $writer = WriterEntityFactory::createWriterFromFile('path/to/file.ext');
        $writer->setShouldUseInlineStrings(true)
            ->addRow($headerRow)
            ->addRows($dataRows)
            ->close();
    }
}
