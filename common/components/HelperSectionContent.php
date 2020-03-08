<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of SectionContent
     *
     * @author Chetan Rajbhandari
     */

    namespace common\components;

    use Yii;
    use yii\base\Component;
    use common\components\Query;
    use common\components\Misc;
    use common\models\TabContent as TabContent;
    use common\models\SectionConfig as SectionConfig;
    use common\models\SectionContent as SectionContent;
    use common\models\Slider as Slider;

    class HelperSectionContent extends Component {

        public static function editSectionContent($data) {
            //print_r($data);die;
            $model = SectionContent::findOne($data['id']);
            $model->title = isset($data['title']) ? $data['title'] : '';
            $model->page_id = isset($data['page-id']) ? $data['page-id'] : '';
            $model->slug = isset($data['slug']) ? $data['slug'] : '';
            $model->subtitle = isset($data['subtitle']) ? $data['subtitle'] : '';
            $model->description = isset($data['description']) ? $data['description'] : '';
            $model->icon = (isset($data['icon']) && !empty($data['icon'])) ? $data['icon'] : 0;
            $model->image = (isset($data['image']) && !empty($data['image'])) ? $data['image'] : 0;

            if ($model->save(false)) {
                return $model;
            }

            return FALSE;
        }

        public static function editSlider($data) {
            if (isset($data['id']) && Misc::exists($data['id'])) {
                $model = Slider::findOne($data['id']);
            }
            else {
                $model = new Slider;
            }
            $model->page_id = isset($data['page-id']) ? $data['page-id'] : '';
            $model->slug = isset($data['title']) ? strtolower(str_replace(" ", "-", $data['title'])) : '';
            $model->title = isset($data['title']) ? $data['title'] : '';
            $model->subtitle = isset($data['subtitle']) ? $data['subtitle'] : '';
            if ($model->save()) {
                return $model;
            }
            else {
                return FALSE;

            }
        }

        public static function deleteSliderItem($id) {
            if ($id != '') {
                $model = Slider::findOne($id);
                return $model->delete() ? TRUE : FALSE;
            }
        }

        public static function getSectionContents($fields = '', $field = '', $value = '') {
            $select = Misc::if_exists($fields) ? implode(', ', $fields) : 'sc.*';
            $condition = ($field != '' && $value != '') ? 'WHERE ' . $field . ' = ' . $value : '';
            $data = Query::queryAll("SELECT $select, p.name as page_name
                                FROM `section_content` AS sc
                                LEFT JOIN `page` AS p
                                    ON p.id = sc.page_id
                                $condition
                                ORDER BY sc.id ASC");
            return Misc::exists($data, FALSE);
        }

        public static function getPageContent($field, $value) {
            $data = Query::queryAll("SELECT sc.*, p.name as page_name
                                FROM `section_content` AS sc
                                LEFT JOIN `page` AS p
                                    ON p.id = sc.page_id
                                WHERE $field = '$value'");
            return Misc::exists($data, FALSE);
        }

        public static function getSectionContent($field, $value) {
            $data = Query::queryOne("SELECT sc.*, p.name as page_name
                                FROM `section_content` AS sc
                                LEFT JOIN `page` AS p
                                    ON p.id = sc.page_id 
                                WHERE $field = '$value'");
            return Misc::exists($data, FALSE);
        }

        public static function getJunctionSectionContent($field, $value) {
            return SectionContent::find()->where(["$field" => $value])
                ->with('tabContents')
                ->with('listContents')
                ->with('sectionConfig')
                ->with('sectionImage')
                ->with('sectionSlider')
                ->with('sliderImages.images')
                ->one();
        }

        public static function getJunctionSectionContents($field, $value) {
            return SectionContent::find()->where(["$field" => $value])
                ->with('tabContents')
                ->with('listContents')
                ->with('sectionConfig')
                ->with('sectionImage')
                ->with('sectionSlider')
                ->with('sliderImages.images')
                ->all();
        }

        public static function updateTabContents($data, $id) {
            /*
            if ($data != null) { $i=0;
                foreach($data as $tabs) : $i++;

                    foreach($tabs as $tab) :
                        $add = new TabContent();
                        $add->title         = $tab['title'];
                        $add->description   = $tab['description'];
                        $add->icon          = $tab['icon'];
                        $add->section_id    = $id;
                        $add->group_id      = $i;

                        $add->save();
                    endforeach;

                endforeach;
            }
            */
            // yii batch insert
            if ($data != null) {
                $i = 0;
                foreach ($data as $tabs) : $i++;
                    foreach ($tabs as $tab) :
                        $batch[] = [$tab['title'], $tab['icon'], $tab['description'], $id, $i];
                    endforeach;
                endforeach;
                Query::batchInsert('tab_content', array('title', 'icon', 'description', 'section_id', 'group_id'), $batch);
            }
        }

        public static function updateListContents($data, $id) {
            // yii batch insert
            if ($data != null) {
                $i = 0;
                foreach ($data as $lists) : $i++;
                    foreach ($lists as $list) :
                        $batch[] = [$list['title'], $list['value'], $list['icon'], $id, 0, $i];
                    endforeach;
                endforeach;
                Query::batchInsert('list_content', array('title', 'value', 'icon', 'section_id', 'tab_id', 'group_id'), $batch);
            }
        }

        /*
        public static function updateListContentsForTab($data, $id)
        {
            // yii batch insert
            if ($data != null) { $i=0;
                foreach($data as $list) :
                    $batch[] = [$list['value'], $data['icon'], 0, $id, 1];
                endforeach;
                Query::batchInsert('list_content', array('value', 'icon', 'section_id', 'tab_id', 'group_id'), $batch);
            }
        }
        */

        public static function deleteTabContents($id) {
            // delete initial list contents of a tab
            // $tabs = Query::queryAll("SELECT id FROM `tab_content` WHERE `section_id` = $id");
            // foreach($tabs as $tab):
            //     Query::execute("DELETE FROM `list_content` WHERE `tab_id` = $tab");
            // endforeach;

            // delete initial tab contents of a section
            Query::execute("DELETE FROM `tab_content` WHERE `section_id` = $id");
        }

        public static function deleteListContents($id) {
            // delete initial list contents of a section
            Query::execute("DELETE FROM `list_content` WHERE `section_id` = $id");
        }

        public static function toggle($field, $id) {
            $model = SectionContent::findOne($id);
            $model->$field = ($model->$field == 0) ? 1 : 0;
            return $model->update() ? TRUE : FALSE;
        }
    }