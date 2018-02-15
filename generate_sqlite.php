<?php

/**
 * Script for generating index for dash documentation from Doxygen docset
 * 
 */
$db = new sqlite3("html/org.doxygen.Project.docset/Contents/Resources/docSet.dsidx");
$db->query("CREATE TABLE searchIndex(id INTEGER PRIMARY KEY, name TEXT, type TEXT, path TEXT)");
$db->query("CREATE UNIQUE INDEX anchor ON searchIndex (name, type, path)");

// Making index for global functions
$d = new DOMDocument();
$d->loadHTMLfile("html/globals_func.html");
$xp = new DomXpath($d);
$query = "//li[//a[@class='el']]";
$res = $xp->query($query);
for ($itemIdx = 0; $itemIdx < $res->length; $itemIdx++) {
    $path = $res->item($itemIdx)->childNodes->item(1)->attributes->item(1)->textContent;
    $name = explode("(", $res->item($itemIdx)->nodeValue);
    $funcName = $name[0];
    $db->query("INSERT OR IGNORE INTO searchIndex(name, type, path) VALUES ('{$funcName}', 'Function', '{$path}')");
}

