<?php

namespace CodebyCore;


class CustomPostType {
    static function labels(string $name, string $names, array $override = []): array
    {
        return array_merge(self::baseLabels($name, $names), $override);
    }

    protected static function baseLabels(string $name, string $names): array
    {
        return [
            'name' => _x($name, $name.' General Name', 'text_domain'),
            'singular_name' => _x($name, $name.' Singular Name', 'text_domain'),
            'menu_name' => __($names, 'text_domain'),
            'name_admin_bar' => __($name, 'text_domain'),
            'archives' => __($name.' Archives', 'text_domain'),
            'attributes' => __($name.' Attributes', 'text_domain'),
            'parent_item_colon' => __('Parent '.$name.':', 'text_domain'),
            'all_items' => __('All '.$names, 'text_domain'),
            'add_new_item' => __('Add New '.$name, 'text_domain'),
            'add_new' => __('Add New', 'text_domain'),
            'new_item' => __('New '.$name, 'text_domain'),
            'edit_item' => __('Edit '.$name, 'text_domain'),
            'update_item' => __('Update '.$name, 'text_domain'),
            'view_item' => __('View '.$name, 'text_domain'),
            'view_items' => __('View '.$names, 'text_domain'),
            'search_items' => __('Search '.$name, 'text_domain'),
            'not_found' => __('Not found', 'text_domain'),
            'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
            'featured_image' => __('Featured Image', 'text_domain'),
            'set_featured_image' => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image' => __('Use as featured image', 'text_domain'),
            'insert_into_item' => __('Insert into '.$name, 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this '.$name, 'text_domain'),
            'items_list' => __($names.' list', 'text_domain'),
            'items_list_navigation' => __($names.' list navigation', 'text_domain'),
            'filter_items_list' => __('Filter ' . $names . ' list', 'text_domain'),
        ];
    }

    static function args(string $name, int $position, string $icon, array $labels, array $override = []): array
    {
        return array_merge(self::baseArgs($name, $labels, $position, $icon), $override);
    }

    static function generator(string $name, string $names, int $position, string $icon, array $override = [], array $override2 = []): array
    {
        return self::args($name, $position, $icon, self::labels($name, $names, $override), $override2);
    }

    /**
     * @param string $name
     * @param array $labels
     * @param int $position
     * @param string $icon
     * @return array
     */
    public static function baseArgs(string $name, array $labels, int $position, string $icon): array
    {
        return [
            'label' => __($name, 'text_domain'),
            'description' => __($name . ' Description', 'text_domain'),
            'labels' => $labels,
            'supports' => array(
                'title'
            ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => $position,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'menu_icon' => $icon,
        ];
    }
}
