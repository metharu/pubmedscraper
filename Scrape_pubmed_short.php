<?php 

$info = file_get_contents("http://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id=18505755&retmode=xml");

$xml=simplexml_load_string($info);

$path = '/PubmedArticleSet/PubmedArticle/MedlineCitation/';

// PMID 
$PMID = $xml->xpath($path . 'PMID'); 
echo "PMID: <br />" . $PMID[0] . "<hr />"; 

// Year 
$Year = $xml->xpath($path . '/Journal/JournalIssue/PubDate/Year'); 
echo "Year: <br />" . $Year[0] . "<hr />"; 

// Journal Title 
$Title = $xml->xpath($path . '/Journal/Title'); 
echo "Title: <br />" . $Title[0] . "<hr />";

// ArticleTitle 
$ArticleTitle = $xml->xpath($path . '/ArticleTitle'); 
echo "ArticleTitle: <br />" . $ArticleTitle[0] . "<hr />"; 

// AbstractText 
$AbstractText[0] = $xml->xpath($path . '/Abstract/AbstractText'); 

foreach ($AbstractText[0] as $Abstractcomponent[0])
   {
      echo "AbstractText: <br />" . $Abstractcomponent[0] . "<hr />";
   }

?>