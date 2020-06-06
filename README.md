# ihr.world Child Theme

Added some features needed for `ihr.world` website.



## No left menu on "full-width" template

```
.page-template-full-width div#main {
        
        position:absolute;
        width: 100%;
}

.page-template-full-width div#content {

        margin-left:0px;
}

.page-template-full-width div#secondary {
 display: none;
}

.page-template-full-width .entry-content {
 background-color: transparent;
}
```


## Search box superimposed on featured image

This has a "reusable block" and a CSS part.


The reusable block contains the URL for the search engine. The CSS block (below) contains the CSS to put the search form on the image. 

```
{
  "__file": "wp_block",
  "title": "Grupo Buscador / Base de Datos",
  "content": "<!-- wp:group {\"className\":\"buscador-imagen\"} -->\n<div class=\"wp-block-group buscador-imagen\"><div class=\"wp-block-group__inner-container\"><!-- wp:html -->\n<form class=\"wp-block-search\" role=\"search\" method=\"get\" target=\"_blank\" action=\"https://scwd.ihr.world/es/search\"><input type=\"search\" id=\"wp-block-search__input-1\" class=\"wp-block-search__input\" name=\"name\" value=\"\" placeholder=\"Nombres en 702.756 registros\"><button type=\"submit\" class=\"wp-block-search__button\" onclick=\"f=this.parentNode; l=document.location.pathname.substr(1,2); f.action = (l === 'es' ? 'https://scwd.ihr.world/es/search' : ( l === 'en' ? 'https://scwd.ihr.world/en/search' : 'https://scwd.ihr.world/ca/search')); f.submit();\">Buscar</button></form>\n<!-- /wp:html --></div></div>\n<!-- /wp:group -->"
}

```


```
/* Buscador Imágen */

 .buscador-imagen {
	position:absolute;
	width: 50%;
	margin-left: auto;
	top: 350px;
}

@media only screen and (max-width: 650px) {
 .buscador-imagen {
	top: 250px;
	width: 60%;
	margin-left: auto;
 }
}

@media only screen and (max-width: 450px) {
 .buscador-imagen {
	top: 200px;
	width: 80%;
	margin-left: auto;
}
}

@media only screen and (max-width: 350px) {
 .buscador-imagen {
	top: 150px;
	width: 90%;
	margin-left: auto;
 }
}




.buscador-imagen
figure {
	width:100%;
	position: relative;
	left: -20%;
}

.buscador-imagen form {
	opacity: 0.8;
	white-space: nowrap;
}

.buscador-imagen input[type=search] {
}

.buscador-imagen button {
	background-color: #374d33;
}

.buscador-imagen .wp-block-search {
	flex-wrap: nowrap;
	
}


```


## Remove duplicate "Read more" links in latest post blog

```
/* duplicate more link  */
.wp-block-latest-posts__post-excerpt .more-link {
	
	display: none;
}
```


## Excerpts on desktop tag archive pages

Make tag archive pages more like search results. 
Show excerpts (instead of full articles) in desktop view.

Added `|| is_tag()`  in `content.php`:

``` 
	<?php if ( is_search() || is_tag() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
```
