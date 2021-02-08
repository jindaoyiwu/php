<?php


// 示例
$inputFileType = 'Xls';
$inputFileName = './sampleData/example2.xls';

class ChunkReadExcel implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    private $startRow = 0;
    private $endRow   = 0;

    /**  Set the list of rows that we want to read
     * @param $startRow
     * @param $chunkSize
     */
    public function setRows($startRow, $chunkSize) {
        $this->startRow = $startRow;
        $this->endRow   = $startRow + $chunkSize;
    }

    public function readCell($column, $row, $worksheetName = '') {
        //  Only read the heading row, and the configured rows
        if (($row == 1) || ($row >= $this->startRow && $row < $this->endRow)) {
            return true;
        }
        return false;
    }
}

/**  Create a new Reader of the type defined in $inputFileType  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

/**  Define how many rows we want to read for each "chunk"  **/
$chunkSize = 2048;
/**  Create a new Instance of our Read Filter  **/
$chunkFilter = new ChunkReadExcel();

/**  Tell the Reader that we want to use the Read Filter  **/
$reader->setReadFilter($chunkFilter);

/**  Loop to read our worksheet in "chunk size" blocks  **/
for ($startRow = 2; $startRow <= 65536; $startRow += $chunkSize) {
    /**  Tell the Read Filter which rows we want this iteration  **/
    $chunkFilter->setRows($startRow,$chunkSize);
    /**  Load only the rows that match our filter  **/
    $spreadsheet = $reader->load($inputFileName);
    //    Do some processing here
}
