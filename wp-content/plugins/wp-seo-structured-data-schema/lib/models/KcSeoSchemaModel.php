<?php

if ( ! class_exists( 'KcSeoSchemaModel' ) ):
	class KcSeoSchemaModel {
		function __construct() {

		}

		function schemaOutput( $schemaID, $metaData ) {
			$html = null;

			if ( $schemaID ) {
				global $KcSeoWPSchema;
				switch ( $schemaID ) {
					case "article":
						$article             = array();
						$article["@context"] = "http://schema.org";
						$article["@type"]    = "Article";
						if ( ! empty( $metaData['headline'] ) ) {
							$article["headline"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['headline'] );
						}
						if ( ! empty( $metaData['mainEntityOfPage'] ) ) {
							$article["mainEntityOfPage"] = array(
								"@type" => "WebPage",
								"@id"   => $KcSeoWPSchema->sanitizeOutPut( $metaData["mainEntityOfPage"] )
							);
						}
						if ( ! empty( $metaData['author'] ) ) {
							$article["author"] = array(
								"@type" => "Person",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['author'] )
							);
						}
						if ( ! empty( $metaData['publisher'] ) ) {
							if ( ! empty( $metaData['publisherImage'] ) ) {
								$img = $KcSeoWPSchema->imageInfo( absint( $metaData['publisherImage'] ) );
								$plA = array(
									"@type"  => "ImageObject",
									"url"    => $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' ),
									"height" => $img['height'],
									"width"  => $img['width']
								);
							} else {
								$plA = array();
							}
							$article["publisher"] = array(
								"@type" => "Organization",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['publisher'] ),
								"logo"  => $plA
							);
						}
						if ( ! empty( $metaData['alternativeHeadline'] ) ) {
							$article["alternativeHeadline"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['alternativeHeadline'] );
						}
						if ( ! empty( $metaData['image'] ) ) {
							$img              = $KcSeoWPSchema->imageInfo( absint( $metaData['image'] ) );
							$article["image"] = array(
								"@type"  => "ImageObject",
								"url"    => $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' ),
								"height" => $img['height'],
								"width"  => $img['width']
							);
						}
						if ( ! empty( $metaData['datePublished'] ) ) {
							$article["datePublished"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['datePublished'] );
						}
						if ( ! empty( $metaData['dateModified'] ) ) {
							$article["dateModified"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['dateModified'] );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$article["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( ! empty( $metaData['articleBody'] ) ) {
							$article["articleBody"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['articleBody'],
								'textarea' );
						}
						$html .= $this->get_jsonEncode( $article );
						break;

					case "news_article":
						$newsArticle             = array();
						$newsArticle["@context"] = "http://schema.org";
						$newsArticle["@type"]    = "NewsArticle";
						if ( ! empty( $metaData['headline'] ) ) {
							$newsArticle["headline"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['headline'] );
						}
						if ( ! empty( $metaData['mainEntityOfPage'] ) ) {
							$newsArticle["mainEntityOfPage"] = array(
								"@type" => "WebPage",
								"@id"   => $KcSeoWPSchema->sanitizeOutPut( $metaData["mainEntityOfPage"] )
							);
						}
						if ( ! empty( $metaData['author'] ) ) {
							$newsArticle["author"] = array(
								"@type" => "Person",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['author'] )
							);
						}
						if ( ! empty( $metaData['image'] ) ) {
							$img                  = $KcSeoWPSchema->imageInfo( absint( $metaData['image'] ) );
							$newsArticle["image"] = array(
								"@type"  => "ImageObject",
								"url"    => $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' ),
								"height" => $img['height'],
								"width"  => $img['width']
							);
						}
						if ( ! empty( $metaData['datePublished'] ) ) {
							$newsArticle["datePublished"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['datePublished'] );
						}
						if ( ! empty( $metaData['dateModified'] ) ) {
							$newsArticle["dateModified"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['dateModified'] );
						}
						if ( ! empty( $metaData['publisher'] ) ) {
							if ( ! empty( $metaData['publisherImage'] ) ) {
								$img = $KcSeoWPSchema->imageInfo( absint( $metaData['publisherImage'] ) );
								$plA = array(
									"@type"  => "ImageObject",
									"url"    => $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' ),
									"height" => $img['height'],
									"width"  => $img['width']
								);
							} else {
								$plA = array();
							}
							$newsArticle["publisher"] = array(
								"@type" => "Organization",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['publisher'] ),
								"logo"  => $plA
							);
						}
						if ( ! empty( $metaData['description'] ) ) {
							$newsArticle["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( ! empty( $metaData['articleBody'] ) ) {
							$newsArticle["articleBody"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['articleBody'],
								'textarea' );
						}
						$html .= $this->get_jsonEncode( $newsArticle );
						break;

					case "blog_posting":
						$blogPosting             = array();
						$blogPosting["@context"] = "http://schema.org";
						$blogPosting["@type"]    = "BlogPosting";
						if ( ! empty( $metaData['headline'] ) ) {
							$blogPosting["headline"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['headline'] );
						}
						if ( ! empty( $metaData['mainEntityOfPage'] ) ) {
							$blogPosting["mainEntityOfPage"] = array(
								"@type" => "WebPage",
								"@id"   => $KcSeoWPSchema->sanitizeOutPut( $metaData["mainEntityOfPage"] )
							);
						}
						if ( ! empty( $metaData['author'] ) ) {
							$blogPosting["author"] = array(
								"@type" => "Person",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['author'] )
							);
						}
						if ( ! empty( $metaData['image'] ) ) {
							$img                  = $KcSeoWPSchema->imageInfo( absint( $metaData['image'] ) );
							$blogPosting["image"] = array(
								"@type"  => "ImageObject",
								"url"    => $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' ),
								"height" => $img['height'],
								"width"  => $img['width']
							);
						}
						if ( ! empty( $metaData['datePublished'] ) ) {
							$blogPosting["datePublished"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['datePublished'] );
						}
						if ( ! empty( $metaData['dateModified'] ) ) {
							$blogPosting["dateModified"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['dateModified'] );
						}
						if ( ! empty( $metaData['publisher'] ) ) {
							if ( ! empty( $metaData['publisherImage'] ) ) {
								$img = $KcSeoWPSchema->imageInfo( absint( $metaData['publisherImage'] ) );
								$plA = array(
									"@type"  => "ImageObject",
									"url"    => $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' ),
									"height" => $img['height'],
									"width"  => $img['width']
								);
							} else {
								$plA = array();
							}
							$blogPosting["publisher"] = array(
								"@type" => "Organization",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['publisher'] ),
								"logo"  => $plA
							);
						}
						if ( ! empty( $metaData['description'] ) ) {
							$blogPosting["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( ! empty( $metaData['articleBody'] ) ) {
							$blogPosting["articleBody"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['articleBody'],
								'textarea' );
						}
						$html .= $this->get_jsonEncode( $blogPosting );
						break;

					case 'event':
						$event             = array();
						$event["@context"] = "http://schema.org";
						$event["@type"]    = "Event";
						if ( ! empty( $metaData['name'] ) ) {
							$event["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['startDate'] ) ) {
							$event["startDate"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['startDate'] );
						}
						if ( ! empty( $metaData['endDate'] ) ) {
							$event["endDate"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['endDate'] );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$event["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( ! empty( $metaData['performerName'] ) ) {
							$event["performer"] = array(
								"@type" => "Person",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['performerName'] )
							);
						}
						if ( ! empty( $metaData['image'] ) ) {
							$event["image"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['image'], 'url' );
						}
						if ( ! empty( $metaData['locationName'] ) ) {
							$event["location"] = array(
								"@type"   => "Place",
								"name"    => $KcSeoWPSchema->sanitizeOutPut( $metaData['locationName'] ),
								"address" => $KcSeoWPSchema->sanitizeOutPut( $metaData['locationAddress'] )
							);
						}
						if ( ! empty( $metaData['price'] ) ) {
							$event["offers"] = array(
								"@type"         => "Offer",
								"price"         => $KcSeoWPSchema->sanitizeOutPut( $metaData['price'] ),
								"priceCurrency" => ! empty( $metaData['priceCurrency'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['priceCurrency'] ) : null,
								"url"           => ! empty( $metaData['url'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['url'],
									'url' ) : null
							);
						}
						if ( ! empty( $metaData['url'] ) ) {
							$event["url"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['url'], 'url' );
						}
						$html .= $this->get_jsonEncode( $event );
						break;

					case 'product':
						$product             = array();
						$product["@context"] = "http://schema.org";
						$product["@type"]    = "Product";
						if ( ! empty( $metaData['name'] ) ) {
							$product["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['image'] ) ) {
							$img              = $KcSeoWPSchema->imageInfo( absint( $metaData['image'] ) );
							$product["image"] = $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$product["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'] );
						}
						if ( ! empty( $metaData['brand'] ) ) {
							$product["brand"] = array(
								"@type" => "Thing",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['brand'] )
							);
						}
						if ( ! empty( $metaData['ratingValue'] ) ) {
							$product["aggregateRating"] = array(
								"@type"       => "AggregateRating",
								"ratingValue" => ! empty( $metaData['ratingValue'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['ratingValue'] ) : null,
								"reviewCount" => ! empty( $metaData['reviewCount'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['reviewCount'] ) : null
							);
						}
						if ( ! empty( $metaData['price'] ) ) {
							$product["offers"] = array(
								"@type"         => "Offer",
								"price"         => $KcSeoWPSchema->sanitizeOutPut( $metaData['price'] ),
								"priceCurrency" => ! empty( $metaData['priceCurrency'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['priceCurrency'] ) : null,
								"itemCondition" => ! empty( $metaData['itemCondition'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['itemCondition'] ) : null,
								"availability"  => ! empty( $metaData['availability'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['availability'] ) : null,
								"url"           => ! empty( $metaData['url'] ) ? $KcSeoWPSchema->sanitizeOutPut( $metaData['url'] ) : null
							);
						}
						$html .= $this->get_jsonEncode( $product );
						break;

					case 'video':
						$video             = array();
						$video["@context"] = "http://schema.org";
						$video["@type"]    = "VideoObject";
						if ( ! empty( $metaData['name'] ) ) {
							$video["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$video["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$video["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'] );
						}
						if ( ! empty( $metaData['thumbnailUrl'] ) ) {
							$video["thumbnailUrl"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['thumbnailUrl'], 'url' );
						}
						if ( ! empty( $metaData['uploadDate'] ) ) {
							$video["uploadDate"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['uploadDate'] );
						}
						if ( ! empty( $metaData['duration'] ) ) {
							$video["duration"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['duration'] );
						}
						if ( ! empty( $metaData['contentUrl'] ) ) {
							$video["contentUrl"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['contentUrl'], 'url' );
						}
						if ( ! empty( $metaData['interactionCount'] ) ) {
							$video["interactionCount"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['interactionCount'] );
						}
						if ( ! empty( $metaData['expires'] ) ) {
							$video["expires"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['expires'] );
						}
						$html .= $this->get_jsonEncode( $video );
						break;

					case 'service':
						$service             = array();
						$service["@context"] = "http://schema.org";
						$service["@type"]    = "Service";
						if ( ! empty( $metaData['name'] ) ) {
							$service["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['serviceType'] ) ) {
							$service["serviceType"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['serviceType'] );
						}
						/*
						if ( ! empty( $metaData['locationName'] ) ) {
							$service["location"] = array(
								"@type"   => "Place",
								"name"    => $KcSeoWPSchema->sanitizeOutPut( $metaData['locationName'] ),
								"address" => $KcSeoWPSchema->sanitizeOutPut( $metaData['locationAddress'] )
							);
						}*/
						if ( ! empty( $metaData['award'] ) ) {
							$service["award"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['award'] );
						}
						if ( ! empty( $metaData['category'] ) ) {
							$service["category"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['category'] );
						}
						if ( ! empty( $metaData['providerMobility'] ) ) {
							$service["providerMobility"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['providerMobility'] );
						}
						if ( ! empty( $metaData['additionalType'] ) ) {
							$service["additionalType"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['additionalType'] );
						}
						if ( ! empty( $metaData['alternateName'] ) ) {
							$service["alternateName"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['alternateName'] );
						}
						if ( ! empty( $metaData['image'] ) ) {
							$service["image"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['image'] );
						}
						if ( ! empty( $metaData['mainEntityOfPage'] ) ) {
							$service["mainEntityOfPage"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['mainEntityOfPage'] );
						}
						if ( ! empty( $metaData['sameAs'] ) ) {
							$service["sameAs"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['sameAs'] );
						}
						if ( ! empty( $metaData['url'] ) ) {
							$service["url"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['url'], 'url' );
						}
						$html .= $this->get_jsonEncode( $service );
						break;

					case 'review':
						$review             = array();
						$review["@context"] = "http://schema.org";
						$review["@type"]    = "Review";
						if ( ! empty( $metaData['itemName'] ) ) {
							$review["itemReviewed"] = array(
								"@type" => "Thing",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['itemName'] )
							);
						}
						if ( ! empty( $metaData['ratingValue'] ) ) {
							$review["reviewRating"] = array(
								"@type"       => "Rating",
								"ratingValue" => $KcSeoWPSchema->sanitizeOutPut( $metaData['ratingValue'] ),
								"bestRating"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['bestRating'] ),
								"worstRating" => $KcSeoWPSchema->sanitizeOutPut( $metaData['worstRating'] )
							);
						}
						if ( ! empty( $metaData['name'] ) ) {
							$review["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['author'] ) ) {
							$review["author"] = array(
								"@type" => "Person",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['author'] )
							);
						}
						if ( ! empty( $metaData['reviewBody'] ) ) {
							$review["reviewBody"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['reviewBody'] );
						}
						if ( ! empty( $metaData['datePublished'] ) ) {
							$review["datePublished"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['datePublished'] );
						}
						if ( ! empty( $metaData['publisher'] ) ) {
							$review["publisher"] = array(
								"@type" => "Organization",
								"name"  => $KcSeoWPSchema->sanitizeOutPut( $metaData['publisher'] )
							);
						}
						$html .= $this->get_jsonEncode( $review );
						break;
					case 'aggregate_rating':
						$aRating             = array();
						$aRating["@context"] = "http://schema.org";
						$aRating["@type"]    = ! empty( $metaData['schema_type'] ) ? $metaData['schema_type'] : "LocalBusiness";
						if ( ! empty( $metaData['name'] ) ) {
							$aRating["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$aRating["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( $aRating["@type"] != "Organization" ) {
							if ( ! empty( $metaData['image'] ) ) {
								$img              = $KcSeoWPSchema->imageInfo( absint( $metaData['image'] ) );
								$aRating["image"] = array(
									"@type"  => "ImageObject",
									"url"    => $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' ),
									"height" => $img['height'],
									"width"  => $img['width']
								);
							}
							if ( ! empty( $metaData['priceRange'] ) ) {
								$aRating["priceRange"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['priceRange'] );
							}
							if ( ! empty( $metaData['telephone'] ) ) {
								$aRating["telephone"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['telephone'] );
							}

							if ( ! empty( $metaData['address'] ) ) {
								$aRating["address"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['address'] );
							}
						}

						if ( ! empty( $metaData['ratingValue'] ) ) {
							$rValue                = array();
							$rValue["@type"]       = "AggregateRating";
							$rValue["ratingValue"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['ratingValue'] );
							if ( ! empty( $metaData['bestRating'] ) ) {
								$rValue["bestRating"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['bestRating'] );
							}
							if ( ! empty( $metaData['worstRating'] ) ) {
								$rValue["worstRating"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['worstRating'] );
							}
							if ( ! empty( $metaData['ratingCount'] ) ) {
								$rValue["ratingCount"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['ratingCount'] );
							}

							$aRating["aggregateRating"] = $rValue;
						}
						$html .= $this->get_jsonEncode( $aRating );
						break;

					case 'restaurant':
						$restaurant             = array();
						$restaurant["@context"] = "http://schema.org";
						$restaurant["@type"]    = "Restaurant";
						if ( ! empty( $metaData['name'] ) ) {
							$restaurant["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$restaurant["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( ! empty( $metaData['openingHours'] ) ) {
							$restaurant["openingHours"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['openingHours'],
								'textarea' );
						}
						if ( ! empty( $metaData['telephone'] ) ) {
							$restaurant["telephone"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['telephone'] );
						}
						if ( ! empty( $metaData['menu'] ) ) {
							$restaurant["menu"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['menu'], 'url' );
						}
						if ( ! empty( $metaData['image'] ) ) {
							$img                 = $KcSeoWPSchema->imageInfo( absint( $metaData['image'] ) );
							$restaurant["image"] = $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' );
						}
						if ( ! empty( $metaData['address'] ) ) {
							$restaurant["address"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['address'], 'textarea' );
						}
						if ( ! empty( $metaData['priceRange'] ) ) {
							$restaurant["priceRange"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['priceRange'] );
						}
						if ( ! empty( $metaData['servesCuisine'] ) ) {
							$restaurant["servesCuisine"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['servesCuisine'] );
						}
						$html .= $this->get_jsonEncode( $restaurant );
						break;

					case 'localBusiness':
						$localBusiness             = array();
						$localBusiness["@context"] = "http://schema.org";
						$localBusiness["@type"]    = "LocalBusiness";
						if ( ! empty( $metaData['name'] ) ) {
							$localBusiness["name"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['name'] );
						}
						if ( ! empty( $metaData['description'] ) ) {
							$localBusiness["description"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['description'],
								'textarea' );
						}
						if ( ! empty( $metaData['image'] ) ) {
							$img                    = $KcSeoWPSchema->imageInfo( absint( $metaData['image'] ) );
							$localBusiness["image"] = $KcSeoWPSchema->sanitizeOutPut( $img['url'], 'url' );
						}
						if ( ! empty( $metaData['priceRange'] ) ) {
							$localBusiness["priceRange"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['priceRange'] );
						}
						if ( ! empty( $metaData['addressLocality'] ) || ! empty( $metaData['addressRegion'] )
						     || ! empty( $metaData['postalCode'] ) || ! empty( $metaData['streetAddress'] ) ) {
							$localBusiness["address"] = array(
								"@type"           => "PostalAddress",
								"addressLocality" => $KcSeoWPSchema->sanitizeOutPut( $metaData['addressLocality'] ),
								"addressRegion"   => $KcSeoWPSchema->sanitizeOutPut( $metaData['addressRegion'] ),
								"postalCode"      => $KcSeoWPSchema->sanitizeOutPut( $metaData['postalCode'] ),
								"streetAddress"   => $KcSeoWPSchema->sanitizeOutPut( $metaData['streetAddress'] )
							);
						}

						if ( ! empty( $metaData['telephone'] ) ) {
							$localBusiness["telephone"] = $KcSeoWPSchema->sanitizeOutPut( $metaData['telephone'] );
						}
						$html .= $this->get_jsonEncode( $localBusiness );
						break;

					default:
						break;
				}

			}

			return $html;
		}

		function get_field( $data ) {
			$html = null;
			global $KcSeoWPSchema;
			$id    = $data['id'];
			$name  = $data['name'];
			$value = $data['value'];
			$attr  = !empty($data['attr']) ? $data['attr'] : null;

			$class       = isset( $data['class'] ) ? ( $data['class'] ? $data['class'] : null ) : null;
			$require     = ( isset( $data['required'] ) ? ( $data['required'] ? "<span class='required'>*</span>" : null ) : null );
			$title       = ( isset( $data['title'] ) ? ( $data['title'] ? $data['title'] : null ) : null );
			$desc        = ( isset( $data['desc'] ) ? ( $data['desc'] ? $data['desc'] : null ) : null );
			$holderClass = ( ! empty( $data['holderClass'] ) ? $data['holderClass'] : null );
			$html        .= "<div class='field-container {$holderClass}' id='" . $id . '-container' . "'>";
			$html        .= "<label class='field-label' for='{$id}'>{$title}{$require}</label>";
			$html        .= "<div class='field-content' id='" . $id . '-content' . "'>";
			switch ( $data['type'] ) {
				case 'checkbox':
					$checked = ( $value ? "checked" : null );
					$html    .= "<div class='kSeo-checkbox-wrapper'>";
					$html    .= "<label for='{$id}'><input type='checkbox' id='{$id}' class='{$class}' name='{$name}' {$checked} value='1' /> Enable</label>";
					$html    .= "</div>";
					break;

				case 'text':
					$html .= "<input type='text' id='{$id}' class='{$class}' name='{$name}' value='" . esc_html( $value ) . "' />";
					break;

				case 'number':
						$html .= "<input type='number' {$attr} id='{$id}' class='{$class}' name='{$name}' value='" . esc_attr( $value ) . "' />";
					break;
				case 'textarea':
					$html .= "<textarea id='{$id}' class='{$class}' name='{$name}' >" . wp_kses( $value,
							array() ) . "</textarea>";
					break;

				case 'image':
					$html    .= '<div class="kSeo-image">';
					$ImageId = ! empty( $value ) ? absint( $value ) : 0;
					$image   = $ingInfo = null;
					if ( $ImageId ) {
						$image   = wp_get_attachment_image( $ImageId, "thumbnail" );
						$imgData = $KcSeoWPSchema->imageInfo( $ImageId );
						$ingInfo .= "<span><strong>URL: </strong>{$imgData['url']}</span>";
						$ingInfo .= "<span><strong>Width: </strong>{$imgData['width']}px</span>";
						$ingInfo .= "<span><strong>Height: </strong>{$imgData['height']}px</span>";
					}
					$html .= "<div class='kSeo-image-wrapper'>";
					$html .= '<span class="kSeoImgAdd"><span class="dashicons dashicons-plus-alt"></span></span>';
					$html .= '<span class="kSeoImgRemove ' . ( $image ? null : "kSeo-hidden" ) . '"><span class="dashicons dashicons-trash"></span></span>';
					$html .= '<div class="kSeo-image-preview">' . $image . '</div>';
					$html .= "<input type='hidden' name='{$name}' value='" . absint( $ImageId ) . "' />";
					$html .= "</div>";
					$html .= "<div class='image-info'>{$ingInfo}</div>";
					$html .= '</div>';
					break;
				case 'select':
					$html .= "<select name='{$name}' class='select2 {$class}' id='{$id}'>";
					if ( ! empty( $data['empty'] ) ) {
						$html .= "<option value=''>{$data['empty']}</option>";
					}
					if ( ! empty( $data['options'] ) && is_array( $data['options'] ) ) {
						if ( $this->isAssoc( $data['options'] ) ) {
							foreach ( $data['options'] as $optKey => $optValue ) {
								$slt  = ( $optKey == $value ? "selected" : null );
								$html .= "<option value='" . esc_attr( $optKey ) . "' {$slt}>" . esc_html( $optValue ) . "</option>";
							}
						} else {
							foreach ( $data['options'] as $optValue ) {
								$slt  = ( $optValue == $value ? "selected" : null );
								$html .= "<option value='" . esc_attr( $optValue ) . "' {$slt}>" . esc_html( $optValue ) . "</option>";
							}
						}
					}
					$html .= "</select>";
					break;
				default:
					$html .= "<input id='{$id}' type='{$data['type']}' value='" . esc_attr( $value ) . "' name='$name' />";
					break;

			}
			$html .= "<p class='description'>{$desc}</p>";
			$html .= "</div>";
			$html .= "</div>";

			return $html;
		}

		public function schemaTypes() {
			return array(
				'article'          => array(
					'title'  => "Article",
					'fields' => array(
						'active'              => array(
							'type' => 'checkbox'
						),
						'headline'            => array(
							'title'    => 'Headline',
							'type'     => 'text',
							'desc'     => 'Article title',
							'required' => true
						),
						'mainEntityOfPage'    => array(
							'title'    => 'Page URL',
							'type'     => 'url',
							'desc'     => 'The canonical URL of the article page',
							'required' => true
						),
						'author'              => array(
							'title'    => 'Author Name',
							'type'     => 'text',
							'desc'     => 'Author display name',
							'required' => true
						),
						'image'               => array(
							'title'    => 'Article Feature Image',
							'type'     => 'image',
							'required' => true,
							'desc'     => 'Images should be at least 696 pixels wide.<br>Images should be in .jpg, .png, or. gif format.'
						),
						'datePublished'       => array(
							'title'    => 'Published date',
							'type'     => 'text',
							'class'    => 'kcseo-date',
							'required' => true,
							'desc'     => 'Like this: 2015-12-25'
						),
						'dateModified'        => array(
							'title'    => 'Modified date',
							'type'     => 'text',
							'class'    => 'kcseo-date',
							'required' => true,
							'desc'     => 'Like this: 2015-12-25'
						),
						'publisher'           => array(
							'title'    => 'Publisher',
							'type'     => 'text',
							'desc'     => 'Publisher name or Organization name',
							'required' => true
						),
						'publisherImage'      => array(
							'title'    => 'Publisher Logo',
							'type'     => 'image',
							'desc'     => 'Logos should have a wide aspect ratio, not a square icon.<br>Logos should be no wider than 600px, and no taller than 60px.<br>Always retain the original aspect ratio of the logo when resizing. Ideally, logos are exactly 60px tall with width <= 600px. If maintaining a height of 60px would cause the width to exceed 600px, downscale the logo to exactly 600px wide and reduce the height accordingly below 60px to maintain the original aspect ratio.<br>',
							'required' => true
						),
						'description'         => array(
							'title' => 'Description',
							'type'  => 'textarea',
							'desc'  => 'Short description'
						),
						'articleBody'         => array(
							'title' => 'Article body',
							'type'  => 'textarea',
							'desc'  => 'Article content'
						),
						'alternativeHeadline' => array(
							'title' => 'Alternative headline',
							'type'  => 'text',
							'desc'  => 'A secondary headline for the article.'
						),
					)
				),
				'blog_posting'     => array(
					'title'  => 'Blog Posting',
					'fields' => array(
						'active'           => array(
							'type' => 'checkbox'
						),
						'headline'         => array(
							'title'    => 'Headline',
							'type'     => 'text',
							'desc'     => 'Blog posting title',
							'required' => true
						),
						'mainEntityOfPage' => array(
							'title'    => 'Page URL',
							'type'     => 'url',
							'desc'     => 'The canonical URL of the article page',
							'required' => true
						),
						'author'           => array(
							'title'    => 'Author name',
							'type'     => 'text',
							'desc'     => 'Author display name',
							'required' => true
						),
						'image'            => array(
							'title'    => 'Feature Image',
							'type'     => 'image',
							'desc'     => "The representative image of the article. Only a marked-up image that directly belongs to the article should be specified.<br> Images should be at least 696 pixels wide. <br>Images should be in .jpg, .png, or. gif format.",
							'required' => true
						),
						'datePublished'    => array(
							'title'    => 'Published date',
							'type'     => 'text',
							'class'    => 'kcseo-date',
							'desc'     => 'Like this: 2015-12-25',
							'required' => true
						),
						'dateModified'     => array(
							'title'    => 'Modified date',
							'type'     => 'text',
							'class'    => 'kcseo-date',
							'desc'     => 'Like this: 2015-12-25',
							'required' => true
						),
						'publisher'        => array(
							'title'    => 'Publisher',
							'type'     => 'text',
							'desc'     => 'Publisher name or Organization name',
							'required' => true
						),
						'publisherImage'   => array(
							'title'    => 'Publisher Logo',
							'type'     => 'image',
							'desc'     => "Logos should have a wide aspect ratio, not a square icon.<br>Logos should be no wider than 600px, and no taller than 60px.<br>Always retain the original aspect ratio of the logo when resizing. Ideally, logos are exactly 60px tall with width <= 600px. If maintaining a height of 60px would cause the width to exceed 600px, downscale the logo to exactly 600px wide and reduce the height accordingly below 60px to maintain the original aspect ratio.<br>",
							'required' => true
						),
						'description'      => array(
							'title' => 'Description',
							'type'  => 'textarea',
							'desc'  => 'Short description'
						),
						'articleBody'      => array(
							'title' => 'Article body',
							'type'  => 'textarea',
							'desc'  => 'Article content'
						)
					)
				),
				'news_article'     => array(
					'title'  => 'News Article',
					'fields' => array(
						'active'           => array(
							'type' => 'checkbox'
						),
						'headline'         => array(
							'title'    => 'Headline',
							'type'     => 'text',
							'desc'     => 'Article title',
							'required' => true
						),
						'mainEntityOfPage' => array(
							'title'    => 'Page URL',
							'type'     => 'url',
							'desc'     => 'The canonical URL of the article page',
							'required' => true
						),
						'author'           => array(
							'title'    => 'Author',
							'type'     => 'text',
							'desc'     => 'Author display name',
							'required' => true
						),
						'image'            => array(
							'title'    => 'Image',
							'type'     => 'image',
							'desc'     => "The representative image of the article. Only a marked-up image that directly belongs to the article should be specified.<br> Images should be at least 696 pixels wide. <br>Images should be in .jpg, .png, or. gif format.",
							'required' => true
						),
						'datePublished'    => array(
							'title'    => 'Published date',
							'type'     => 'text',
							'class'    => 'kcseo-date',
							'desc'     => 'Like this: 2015-12-25',
							'required' => true
						),
						'dateModified'     => array(
							'title'    => 'Modified date',
							'type'     => 'text',
							'class'    => 'kcseo-date',
							'required' => true,
							'desc'     => 'Like this: 2015-12-25'
						),
						'publisher'        => array(
							'title'    => 'Publisher',
							'type'     => 'text',
							'desc'     => 'Publisher name or Organization name',
							'required' => true
						),
						'publisherImage'   => array(
							'title'    => 'Publisher Logo',
							'type'     => 'image',
							'desc'     => 'Logos should have a wide aspect ratio, not a square icon.<br>Logos should be no wider than 600px, and no taller than 60px.<br>Always retain the original aspect ratio of the logo when resizing. Ideally, logos are exactly 60px tall with width <= 600px. If maintaining a height of 60px would cause the width to exceed 600px, downscale the logo to exactly 600px wide and reduce the height accordingly below 60px to maintain the original aspect ratio.<br>',
							'required' => true
						),
						'description'      => array(
							'title' => 'Description',
							'type'  => 'textarea',
							'desc'  => 'Short description'
						),
						'articleBody'      => array(
							'title' => 'Article body',
							'type'  => 'textarea',
							'desc'  => 'Article body content'
						)
					)
				),
				'event'            => array(
					'title'  => 'Event',
					'fields' => array(
						'active'          => array(
							'type' => 'checkbox'
						),
						'name'            => array(
							'title'    => 'Name',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The name of the event."
						),
						'locationName'    => array(
							'title'    => 'Location name',
							'type'     => 'text',
							'required' => true,
							'desc'     => "Event Location name"
						),
						'locationAddress' => array(
							'title'    => 'Location address',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The location of for example where the event is happening, an organization is located, or where an action takes place."
						),
						'startDate'       => array(
							'title'    => 'Start date',
							'type'     => 'text',
							'class'    => 'kcseo-date',
							'required' => true,
							'desc'     => "Event start date"
						),
						'endDate'         => array(
							'title' => 'End date (Recommended)',
							'type'  => 'text',
							'class' => 'kcseo-date',
							'desc'  => "Event end date"
						),
						'description'     => array(
							'title' => 'Description (Recommended)',
							'type'  => 'textarea',
							'desc'  => "Event description"
						),
						'performerName'   => array(
							'title' => 'Performer Name (Recommended)',
							'type'  => 'text',
							'desc'  => "The performer's name."
						),
						'image'           => array(
							'title' => 'Image URL (Recommended)',
							'type'  => 'url',
							'desc'  => "URL of an image or logo for the event or tour"
						),
						'price'           => array(
							'title' => 'Price (Recommended)',
							'type'  => 'number',
							'attr'  => 'step="any"',
							'desc'  => "This is highly recommended. The lowest available price, including service charges and fees, of this type of ticket. <span class='required'>Not required but (Recommended)</span>"
						),
						'priceCurrency'   => array(
							'title' => 'Price currency',
							'type'  => 'text',
							'desc'  => "The 3-letter currency code. (USD)"
						),
						'url'             => array(
							'title'       => 'URL (Recommended)',
							'type'        => 'url',
							'placeholder' => 'URL',
							'desc'        => "A link to the event's details page. <span class='required'>Not required but (Recommended)</span>"
						),
					)
				),
				'product'          => array(
					'title'  => 'Product',
					'fields' => array(
						'active'        => array(
							'type' => 'checkbox'
						),
						'name'          => array(
							'title'    => 'Name',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The name of the product."
						),
						'image'         => array(
							'title' => 'Image',
							'type'  => 'image',
							'desc'  => "The URL of a product photo. Pictures clearly showing the product, e.g. against a white background, are preferred."
						),
						'description'   => array(
							'title' => 'Description',
							'type'  => 'textarea',
							'desc'  => "Product description."
						),
						'brand'         => array(
							'title' => 'Brand',
							'type'  => 'text',
							'desc'  => "The brand of the product."
						),
						'ratingValue'   => array(
							'title' => 'Ratting value',
							'type'  => 'number',
							'desc'  => "Rating value. (1 , 2.5, 3, 5 etc)"
						),
						'reviewCount'   => array(
							'title' => 'Total review count',
							'type'  => 'number',
							'attr'  => 'step="any"',
							'desc'  => "Rating ratting value. <span class='required'>This is required if (Ratting value) is given</span>"
						),
						'price'         => array(
							'title' => 'Price',
							'type'  => 'number',
							'attr'  => 'step="any"',
							'desc'  => "The lowest available price, including service charges and fees, of this type of ticket."
						),
						'priceCurrency' => array(
							'title' => 'Price currency',
							'type'  => 'text',
							'desc'  => "The 3-letter currency code."
						),
						'availability'  => array(
							'title'   => 'Availability',
							'type'    => 'select',
							'empty'   => "Select one",
							'options' => array(
								'http://schema.org/InStock'             => 'InStock',
								'http://schema.org/InStoreOnly'         => 'InStoreOnly',
								'http://schema.org/OutOfStock'          => 'OutOfStock',
								'http://schema.org/SoldOut'             => 'SoldOut',
								'http://schema.org/OnlineOnly'          => 'OnlineOnly',
								'http://schema.org/LimitedAvailability' => 'LimitedAvailability',
								'http://schema.org/Discontinued'        => 'Discontinued',
								'http://schema.org/PreOrder'            => 'PreOrder',
							),
							'desc'    => "Select a availability type",
						),
						'itemCondition' => array(
							'title'   => 'Product condition',
							'type'    => 'select',
							'empty'   => "Select one",
							'options' => array(
								'http://schema.org/NewCondition'         => 'NewCondition',
								'http://schema.org/UsedCondition'        => 'UsedCondition',
								'http://schema.org/DamagedCondition'     => 'DamagedCondition',
								'http://schema.org/RefurbishedCondition' => 'RefurbishedCondition',
							),
							'desc'    => "Select a condition"
						),
						'url'           => array(
							'title' => 'Product URL',
							'type'  => 'url',
							'desc'  => "A URL to the product web page (that includes the Offer). (Don't use offerURL for markup that appears on the product page itself.)"
						),
					)
				),
				'video'            => array(
					'title'  => 'Video',
					'fields' => array(
						'active'           => array(
							'type' => 'checkbox'
						),
						'name'             => array(
							'title'    => 'Name',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The title of the video"
						),
						'description'      => array(
							'title'    => 'Description',
							'type'     => 'textarea',
							'required' => true,
							'desc'     => "The description of the video"
						),
						'thumbnailUrl'     => array(
							'title'       => 'Thumbnail URL',
							'type'        => 'url',
							'placeholder' => "URL",
							'required'    => true,
							'desc'        => "A URL pointing to the video thumbnail image file. Images must be at least 160x90 pixels and at most 1920x1080 pixels."
						),
						'uploadDate'       => array(
							'title' => 'Updated date',
							'type'  => 'text',
							'class' => 'kcseo-date',
							'desc'  => '2015-02-05T08:00:00+08:00'
						),
						'duration'         => array(
							'title' => 'Duration',
							'type'  => 'text',
							'desc'  => "The duration of the video in ISO 8601 format.(PT1M33S)"
						),
						'contentUrl'       => array(
							'title'       => 'Content URL',
							'type'        => 'url',
							'placeholder' => 'URL',
							'desc'        => "A URL pointing to the actual video media file. This file should be in .mpg, .mpeg, .mp4, .m4v, .mov, .wmv, .asf, .avi, .ra, .ram, .rm, .flv, or other video file format."
						),
						'embedUrl'         => array(
							'title'       => 'Embed URL',
							'placeholder' => 'URL',
							'type'        => 'url',
							'desc'        => "A URL pointing to a player for the specific video. Usually this is the information in the src element of an < embed> tag.Example: Dailymotion: http://www.dailymotion.com/swf/x1o2g."
						),
						'interactionCount' => array(
							'title' => 'Interaction count',
							'type'  => 'text',
							'desc'  => "The number of times the video has been viewed."
						),
						'expires'          => array(
							'title' => 'Expires',
							'type'  => 'text',
							'class' => 'kcseo-date',
							'desc'  => "Like this: 2015-12-25"
						),
					)
				),
				'service'          => array(
					'title'  => 'Service',
					'fields' => array(
						'active'           => array(
							'type' => 'checkbox'
						),
						'name'             => array(
							'title'    => 'Name',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The name of the Service."
						),
						'serviceType'      => array(
							'title'    => 'Service type',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The type of service being offered, e.g. veterans' benefits, emergency relief, etc."
						),
						'additionalType'   => array(
							'title'       => 'Additional type(URL)',
							'type'        => 'url',
							'placeholder' => 'URL',
							'desc'        => "An additional type for the service, typically used for adding more specific types from external vocabularies in microdata syntax."
						),
						'award'            => array(
							'title' => 'Award',
							'type'  => 'text',
							'desc'  => "An award won by or for this service."
						),
						'category'         => array(
							'title' => 'Category',
							'type'  => 'text',
							'desc'  => "A category for the service."
						),
						'providerMobility' => array(
							'title' => 'Provider mobility',
							'type'  => 'text',
							'desc'  => "Indicates the mobility of a provided service (e.g. 'static', 'dynamic')."
						),
						'description'      => array(
							'title'   => 'Description',
							'type'    => 'textarea',
							'require' => true,
							'desc'    => "A short description of the service."
						),
						'image'            => array(
							'title'   => 'Image URL',
							'type'    => 'url',
							'require' => false,
							'desc'    => "An image of the service. This should be a URL."
						),
						'mainEntityOfPage' => array(
							'title'   => 'Main entity of page URL',
							'type'    => 'url',
							'require' => false,
							'desc'    => "Indicates a page (or other CreativeWork) for which this thing is the main entity being described."
						),
						'sameAs'           => array(
							'title'       => 'Same as URL',
							'type'        => 'url',
							'placeholder' => 'URL',
							'desc'        => "URL of a reference Web page that unambiguously indicates the service's identity. E.g. the URL of the service's Wikipedia page, Freebase page, or official website."
						),
						'url'              => array(
							'title'       => 'Url of the service',
							'type'        => 'url',
							'placeholder' => 'URL',
							'desc'        => "URL of the service."
						),
						'alternateName'    => array(
							'title' => 'Alternate name',
							'type'  => 'text',
							'desc'  => 'An alias for the service.'
						),
					)
				),
				'review'           => array(
					'title'  => 'Review',
					'fields' => array(
						'active'        => array(
							'type' => 'checkbox'
						),
						'itemName'      => array(
							'title'    => 'Name of the reviewed item',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The item that is being reviewed."
						),
						'reviewBody'    => array(
							'title'    => 'Review body',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The actual body of the review."
						),
						'name'          => array(
							'title'    => 'Review name',
							'type'     => 'text',
							'required' => true,
							'desc'     => "A particular name for the review."
						),
						'author'        => array(
							'title'    => 'Author',
							'type'     => 'text',
							'required' => true,
							'author'   => 'Author name',
							'desc'     => "The author of the review. The reviewer’s name needs to be a valid name."
						),
						'datePublished' => array(
							'title' => 'Date of Published',
							'type'  => 'text',
							'class' => 'kcseo-date',
							'desc'  => "Like this: 2015-12-25"
						),
						'ratingValue'   => array(
							'title' => 'Rating value',
							'type'  => 'number',
							'attr'  => 'step="any"',
							'desc'  => "A numerical quality rating for the item."
						),
						'bestRating'    => array(
							'title' => 'Best rating',
							'type'  => 'number',
							'attr'  => 'step="any"',
							'desc'  => "The highest value allowed in this rating system."
						),
						'worstRating'   => array(
							'title' => 'Worst rating',
							'type'  => 'number',
							'attr'  => 'step="any"',
							'desc'  => "The lowest value allowed in this rating system. * Required if the rating system is not on a 5-point scale. If worstRating is omitted, 1 is assumed."
						),
						'publisher'     => array(
							'title' => 'Name of the organization',
							'type'  => 'text',
							'desc'  => 'The publisher of the review.'
						)
					)
				),
				'aggregate_rating' => array(
					'title'  => 'Aggregate Ratings',
					'fields' => array(
						'active'      => array(
							'type' => 'checkbox'
						),
						'schema_type' => array(
							'title'    => 'Schema type',
							'type'     => 'select',
							'required' => true,
							'options'  => $this->site_type(),
							'empty'    => "Select one",
							'desc'     => "Use the most appropriate schema type for what is being reviewed."
						),
						'name'        => array(
							'title'    => 'Name of the item',
							'type'     => 'text',
							'required' => true,
							'desc'     => "The item that is being rated."
						),
						'image'       => array(
							'title'       => 'Image',
							'type'        => 'image',
							'required'    => true,
							'holderClass' => 'kSeo-hidden aggregate-except-organization-holder'
						),
						'priceRange'  => array(
							'title'       => 'Price Range (Recommended)',
							'type'        => 'text',
							'holderClass' => 'kSeo-hidden aggregate-except-organization-holder',
							'desc'        => "The price range of the business, for example $$$."
						),
						'telephone'   => array(
							'title'       => 'Telephone (Recommended)',
							'type'        => 'text',
							'holderClass' => 'kSeo-hidden aggregate-except-organization-holder'
						),
						'address'     => array(
							'title'       => 'Address (Recommended)',
							'type'        => 'text',
							'holderClass' => 'kSeo-hidden aggregate-except-organization-holder',
						),
						'description' => array(
							'title' => 'Description',
							'type'  => 'textarea',
							'desc'  => "Description for thr review"
						),
						'ratingCount' => array(
							'title'    => 'Rating Count',
							'type'     => 'number',
							'attr'  => 'step="any"',
							'required' => true,
							'desc'     => "The total number of ratings for the item on your site. <span class='required'>* At least one of ratingCount or reviewCount is required.</span>"
						),
						'reviewCount' => array(
							'title'    => 'Review Count',
							'type'     => 'number',
							'attr'  => 'step="any"',
							'required' => true,
							'desc'     => "Specifies the number of people who provided a review with or without an accompanying rating. At least one of ratingCount or reviewCount is required."
						),
						'ratingValue' => array(
							'title'    => 'Rating Value',
							'type'     => 'number',
							'attr'  => 'step="any"',
							'required' => true,
							'desc'     => "A numerical quality rating for the item."
						),
						'ratingValue' => array(
							'title'    => 'Rating Value',
							'attr'  => 'step="any"',
							'type'     => 'number',
							'required' => true,
							'desc'     => "A numerical quality rating for the item."
						),
						'bestRating'  => array(
							'title'    => 'Best Rating',
							'type'     => 'number',
							'attr'  => 'step="any"',
							'required' => true,
							'desc'     => "The highest value allowed in this rating system. <span class='required'>* Required if the rating system is not a 5-point scale.</span> If bestRating is omitted, 5 is assumed."
						),
						'worstRating' => array(
							'title'    => 'Worst Rating',
							'type'     => 'number',
							'attr'  => 'step="any"',
							'required' => true,
							'desc'     => "The lowest value allowed in this rating system. <span class='required'>* Required if the rating system is not a 5-point scale.</span> If worstRating is omitted, 1 is assumed."
						)
					)
				),
				'restaurant'       => array(
					'title'  => 'Restaurant',
					'fields' => array(
						'active'        => array(
							'type' => 'checkbox'
						),
						'name'          => array(
							'title'    => 'Name of the Restaurant',
							'type'     => 'text',
							'required' => true
						),
						'description'   => array(
							'title' => 'Description of the Restaurant',
							'type'  => 'textarea',
						),
						'openingHours'  => array(
							'title' => 'Opening Hours',
							'type'  => 'textarea',
							'desc'  => 'Mo,Tu,We,Th,Fr,Sa,Su 11:30-23:00'
						),
						'telephone'     => array(
							'title' => 'Opening Hours',
							'type'  => 'text',
							'desc'  => '+155501003333'
						),
						'menu'          => array(
							'title' => 'Menu',
							'type'  => 'text',
							'desc'  => 'http://example.com/menu'
						),
						'image'         => array(
							'title'    => 'Image',
							'type'     => 'image',
							'required' => true
						),
						'address'       => array(
							'title' => 'Address',
							'type'  => 'textarea'
						),
						'priceRange'    => array(
							'title' => 'Price Range',
							'type'  => 'text',
							'desc'  => 'The price range of the business, for example $$$'
						),
						'servesCuisine' => array(
							'title' => 'Serves Cuisine',
							'type'  => 'text',
							'desc'  => 'The cuisine of the restaurant.'
						)
					)
				),
				'localBusiness'    => array(
					'title'  => 'Local Business',
					'fields' => array(
						'active'          => array(
							'type' => 'checkbox'
						),
						'name'            => array(
							'title'    => 'Name',
							'type'     => 'text',
							'required' => true
						),
						'description'     => array(
							'title' => 'Description',
							'type'  => 'textarea',
						),
						'image'           => array(
							'title'    => 'Business Logo',
							'type'     => 'image',
							'required' => true
						),
						'priceRange'      => array(
							'title' => 'Price Range (Recommended)',
							'type'  => 'text',
							'desc'  => "The price range of the business, for example $$$."
						),
						'addressLocality' => array(
							'title' => 'Address locality',
							'type'  => 'text',
							'desc'  => 'City (i.e Kansas city)'
						),
						'addressRegion'   => array(
							'title' => 'Address region',
							'type'  => 'text',
							'desc'  => 'State (i.e. MO)'
						),
						'postalCode'      => array(
							'title' => 'Postal code',
							'type'  => 'text',
						),
						'streetAddress'   => array(
							'title' => 'Street address',
							'type'  => 'text',
						),
						'telephone'       => array(
							'title' => 'Telephone (Recommended)',
							'type'  => 'text',
						)
					)
				)
			);
		}

		function get_jsonEncode( $data = array() ) {
			$html = null;
			/** @var TYPE_NAME $data */
			if ( ! empty( $data ) && is_array( $data ) ) {
				$html .= '<script type="application/ld+json">' . json_encode( $data,
						JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) . '</script>';
			}

			return $html;
		}

		function site_type() {
			return array(
				'Organization',
				'LocalBusiness',
				'AccountingService',
				'AutoBodyShop',
				'AutoDealer',
				'AutoPartsStore',
				'AutoRental',
				'AutoRepair',
				'AutoWash',
				'Bakery',
				'BarOrPub',
				'BeautySalon',
				'BedAndBreakfast',
				'BikeStore',
				'BookStore',
				'CafeOrCoffeeShop',
				'ChildCare',
				'ClothingStore',
				'ComputerStore',
				'DaySpa',
				'Dentist',
				'DryCleaningOrLaundry',
				'Electrician',
				'ElectronicsStore',
				'EmergencyService',
				'EntertainmentBusiness',
				'EventVenue',
				'ExerciseGym',
				'FinancialService',
				'Florist',
				'FoodEstablishment',
				'FurnitureStore',
				'GardenStore',
				'GeneralContractor',
				'GolfCourse',
				'HairSalon',
				'HardwareStore',
				'HealthAndBeautyBusiness',
				'HobbyShop',
				'Store',
				'HomeAndConstructionBusiness',
				'HomeGoodsStore',
				'Hospital',
				'Hotel',
				'HousePainter',
				'HVACBusiness',
				'HVACBusiness',
				'InsuranceAgency',
				'JewelryStore',
				'LegalService',
				'LiquorStore',
				'Locksmith',
				'LodgingBusiness',
				'MedicalClinic',
				'MensClothingStore',
				'MobilePhoneStore',
				'Motel',
				'MotorcycleDealer',
				'MotorcycleRepair',
				'MovingCompany',
				'MusicStore',
				'NailSalon',
				'NightClub',
				'Notary',
				'OfficeEquipmentStore',
				'Optician',
				'Person',
				'PetStore',
				'Physician',
				'Plumber',
				'ProfessionalService',
				'RealEstateAgent',
				'Residence',
				'Restaurant',
				'RoofingContractor',
				'RVPark',
				'School',
				'SelfStorage',
				'ShoeStore',
				'SkiResort',
				'SportingGoodsStore',
				'SportsClub',
				'Store',
				'TattooParlor',
				'Taxi',
				'TennisComplex',
				'TireShop',
				'ToyStore',
				'TravelAgency',
				'VeterinaryCare',
				'WholesaleStore',
				'Winery'
			);
		}

		function countryList() {
			return array(
				"AF" => "Afghanistan",
				"AX" => "Aland Islands",
				"AL" => "Albania",
				"DZ" => "Algeria",
				"AS" => "American Samoa",
				"AD" => "Andorra",
				"AO" => "Angola",
				"AI" => "Anguilla",
				"AQ" => "Antarctica",
				"AG" => "Antigua and Barbuda",
				"AR" => "Argentina",
				"AM" => "Armenia",
				"AW" => "Aruba",
				"AU" => "Australia",
				"AT" => "Austria",
				"AZ" => "Azerbaijan",
				"BS" => "Bahamas",
				"BH" => "Bahrain",
				"BD" => "Bangladesh",
				"BB" => "Barbados",
				"BY" => "Belarus",
				"BE" => "Belgium",
				"BZ" => "Belize",
				"BJ" => "Benin",
				"BM" => "Bermuda",
				"BT" => "Bhutan",
				"BO" => "Bolivia, Plurinational State of",
				"BQ" => "Bonaire, Sint Eustatius and Saba",
				"BA" => "Bosnia and Herzegovina",
				"BW" => "Botswana",
				"BV" => "Bouvet Island",
				"BR" => "Brazil",
				"IO" => "British Indian Ocean Territory",
				"BN" => "Brunei Darussalam",
				"BG" => "Bulgaria",
				"BF" => "Burkina Faso",
				"BI" => "Burundi",
				"KH" => "Cambodia",
				"CM" => "Cameroon",
				"CA" => "Canada",
				"CV" => "Cape Verde",
				"KY" => "Cayman Islands",
				"CF" => "Central African Republic",
				"TD" => "Chad",
				"CL" => "Chile",
				"CN" => "China",
				"CX" => "Christmas Island",
				"CC" => "Cocos (Keeling) Islands",
				"CO" => "Colombia",
				"KM" => "Comoros",
				"CG" => "Congo",
				"CD" => "Congo, the Democratic Republic of the",
				"CK" => "Cook Islands",
				"CR" => "Costa Rica",
				"CI" => "Côte d Ivoire",
				"HR" => "Croatia",
				"CU" => "Cuba",
				"CW" => "Curaçao",
				"CY" => "Cyprus",
				"CZ" => "Czech Republic",
				"DK" => "Denmark",
				"DJ" => "Djibouti",
				"DM" => "Dominica",
				"DO" => "Dominican Republic",
				"EC" => "Ecuador",
				"EG" => "Egypt",
				"SV" => "El Salvador",
				"GQ" => "Equatorial Guinea",
				"ER" => "Eritrea",
				"EE" => "Estonia",
				"ET" => "Ethiopia",
				"FK" => "Falkland Islands (Malvinas)",
				"FO" => "Faroe Islands",
				"FJ" => "Fiji",
				"FI" => "Finland",
				"FR" => "France",
				"GF" => "French Guiana",
				"PF" => "French Polynesia",
				"TF" => "French Southern Territories",
				"GA" => "Gabon",
				"GM" => "Gambia",
				"GE" => "Georgia",
				"DE" => "Germany",
				"GH" => "Ghana",
				"GI" => "Gibraltar",
				"GR" => "Greece",
				"GL" => "Greenland",
				"GD" => "Grenada",
				"GP" => "Guadeloupe",
				"GU" => "Guam",
				"GT" => "Guatemala",
				"GG" => "Guernsey",
				"GN" => "Guinea",
				"GW" => "Guinea-Bissau",
				"GY" => "Guyana",
				"HT" => "Haiti",
				"HM" => "Heard Island and McDonald Islands",
				"VA" => "Holy See (Vatican City State)",
				"HN" => "Honduras",
				"HK" => "Hong Kong",
				"HU" => "Hungary",
				"IS" => "Iceland",
				"IN" => "India",
				"ID" => "Indonesia",
				"IR" => "Iran, Islamic Republic of",
				"IQ" => "Iraq",
				"IE" => "Ireland",
				"IM" => "Isle of Man",
				"IL" => "Israel",
				"IT" => "Italy",
				"JM" => "Jamaica",
				"JP" => "Japan",
				"JE" => "Jersey",
				"JO" => "Jordan",
				"KZ" => "Kazakhstan",
				"KE" => "Kenya",
				"KI" => "Kiribati",
				"KP" => "Korea, Democratic People's Republic of",
				"KR" => "Korea, Republic of,",
				"KW" => "Kuwait",
				"KG" => "Kyrgyzstan",
				"LA" => "Lao Peoples Democratic Republic",
				"LV" => "Latvia",
				"LB" => "Lebanon",
				"LS" => "Lesotho",
				"LR" => "Liberia",
				"LY" => "Libya",
				"LI" => "Liechtenstein",
				"LT" => "Lithuania",
				"LU" => "Luxembourg",
				"MO" => "Macao",
				"MK" => "Macedonia, the former Yugoslav Republic of",
				"MG" => "Madagascar",
				"MW" => "Malawi",
				"MY" => "Malaysia",
				"MV" => "Maldives",
				"ML" => "Mali",
				"MT" => "Malta",
				"MH" => "Marshall Islands",
				"MQ" => "Martinique",
				"MR" => "Mauritania",
				"MU" => "Mauritius",
				"YT" => "Mayotte",
				"MX" => "Mexico",
				"FM" => "Micronesia, Federated States of",
				"MD" => "Moldova, Republic of",
				"MC" => "Monaco",
				"MN" => "Mongolia",
				"ME" => "Montenegro",
				"MS" => "Montserrat",
				"MA" => "Morocco",
				"MZ" => "Mozambique",
				"MM" => "Myanmar",
				"NA" => "Namibia",
				"NR" => "Nauru",
				"NP" => "Nepal",
				"NL" => "Netherlands",
				"NC" => "New Caledonia",
				"NZ" => "New Zealand",
				"NI" => "Nicaragua",
				"NE" => "Niger",
				"NG" => "Nigeria",
				"NU" => "Niue",
				"NF" => "Norfolk Island",
				"MP" => "Northern Mariana Islands",
				"NO" => "Norway",
				"OM" => "Oman",
				"PK" => "Pakistan",
				"PW" => "Palau",
				"PS" => "Palestine, State of",
				"PA" => "Panama",
				"PG" => "Papua New Guinea",
				"PY" => "Paraguay",
				"PE" => "Peru",
				"PH" => "Philippines",
				"PN" => "Pitcairn",
				"PL" => "Poland",
				"PT" => "Portugal",
				"PR" => "Puerto Rico",
				"QA" => "Qatar",
				"RE" => "Reunion",
				"RO" => "Romania",
				"RU" => "Russian Federation",
				"RW" => "Rwanda",
				"BL" => "Saint Barthélemy",
				"SH" => "Saint Helena, Ascension and Tristan da Cunha",
				"KN" => "Saint Kitts and Nevis",
				"LC" => "Saint Lucia",
				"MF" => "Saint Martin (French part)",
				"PM" => "Saint Pierre and Miquelon",
				"VC" => "Saint Vincent and the Grenadines",
				"WS" => "Samoa",
				"SM" => "San Marino",
				"ST" => "Sao Tome and Principe",
				"SA" => "Saudi Arabia",
				"SN" => "Senegal",
				"RS" => "Serbia",
				"SC" => "Seychelles",
				"SL" => "Sierra Leone",
				"SG" => "Singapore",
				"SX" => "Sint Maarten (Dutch part)",
				"SK" => "Slovakia",
				"SI" => "Slovenia",
				"SB" => "Solomon Islands",
				"SO" => "Somalia",
				"ZA" => "South Africa",
				"GS" => "South Georgia and the South Sandwich Islands",
				"SS" => "South Sudan",
				"ES" => "Spain",
				"LK" => "Sri Lanka",
				"SD" => "Sudan",
				"SR" => "Suriname",
				"SJ" => "Svalbard and Jan Mayen",
				"SZ" => "Swaziland",
				"SE" => "Sweden",
				"CH" => "Switzerland",
				"SY" => "Syrian Arab Republic",
				"TW" => "Taiwan, Province of China",
				"TJ" => "Tajikistan",
				"TZ" => "Tanzania, United Republic of",
				"TH" => "Thailand",
				"TL" => "Timor-Leste",
				"TG" => "Togo",
				"TK" => "Tokelau",
				"TO" => "Tonga",
				"TT" => "Trinidad and Tobago",
				"TN" => "Tunisia",
				"TR" => "Turkey",
				"TM" => "Turkmenistan",
				"TC" => "Turks and Caicos Islands",
				"TV" => "Tuvalu",
				"UG" => "Uganda",
				"UA" => "Ukraine",
				"AE" => "United Arab Emirates",
				"GB" => "United Kingdom",
				"US" => "United States",
				"UM" => "United States Minor Outlying Islands",
				"UY" => "Uruguay",
				"UZ" => "Uzbekistan",
				"VU" => "Vanuatu",
				"VE" => "Venezuela, Bolivarian Republic of",
				"VN" => "Viet Nam",
				"VG" => "Virgin Islands, British",
				"VI" => "Virgin Islands, U.S.",
				"WF" => "Wallis and Futuna",
				"EH" => "Western Sahara",
				"YE" => "Yemen",
				"ZM" => "Zambia",
				"ZW" => "Zimbabwe",
			);
		}

		function contactType() {
			return array(
				"Customer Service",
				"Technical Support",
				"Billing Support",
				"Bill Payment",
				"Sales",
				"Reservations",
				"Credit Card Support",
				"Emergency",
				"Baggage Tracking",
				"Roadside Assistance",
				"Package Tracking"
			);
		}

		function languageList() {
			return array(
				"Akan",
				"Amharic",
				"Arabic",
				"Assamese",
				"Awadhi",
				"Azerbaijani",
				"Balochi",
				"Belarusian",
				"Bengali",
				"Bhojpuri",
				"Burmese",
				"Cantonese",
				"Cebuano",
				"Chewa",
				"Chhattisgarhi",
				"Chittagonian",
				"Czech",
				"Deccan",
				"Dhundhari",
				"Dutch",
				"English",
				"French",
				"Fula",
				"Gan",
				"German",
				"Greek",
				"Gujarati",
				"Haitian Creole",
				"Hakka",
				"Haryanvi",
				"Hausa",
				"Hiligaynon",
				"Hindi / Urdu",
				"Hmong",
				"Hungarian",
				"Igbo",
				"Ilokano",
				"Italian",
				"Japanese",
				"Javanese",
				"Jin",
				"Kannada",
				"Kazakh",
				"Khmer",
				"Kinyarwanda",
				"Kirundi",
				"Konkani",
				"Korean",
				"Kurdish",
				"Madurese",
				"Magahi",
				"Maithili",
				"Malagasy",
				"Malay/Indonesian",
				"Malayalam",
				"Mandarin",
				"Marathi",
				"Marwari",
				"Min Bei",
				"Min Dong",
				"Min Nan",
				"Mossi",
				"Nepali",
				"Oriya",
				"Oromo",
				"Pashto",
				"Persian",
				"Polish",
				"Portuguese",
				"Punjabi",
				"Quechua",
				"Romanian",
				"Russian",
				"Saraiki",
				"Serbo-Croatian",
				"Shona",
				"Sindhi",
				"Sinhalese",
				"Somali",
				"Spanish",
				"Sundanese",
				"Swahili",
				"Swedish",
				"Sylheti",
				"Tagalog",
				"Tamil",
				"Telugu",
				"Thai",
				"Turkish",
				"Ukrainian",
				"Uyghur",
				"Uzbek",
				"Vietnamese",
				"Wu",
				"Xhosa",
				"Xiang",
				"Yoruba",
				"Zulu",
			);
		}

		function socialList() {
			return array(
				'facebook'    => __( 'Facebook' ),
				'twitter'     => __( 'Twitter' ),
				'google-plus' => __( 'Google+' ),
				'instagram'   => __( 'Instagram' ),
				'youtube'     => __( 'Youtube' ),
				'linkedin'    => __( 'LinkedIn' ),
				'myspace'     => __( 'Myspace' ),
				'pinterest'   => __( 'Pinterest' ),
				'soundcloud'  => __( 'SoundCloud' ),
				'tumblr'      => __( 'Tumblr' ),
				'wikidata'    => __( 'Wikidata' ),
			);
		}

		function imgInfo( $url = null ) {
			$img = array();
			if ( $url ) {
				$imgA = @getimagesize( $url );
				if ( is_array( $imgA ) && ! empty( $imgA ) ) {
					$img['width']  = $imgA[0];
					$img['height'] = $imgA[1];
				} else {
					$img['width']  = 0;
					$img['height'] = 0;
				}
			}

			return $img;
		}

		function isAssoc( $array ) {
			$keys = array_keys( $array );

			return $keys !== array_keys( $keys );
		}


	}
endif;