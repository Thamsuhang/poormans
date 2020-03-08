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
    use common\models\Contact;


    class HelperContact extends Component {
        public static function getContact() {
            $data = Query::queryOne("SELECT * FROM `contact`");
            return Misc::exists($data, FALSE);
        }

        public static function editContact($contact) {


            $model = Contact::findOne($contact['id']);

         //   $model = new Contact;


            $model->title = (isset($contact['title'])) ? $contact['title'] : '';
            $model->subtitle = (isset($contact['subtitle'])) ? $contact['subtitle'] : '';
            $model->description = (isset($contact['description'])) ? $contact['description'] : '';
            $model->latitude = (isset($contact['latitude'])) ? $contact['latitude'] : '';
            $model->longitude = (isset($contact['longitude'])) ? $contact['longitude'] : '';
            $model->address = (isset($contact['address'])) ? $contact['address'] : '';
            $model -> city = (isset($contact['city'])) ? $contact['city'] : '';
            $model->state = (isset($contact['state'])) ? $contact['state'] : '';
            $model->phone = (isset($contact['phone'])) ? $contact['phone'] : '';
            $model->fax = (isset($contact['fax'])) ? $contact['fax'] : '';
            $model->email = (isset($contact['email'])) ? $contact['email'] : '';
            $model->url = (isset($contact['url'])) ? $contact['url'] : '';

            if ($model->save(false)) {
                return true;
            }
        }


    }