<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Categories
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use common\models\DirectoryCategories as Category;
    use common\models\DirectoryCategories;
    use Yii;
    use yii\base\Component;

    class HelperDirectoryCategories extends Component {

        public static function getType($field, $value) {
            $data = Query::queryOne("SELECT dc.*
                                      FROM `directory_categories` AS dc
                                      WHERE $field = '$value'");
            return Misc::exists($data, FALSE);
        }

        public static function getCertainType($field, $value) {
            $data = Query::queryAll("SELECT dc.*
                                        FROM `directory_categories` AS dc
                                        WHERE $field = '$value' ORDER BY dc.type ASC");
            return Misc::exists($data, FALSE);
        }

        public static function getSingleCategoryTree($id) {
            if ($id > 0) {
                $child = DirectoryCategories::findOne($id);
                if ($child['parent'] > 0) {
                    $parent = DirectoryCategories::findOne($child['parent']);
                    $category = ucwords($child['type']) . ' / ' . ucwords($child['type']);
                }
                else {
                    $category = ucwords($child['type']);
                }
            }
            else {
                $category = 0;
            }
            return Misc::exists($category, FALSE);

        }

        public static function getUsedParentCategory() {
            $data = Query::queryAll('SELECT DISTINCT p.id as id, p.type AS category
                                        FROM  `directory_categories` AS p
                                        INNER JOIN  `directory_categories` AS c
                                        ON p.id = c.parent WHERE p.parent =0');

            return $data;

        }

        public static function buildCategoryList($parent, $category) {
            $html = "";
            if (isset($category['parent_cats'][$parent])) {
                $html .= "<ul>";
                foreach ($category['parent_cats'][$parent] as $cat_id) {
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li>  <a data-id='" . $category['categories'][$cat_id]['id'] . "' href='javascript:void(0);'" .

                            ">" . $category['categories'][$cat_id]['type'] . "</a></li>";
                    }
                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li>  <a class='has-child' data-id='" . $category['categories'][$cat_id]['id'] . "' href='javascript:void(0);'>" . $category['categories'][$cat_id]['type'] . "</a>";
                        $html .= self::buildCategoryList($cat_id, $category);
                        $html .= "</li>";
                    }
                }
                $html .= "</ul>";
            }
            return $html;
        }

        public static function buildCategoryTree($parent, $category) {
            $html = "";
            if (isset($category['parent_cats'][$parent])) {
                $html .= "<ol class='dd-list'>";
                foreach ($category['parent_cats'][$parent] as $cat_id) {
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= '<li class="dd-item" data-id="' . $category['categories'][$cat_id]['id'] . '">' .
                            '<div class="dd-handle"></div>' .
                            '<div class="dd-content"><a href = "javascript:void(0);" class="edit-category">' .
                            $category['categories'][$cat_id]['type'] .
                            '</a>';
                        $html .= '<div class="pull-right">' .
                            '<a href="javascript:void(0)" class="edit-category"><i class="icon wb-pencil " aria-hidden="true"></i> </a>' .
                            '</div>' .
                            '</div>' .
                            '</li>';
                    }

                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= '<li class="dd-item dd-collapsed" data-id = "' . $category['categories'][$cat_id]['id'] . '" >' .
                            '<div class="dd-handle"></div>' .
                            '<div class="dd-content"><a href = "javascript:void(0);" class="edit-category">' .
                            $category['categories'][$cat_id]['type'] .
                            '</a>';

                        $html .= '<div class="pull-right">' .
                            '<a href="javascript:void(0)" class="edit-category"><i class="icon wb-pencil " aria-hidden="true"></i> </a>' .
                            '</div></div>';
                        $html .= self::buildCategoryTree($cat_id, $category);

                        $html .= '</li>';

                    }
                    /*
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= '<li class="dd-item" data-id="' . $category['categories'][$cat_id]['id'] . '">' .
                            '<div class="dd-handle">' . $category['categories'][$cat_id]['type'] .
                            '<div class="pull-right">' .
                            '<a href="javascript:void(0)"><i class="icon wb-pencil " aria-hidden="true"></i> </a>' .
                            '<a href="javascript:void(0)"><i class="icon wb-close " aria-hidden="true"></i> </a>' .
                            '</div>' .
                            '</div>' .
                            '</li>';
                    }

                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= '<li class="dd-item" data-id = "' . $category['categories'][$cat_id]['id'] . '" >' .
                            '<div class="dd-handle">' . $category['categories'][$cat_id]['type'] . '</div>';
                        $html .= self::buildCategoryTree($cat_id, $category);
                        $html .= '<div class="pull-right">' .
                            '<a href="javascript:void(0)"><i class="icon wb-pencil " aria-hidden="true"></i> </a>' .
                            '<a href="javascript:void(0)"><i class="icon wb-close " aria-hidden="true"></i> </a>' .
                            '</div>';
                        $html .= '</li>';

                    }
                    */

                }
                $html .= "</ol>";
            }
            return $html;

        }

        public static function getCategoryArray($parent, $category) {
            //            $category = self::getTypes();
            //            $parent = 0;
            $html = "";
            if (isset($category['parent_cats'][$parent])) {
                $html .= "<ul>";
                foreach ($category['parent_cats'][$parent] as $cat_id) {
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li>" . $category['categories'][$cat_id]['id'] . "</li>";
                    }
                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li>" . $category['categories'][$cat_id]['id'] . "";
                        $html .= self::getCategoryArray($cat_id, $category);
                        $html .= "</li>";
                    }
                }
                $html .= "</ul> \n";
            }
            return $html;
        }

        public static function listedCategories($value) {
            $data = [
                'parents' => Query::queryAll("SELECT dc.* FROM `directory_categories` AS dc WHERE dc.type LIKE  '$value%' AND dc.parent = '0' ORDER BY dc.type ASC"),
                'child'   => Query::queryAll("SELECT dc.* FROM `directory_categories` AS dc WHERE dc.parent != '0' ORDER BY dc.type ASC"),
            ];
            $list = [];
            if (isset($data['parents']) && !empty($data['parents'])) {
                foreach ($data['parents'] as $parent) {
                    $list  [$parent['id']] = $parent;
                }
                foreach ($data['parents'] as $parent) {
                    foreach ($data['child'] as $child) {
                        if ($child['parent'] == $parent['id']) {
                            $list[$parent['id']]['child'][] = $child;
                        }
                    }
                }
            }
            return Misc::exists($list, FALSE);

        }

        public static function getTypes() {
            $query = Query::queryAll("SELECT dc.* FROM `directory_categories` AS dc ORDER BY `parent` , `type`");
            $category = array(
                'categories'  => array(),
                'parent_cats' => array(),
            );
            foreach ($query as $row) {
                $category['categories'][$row['id']] = $row;
                $category['parent_cats'][$row['parent']][] = $row['id'];
            }

            return Misc::exists($category, FALSE);
        }

        public static function addType($category) {
            if (!empty($category)) {
                $model = new Category;
                $model->type = (isset($category['category'])) ? ($category['category']) : '';
                $model->parent = (isset($category['parent'])) ? $category['parent'] : '';
                if ($model->save()) {
                    return TRUE;
                }
                return FALSE;

            }

        }

        public static function editType($category) {
            if (!empty($category)) {
                $model = Category::findOne($category['id']);
                $model->type = (isset($category['category'])) ? $category['category'] : '';
                $model->parent = (isset($category['parent'])) ? $category['parent'] : '';
                if ($model->save()) {
                    return TRUE;
                }
                return FALSE;

            }

        }

        public static function checkType($value, $field) {
            $data = Query::queryOne("SELECT * FROM `directory_categories` WHERE `$field` = '$value' AND `parent` = 0");
            return Misc::exists($data, FALSE);
        }

        public static function validateType($type, $parent) {
            $data = Query::queryOne("SELECT *
                                        FROM `directory_categories`
                                        WHERE `type` = '$type'
                                        AND `parent` = '$parent'");
            return Misc::exists($data, FALSE);
        }

    }
