<?php


namespace app\commands;


use app\controllers\BaseController;
use app\models\comments;
use app\models\users;
use yii\console\Controller;

class SeedController extends Controller
{

    public function actionIndex()
    {

        $faker = \Faker\Factory::create();
        $city = ['Orenburg', 'Moscow', 'S-Peterburg', 'N.Novgorod', 'Samara'];

        for ($i = 1; $i <= 20; $i++) {
            $user = new users();
            $user->setIsNewRecord(true);
            $user->name = $faker->userName;
            $user->born_date = $faker->dateTimeBetween('1970-01-01', '2003-12-31')->format('Y-m-d');
            $user->city = $city[rand(0, 4)];
            $user->phone_number = $faker->phoneNumber;
            $user->save();
        }
        for ($i = 1; $i <= 20; $i++) {
            $comment = new comments();
            $comment->user_id = rand(1, 20);
            $comment->date = $faker->dateTimeBetween('2021-05-01', '2021-06-18')->format('Y-m-d H:i:s');
            $comment->text = $faker->text(200);
            $comment->published_at = true;
            $comment->save();

        }
    }
}