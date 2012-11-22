<?php
function recuperer_news()
{
        $news = array();
 
        $req = mysql_query("SELECT id, auteur, titre, DATE_FORMAT(date, '%d/%m/%Y %H') AS date_formatee, contenu 
        FROM news
        ORDER BY date DESC");
        while ($data = mysql_fetch_assoc($req))
        {
                $news[] = $data;
        }
 
        return $news;
}
?>