<?php
namespace RB;

use \WP_Query;

class RelatedVehicles
{
    protected $postId;
    protected $taxName;
    protected $terms;
    protected $relatedVehicles;
    
    public function __construct($postId, $taxName, $postType = 'vehicles')
    {
        $this->postId = $postId;
        $this->taxName = $taxName;
        $this->postType = $postType;

        $this->handle();

        return $this;
    }

    public function handle()
    {
        $this->findRelatedTerms();
        $this->getRelatedVehicles();

        $foundVehicles = $this->getRelatedVehiclesFoundCount();

        if ($foundVehicles == 0) {
            return $this->noVehiclesFound();
        } elseif ($foundVehicles < 4) {
            $this->addExtraPosts();
        }

        $this->ResponsePopulate();
    }

    public function getResult()
    {
        return $this->result;
    }

    public function findRelatedTerms()
    {
        $this->terms = get_the_terms($this->postId, $this->taxName);
        return $this->terms;
    }

    private function pluckIds()
    {
        return wp_list_pluck($this->terms, 'term_id');
    }

    private function getRelatedVehicles()
    {
        $terms_ids = $this->pluckIds();

        $args = array(
            'post_type' => $this->postType,
            'tax_query' => array(
                array(
                    'taxonomy' => $this->taxName,
                    'field' => 'id',
                    'terms' => $terms_ids,
                    'operator' => 'IN'
                ),
            ),
            'posts_per_page' => -1,
            'orderby' => 'rand',
        );
        $this->relatedVehicles =  new WP_Query($args);
    }

    private function ResponsePopulate()
    {
        $ret = array();
        $i = 0;
        $slicerPadding = 3;
        foreach ($this->relatedVehicles->posts as $vehicle) {
            $array_index = (int) $i / $slicerPadding;
            $ret[$array_index][] = $this->transformVehiclesData($vehicle);
            $i++;
        }

        $this->result = $ret;
    }

    private function getRelatedVehiclesFoundIds()
    {
        return wp_list_pluck($this->relatedVehicles->posts, 'ID');
    }

    private function getRelatedVehiclesFoundCount()
    {
        return $this->relatedVehicles->found_posts;
    }

    private function transformVehiclesData($vehicle)
    {
        $id = $vehicle->ID;
        $post_thumbnail = get_the_post_thumbnail($id);
        $title = get_the_title($id);
        $permalink = get_the_permalink($id);

        return array(
            'title' => $title,
            'post_thumbnail' => $post_thumbnail,
            'permalink' => esc_url($permalink)
        );
    }

    private function addExtraPosts()
    {
        $args = array(
            'post_type' => $this->postType,
            'posts_per_page' => rand(4, 10),
            'post__not_in' => $this->getRelatedVehiclesFoundIds(),
            'orderby' => 'rand'
        );
        $posts = new WP_Query($args);
        $this->relatedVehicles->posts = array_merge($this->relatedVehicles->posts, $posts->posts);
        $this->relatedVehicles->post_count = count($this->relatedVehicles->posts);
    }

    private function noVehiclesFound()
    {
        return array();
    }
}
