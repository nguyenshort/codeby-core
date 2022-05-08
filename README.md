# Wordpress CodeBy Core

## Custom Post
Setup custom post name ```custom_banner_post_type``` in your theme ```function.php```` with Codeby Core
```php
<?php
if(!class_exists('CodebyCore\CustomPostType')) return;
use CodebyCore\CustomPostType;

add_action('init', 'custom_banner_post_type');
function custom_banner_post_type(): void
{
    register_post_type('banner', CustomPostType::generator('Banner', 'Banners', 2, 'dashicons-camera'));
}
```
## Custom Fields
Setup custom post name ```custom_banner_post_type``` in your theme ```function.php```` with Codeby Core
```php
<?php
if(!class_exists('CodebyCore\CodeByMetaBoxes')) return;
use CodebyCore\CodeByMetaBoxes;
add_filter( 'rwmb_meta_boxes', 'custom_banner_meta_boxes' );
function custom_banner_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = CodeByMetaBoxes::init('Banner', ['banner'])
        ->addField('text', 'Email')
        ->addField('url', 'Trang Chủ')
        ->addField('url', 'Fanpage Hỗ Trợ')
        ->addField('text', 'Tên Máy Chủ')
        ->addField('text', 'Miêu Tả Mu')
        ->addField('datetime', 'Alpha Test')
        ->addField('datetime', 'Open Beta')
        ->addField('number', 'Exp')
        ->addField('number', 'Drop')
        ->addField('text', 'Anti Hack')
//        ->addField('', 'Image')
        ->get();
    return $meta_boxes;
}
```
    