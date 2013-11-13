<?php

use Orm\Model;

class Model_Product extends Model
{
        protected static $_properties = array(
            'id',
            'name',
            'product_type',
            'product_description',
            'price',
            'image_path'
        );

        protected static $_observers = array(
            'Orm\Observer_CreatedAt' => array(
                    'events' => array('before_insert'),
                    'mysql_timestamp' => false,
            ),
            'Orm\Observer_UpdatedAt' => array(
                    'events' => array('before_save'),
                    'mysql_timestamp' => false,
            ),
        );

        public static function validate($factory)
        {
            $val = Validation::forge($factory);
            $val->add_field('name', 'Name', 'required|max_length[255]');
            $val->add_field('product_type', 'Product Type', 'required|max_length[255]');
            $val->add_field('product_description', 'Product Description', 'required');
            $val->add_field('price', 'Price', 'required|valid_string[numeric]');
            $val->add_field('image_path', 'Image Path', 'required|max_length[255]');
            $val->add_field('quantity', 'Quantity', 'required|valid_string[numeric]');
            $val->add_field('product_reviews', 'Product Reviews', 'required');
            $val->add_field('product_likes', 'Product Likes', 'required|valid_string[numeric]');

            return $val;
        }

}