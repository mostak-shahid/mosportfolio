<?php 
global $mosportfolio_options; 
$logo_url = $mosportfolio_options['logo']['url'];
$contact_phone = $mosportfolio_options['contact-phone'];
$contact_email = $mosportfolio_options['contact-email'];
$contact_social = $mosportfolio_options['contact-social'];
if ($contact_social) :
    foreach ($contact_social as $social) :
        $social_links[$social['title']] = $social['link_url'];
    endforeach;
endif;
if ($social_links) $array = array_filter(array_values($social_links));

$schema_option = $mosportfolio_options['schema-option'];
$schema_street = $mosportfolio_options['schema-street'];
$schema_locality = $mosportfolio_options['schema-locality'];
$schema_region = $mosportfolio_options['schema-region'];
$schema_postal = $mosportfolio_options['schema-postal'];
$schema_slides = $mosportfolio_options['schema-slides'];
$snippets_option = $mosportfolio_options['snippets-option'];
$snippets_name = $mosportfolio_options['snippets-name'];
$snippets_value = $mosportfolio_options['snippets-value'];
$snippets_count = $mosportfolio_options['snippets-count'];
?>
<?php if($schema_option) : ?>
    <!--Common-->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org","@type": "Organization","url": "<?php echo get_home_url(); ?>","logo": "<?php echo $logo_url?>"<?php if ($social_links) : ?>,"sameAs" : <?php echo json_encode($array, JSON_UNESCAPED_SLASHES) ?><?php endif; ?>
        }
    </script>
    <script type="application/ld+json">
        { 
            "@context": "http://schema.org",
            "@type": "WebSite", 
            "url": "<?php echo get_home_url(); ?>", 
            "potentialAction": {
                "@type": "SearchAction", 
                "target": "<?php echo get_home_url(); ?>/?s={search_term}", "query-input": "required name=search_term" 
            } 
        }
    </script>



    <?php 
    if($schema_slides) :
        foreach ($schema_slides as $slide) : 
            /*$address = $slide['description'];
            $slices = explode(",",$address);*/
            if ($slide['url'] AND $slide['title']) :
            ?>
            <script type="application/ld+json">
                { 
                    "@context": "http://schema.org",
                    "@type": "<?php echo $slide['url'] ?>",
                    "url": "<?php echo home_url();?>",
                    "image": "<?php echo $logo_url?>",
                    "name": "<?php echo $slide['title'] ?>", 
                    "priceRange": "$$", 
                    "telephone": "<?php echo $contact_phone; ?>", 
                    "email": "<?php echo $contact_email; ?>", 
                    "address":
                    {
                        "@type":"PostalAddress",
                        "streetAddress":"<?php echo $schema_street ?>",
                        "addressLocality":"<?php echo $schema_locality ?>",
                        "addressRegion":"<?php echo $schema_region ?>",
                        "postalCode":"<?php echo $schema_postal ?>"
                    }
                }

            </script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>
<?php if ($snippets_option) : ?>
    <script type="application/ld+json">
    { 
        "@context": "http://schema.org",
        "@type": "Product",
        "name": "<?php echo $snippets_name ?>",//Primary Keyword
        "aggregateRating":
        {
            "@type": "AggregateRating",
            "ratingValue": "<?php echo $snippets_value ?>",//Google review rating
            "reviewCount": "<?php echo $snippets_count ?>"//Google review count
        }
    }
    </script>
<?php endif; ?>