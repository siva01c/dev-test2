<?php


class Path
{
    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }

    public function cd($newPath)
    {
        $dirStructure = explode('/', $this->currentPath);
        $newDir = explode('../', $newPath);
        $parentDir = count($dirStructure) - count($newDir);

        if (count($newDir) == 1) {
            $newDirStructure = [];
        }
        else {
            foreach ($dirStructure as $index => $folder) {
                if ($index <= $parentDir) {
                    $newDirStructure[] = $folder;
                }
            }
        }

        $newDirStructure[] = end($newDir);
        if (preg_match("/([\/]*[A-Za-z\/])+[A-Za-z]$/", $this->currentPath)) {
            $this->currentPath = implode('/',$newDirStructure);
        }
        else {
            echo "Invalid directory pattern.";
        }
    }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;
