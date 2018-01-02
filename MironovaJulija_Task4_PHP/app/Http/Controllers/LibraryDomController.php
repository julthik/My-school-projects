<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;

class LibraryDomController extends Controller
{
    private $domDocument;
    private $xmlPath;
    
    public function __construct($xmlPath)   
    {
        $this->domDocument = new DOMDocument();
        $this->domDocument->preserveWhiteSpace = false;
        $this->domDocument->load($xmlPath);
        $this->domDocument->formatOutput = true;
        $this->xmlPath=$xmlPath;
    }

    public function __destruct()
    {
        unset($this->domDocument);
    }

    public function getAllNews()
    {
        $listNews=array();
        $news = $this->domDocument->getElementsByTagName("news");
        foreach ($news as $n) {
            $arrNews = array();
            $arrNews["id"] = $n->getAttribute("id");
            $arrNews["title"]  = $n->getElementsByTagName("title")->item(0)->nodeValue;
            $arrNews["description"]  = $n->getElementsByTagName("description")->item(0)->nodeValue;
            $arrNews["pubDate"]  = $n->getElementsByTagName("pubDate")->item(0)->nodeValue;
            $arrNews["link"]  = $n->getElementsByTagName("link")->item(0)->nodeValue;
            $arrNews["id_category"]  = $n->getElementsByTagName("id_category")->item(0)->nodeValue;
            $listNews[]=$arrNews;
        }
        return $listNews;
    }
    
    public function addNews($title, $description, $pubDate, $link, $id_category)
    {
        $newNews = $this->domDocument->createElement("article");
        
        $articles = $this->domDocument->getElementsByTagName("article");
        $id=1;
        foreach ($articles as $article) {
            $id++;
        }
        $this->domDocument->documentElement->appendChild($newNews);
        $newNews->setAttribute("id", $id);
        
        $titleElement = $this->domDocument->createElement("title", $title);
        $newNews->appendChild($titleElement);
        
        $descriptionElement = $this->domDocument->createElement("description", $description);
        $newNews->appendChild($descriptionElement);
        
        $pubDateElement = $this->domDocument->createElement("pubDate", $pubDate);
        $newNews->appendChild($pubDateElement);
        
        $linkElement = $this->domDocument->createElement("link", $link);
        $newNews->appendChild($linkElement);

        $id_categoryElement = $this->domDocument->createElement("id_category", $id_category);
        $newNews->appendChild($id_categoryElement);
        
        $this->domDocument->save($this->xmlPath); 
    } 
}
