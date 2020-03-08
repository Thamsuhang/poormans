<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Page
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;
    use common\components\Query;
    use common\components\Misc;
    use common\models\Page as Page;
    use common\components\HelperSectionContent as HSContent;
    use common\components\HelperTestimonial as HTestimonial;
    use common\components\HelperDirectory as HDirectory;
    use common\components\HelperContact as HContact;

    use common\components\HelperSlider as HSlider;

    class HelperPage extends Component {

        public static function getPages($fields = '', $field = '', $value = '') {
            $select = Misc::if_exists($fields) ? implode(', ', $fields) : 'p.*';
            $condition = ($field != '' && $value != '') ? 'WHERE ' . $field . ' = ' . $value : '';
            /*
            $data = Query::queryAll("SELECT $select, i.server_name, i.alternate_text
                                    FROM `page` AS p
                                    LEFT JOIN `images` AS i
                                        ON i.id = p.featured_image_id
                                    $condition
                                    ORDER BY p.created_on ASC");
            */
            $data = Query::queryAll("SELECT $select FROM `page` AS p $condition ORDER BY p.created_on ASC");
            return Misc::exists($data, FALSE);
        }

        public static function getPage($field, $value) {
            /*
            $data = Query::queryOne("SELECT p.*, i.server_name, i.alternate_text
                                    FROM `page` AS p
                                    LEFT JOIN `images` AS i
                                        ON i.id = p.featured_image_id
                                    WHERE $field = '$value'");
            */
            $data = Query::queryOne("SELECT * FROM `page` WHERE $field = '$value'");
            return Misc::exists($data, FALSE);
        }

        public static function getPageContent($id) {
            $datacenter = array(
                'contact'      => HContact::getContact(),
                'testimonials' => HTestimonial::getTestimonials(),
                'slider'       => HSlider::getSliders('page_id', $id),
                'slider_image' => HSlider::getPageSlider($id),
               // 'directory'    => HDirectory::getEntireDirectory()
            );
            $page_content = HSContent::getPageContent('sc.page_id', $id);

            if (Misc::exists($page_content)){
                foreach ($page_content as $content) {
                    $datacenter['page-content'][$content['slug']] = $content;
                }
            }
            $general_content = HSContent::getPageContent('sc.page_id', 0);
            if (Misc::exists(  $general_content)){
                foreach ($general_content as $content) {
                    $datacenter['general-content'][$content['slug']] = $content;
                }
            }


            return $datacenter;

        }


    }