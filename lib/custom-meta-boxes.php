<?php

namespace CodebyCore;


use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\ExpectedValues;

class CodeByMetaBoxes {
    public string $prefix = '';
    public string $title = '';
    public array $fields = [];
    public array $post_types = [];

    public static function init (string $title, array $post_types, string $prefix = ''): CodeByMetaBoxes
    {
        /// require_once(__DIR__.'/helper.php');

        $a = new CodeByMetaBoxes();
        $a->title = $title;
        $a->post_types = $post_types;
        $a->prefix = $prefix;
        return $a;

    }


    function prefix(string $prefix): CodeByMetaBoxes {
        $this->prefix = $prefix;
        return $this;
    }



    function addField(
        #[ExpectedValues(['button','checkbox','checkbox_list','email','hidden','number','password','radio','range','select','select_advanced','text','textarea','url','autocomplete','color','date','datetime','fieldset_text','map','image_select','oembed','slider','text_list','time','wysiwyg','post','taxonomy','taxonomy_advanced','user','file','file_advanced','file_input','image','image_advanced','video','divider','heading'])]
        string $type,
        string $name
    ): CodeByMetaBoxes {
        $this->fields[] = [
            'type' => $type,
            'name' => esc_html__( $name, 'online-generator' ),
            'id'   =>  str_replace(' ', '_', strtolower(Helpers::vn_to_str($name)))
        ];
        return $this;
    }

    function applyPrefix(): array {

        if($this->prefix == '') {
            return $this->fields;
        }

        $func = function(array $value): array {
            $value['id'] = $this->prefix . $value['id'];
            return $value;
        };

        return array_map($func, $this->fields);
    }

    #[ArrayShape(['title' => "string", 'id' => "string", 'context' => "string", 'post_types' => "array", 'fields' => "array"])] function get(): array {
        return [
            'title'   => esc_html__( 'Advance ' . $this->title, 'online-generator' ),
            'id'      => strtolower(Helpers::vn_to_str($this->title)),
            'context' => 'normal',
            'post_types' => $this->post_types,
            'fields' => $this->applyPrefix()
        ];
    }
}
